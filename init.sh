docker-compose -f docker-compose.yml exec app php artisan migrate:fresh
docker-compose -f docker-compose.yml exec app php artisan db:seed
