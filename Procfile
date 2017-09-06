web: vendor/bin/heroku-php-nginx -C nginx.conf public/
deployer: composer install && php artisan migrate:refresh --seed
