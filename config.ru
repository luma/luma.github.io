
require 'toto'

# Rack config
use Rack::Static, :urls => ['/stylesheets', 
														'/javascripts', 
														'/images', 
														'/favicon.ico', 
														'/robots.txt', 
														'/apple-touch-icon-114x114-precomposed.png', 
														'/apple-touch-icon-57x57-precomposed.png', 
														'/apple-touch-icon-72x72-precomposed.png', 
														'/apple-touch-icon-precomposed.png', 
														'/apple-touch-icon.png', 
														'/humans.txt',
														'404.html'], :root => 'public'
use Rack::CommonLogger

if ENV['RACK_ENV'] == 'development'
  use Rack::ShowExceptions
end

#
# Create and configure a toto instance
#
toto = Toto::Server.new do
  #
  # Add your settings here
  # set [:setting], [value]
  # 
  # set :author,    ENV['USER']                               # blog author
  set :title,     "Luma"                   										# site title
  # set :root,      "index"                                   # page to load on /
  # set :date,      lambda {|now| now.strftime("%d/%m/%Y") }  # date format for articles
  # set :markdown,  :smart                                    # use markdown + smart-mode
  set :disqus,    'luma-ltd'                                # disqus id, or false
  # set :summary,   :max => 150, :delim => /~/                # length of article summary and delimiter
  # set :ext,       'txt'                                     # file extension for articles
  # set :cache,      28800                                    # cache duration, in seconds

  set :date, lambda {|now| now.strftime("%B #{now.day.ordinal} %Y") }
end

run toto