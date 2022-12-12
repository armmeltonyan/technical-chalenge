## How to run
Clone the repasitory
    Docker
- ./vendor/bin/sail up
    Manual
- composer install
- cp env.example to .env
- set configurations in the .env
- php artisan:migrate
- php artisan db:seed
- php artisan key:generate
- php artisan serve

run test by comand php artisan test
