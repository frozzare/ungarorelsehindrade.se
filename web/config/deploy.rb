require 'mina/multistage'
require 'mina/git'

# Fixes OS X terminal
set :term_mode, nil

# Add shared folders, if apache add `.htaccess` to the array.
# WordPress uploads directory should exist in `shared_paths`
set :shared_paths, ['web/assets/uploads']

# How many releases to keep. 5 is default in Mina.
set :keep_releases, 5

# The setup task, create directories on setup.
task :setup => :environment do
  queue! %[mkdir -p "#{deploy_to}/shared/web/assets/uploads"]
  queue! %[chmod g+rx,u+rwx "#{deploy_to}/shared/web/assets/uploads"]
end

# The deploy task, clone git repository and linking the shared paths
desc "Deploys the current version to the server."
task :deploy => :environment do
  each_servers do
    deploy do
      invoke :'git:clone'
      invoke :'deploy:link_shared_paths'
      invoke :'deploy:cleanup'
    end
  end
end

# The rollback task, rollback to previous version.
# https://github.com/mina-deploy/mina/issues/9#issuecomment-37499645
desc "Rolls back the latest release"
task :rollback => :environment do
  queue! %[echo "-----> Rolling back to previous release for instance: #{domain}"]

  # Delete existing sym link and create a new symlink pointing to the previous release
  queue %[echo -n "-----> Creating new symlink from the previous release: "]
  queue %[ls "#{deploy_to}/releases" -Art | sort | tail -n 2 | head -n 1]
  queue! %[ls -Art "#{deploy_to}/releases" | sort | tail -n 2 | head -n 1 | xargs -I active ln -nfs "#{deploy_to}/releases/active" "#{deploy_to}/current"]

  # Remove latest release folder (active release)
  queue %[echo -n "-----> Deleting active release: "]
  queue %[ls "#{deploy_to}/releases" -Art | sort | tail -n 1]
  queue! %[ls "#{deploy_to}/releases" -Art | sort | tail -n 1 | xargs -I active rm -rf "#{deploy_to}/releases/active"]
end