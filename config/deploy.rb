require 'capistrano'
require 'capistrano/ext/multistage'


# which environment should be the default?
# if you just run 'cap deploy'
set :default_stage, "beta"

# development server settings
set :development_server, "dev.example.com"
set :development_path, "/opt/sites/dev.example.com"
set :development_branch, "development"

# beta server settings
set :beta_server, "willfaulconerphotography.cobblehilldigital.com"
set :beta_path, "/var/www/apps/willfaulconerphotography_beta/"
set :beta_branch, "master"

# production server settings
set :production_server, "198.61.229.81"
set :production_path, "/var/www/apps/willfaulconerphotography/"
set :production_branch, "master"

# repository settings
set :repository, "git@machine.github.com:cobblehillmachine/willfaulconerphotography.git"

# user on the server to connect and deploy as
# this recipe is setup to use public key authentication
set :user, "sdeploy"



##########################################################################
#  don't modify anything below here unless you know what you are doing!  #
##########################################################################

default_run_options[:pty] = true
ssh_options[:forward_agent] = true
default_environment['PATH'] = '/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin'

set :use_sudo, false
set :scm, :git
set :deploy_via, :remote_cache


set :stages, %w(development beta production)

# run our task to symlink shared/system into wp-content/uploads
after 'deploy:update_code', 'deploy:symlink_shared'

# overwrite the default :migrate task or it will
# fail since there are no migrations in wordpress
namespace :deploy do
  # symlink shared/system into wp-content/uploads
  task :symlink_shared do
    run "ln -s #{shared_path}/uploads #{release_path}/wp-content/uploads"
    run "ln -s #{shared_path}/wp-config.php #{release_path}/wp-config.php"
    # run "ln -s #{shared_path}/videos #{release_path}/videos"
  end
  task :migrate do
    # don't do anything, it's a wordpress app!
  end
  # override the default so it doesn't create public, tmp, etc
  task :finalize_update do
    # don't do anything, it's a wordpress app!
  end
end