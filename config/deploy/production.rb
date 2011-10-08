set :branch, "production"

role :web, "luma.co.nz"                           # Your HTTP server, Apache/etc
role :app, "luma.co.nz"                           # This may be the same as your `Web` server
role :db,  "luma.co.nz", :primary => true         # This is where Rails migrations will run