set :stages, %w(production)
set :default_stage, "production"
require 'capistrano/ext/multistage'

set :application, "luma"
set :repository,  "git@github.com:luma/Luma.git"

$:.unshift(File.expand_path('./lib', ENV['rvm_path']))  # Add RVM's lib directory to the load path.
require "rvm/capistrano"                                # Load RVM's capistrano plugin.
set :rvm_ruby_string, 'ruby-1.9.2-p0'                   # Or whatever env you want it to run in."

set :scm, :git

# If you aren't deploying to /u/apps/#{application} on the target
# servers (which is the default), you can specify the actual location
# via the :deploy_to variable:
set(:deploy_to) { "/home/luma02/sites/#{application}/#{stage}" }

set :keep_releases, 3
set :use_sudo, false
set :user, "luma02"
set :rvm_type, :user

# If you're using your own private keys for git you might want to tell Capistrano to use agent forwarding with this command
ssh_options[:forward_agent] = true

# Capistrano defaults to using ssh to log into the remote server, so we need to
#override the ssh port. Note, you must have small business or above account for
#shell access, unless you have ordered ala carte shell service.
ssh_options[:port] = 7822

# Remote caching will keep a local git repo on the server you're deploying to and simply run a fetch from that rather than an 
# entire clone. This is probably the best option and will only fetch the differences each deploy
set :deploy_via, :remote_cache
set :copy_cache, true
set :copy_exclude, [".git"]
set :copy_compression, :bz2

# If you are using Passenger mod_rails uncomment this:
# if you're still using the script/reapear helper you will need
# these http://github.com/rails/irs_process_scripts

namespace :deploy do
  task :start do ; end
  task :stop do ; end
  task :restart, :roles => :app, :except => { :no_release => true } do
    run "#{try_sudo} touch #{File.join(current_path,'tmp','restart.txt')}"
  end
  
  namespace :web do
    desc <<-DESC
      Present a maintenance page to visitors. Disables your application's web \
      interface by writing a "maintenance.html" file to each web server. The \
      servers must be configured to detect the presence of this file, and if \
      it is present, always display it instead of performing the request.

      By default, the maintenance page will just say the site is down for \
      "maintenance", and will be back "shortly", but you can customize the \
      page by specifying the REASON and UNTIL environment variables:

        $ cap deploy:web:disable \\
              REASON="hardware upgrade" \\
              UNTIL="12pm Central Time"

      Further customization will require that you write your own task.
    DESC
    task :disable, :roles => :web, :except => { :no_release => true } do
      require 'erb'
      on_rollback { run "rm #{shared_path}/system/maintenance.html" }

      warn <<-EOHTACCESS

        # Please add something like this to your site's htaccess to redirect users to the maintenance page.
        # More Info: http://www.shiftcommathree.com/articles/make-your-rails-maintenance-page-respond-with-a-503
        
        ErrorDocument 503 /system/maintenance.html
        RewriteEngine On
        RewriteCond %{REQUEST_URI} !\.(css|gif|jpg|png)$
        RewriteCond %{DOCUMENT_ROOT}/system/maintenance.html -f
        RewriteCond %{SCRIPT_FILENAME} !maintenance.html
        RewriteRule ^.*$  -  [redirect=503,last]
      EOHTACCESS

      reason = ENV['REASON']
      deadline = ENV['UNTIL']

      template = File.read('app/views/system/maintenance.html.erb')
      result = ERB.new(template).result(binding)

      put result, "#{shared_path}/system/maintenance.html", :mode => 0644
    end
  end
end