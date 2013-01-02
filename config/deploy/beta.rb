ip="#{beta_server}"
set :deploy_to, "#{beta_path}"
set :branch, "#{beta_branch}"

role :web, ip
