set dotenv-load

# absolute path to the 
local_path := env('LOCAL_PATH')
remote_host := env('REMOTE_HOSTNAME')
remote_user := env('REMOTE_USERNAME')
remote_path := env('REMOTE_PATH')

build-fonts:
    cd www.rustforgeconf.com/assets/fonts/RocGrotesk && make

sync:
    rsync -avz --exclude=".git" --exclude=".venv" {{local_path}} {{remote_user}}@{{remote_host}}:{{remote_path}}

preview:
    cd www.rustforgeconf.com && python3 -m http.server
