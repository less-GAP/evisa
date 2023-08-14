docker-compose -f docker-compose.develop.yml exec app php artisan migrate:fresh
docker-compose -f docker-compose.develop.yml exec app php artisan db:seed
