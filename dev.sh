docker pull registry.digitalocean.com/lessgap/laravel-php82:latest
docker-compose -f docker-compose.develop.yml down -v && docker-compose -f docker-compose.develop.yml up
