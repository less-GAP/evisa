@servers(['web' => 'root@134.122.4.168'])

@task('deploy')
    cd /home/evisa
    git pull origin main
    sh build.sh
    docker-compose down -v && docker-compose up -d && docker-compose exec app php artisan migrate
@endtask
