@setup
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
@endsetup

@servers(['web' => 'root@134.122.4.168'])

@task('deploy')
    cd /home/evisa_dev
    git pull origin main
    docker build  -t registry.digitalocean.com/lessgap/evisa:latest . --build-arg APP_ADMIN={{ env('APP_ADMIN') }}
    docker-compose down -v && docker-compose up -d
    docker-compose exec app php artisan migrate
    docker image rm $(docker image ls -f 'dangling=true' -q)
@endtask
