## How to run
- Clone the repository
- composer install
##Docker
- ./vendor/bin/sail up
- bash ./vendor/laravel/sail/bin/sail up    /windows cmd
##Manual
- cp env.example to .env
- set configurations in the .env
- php artisan:migrate
- php artisan db:seed
- php artisan key:generate
- php artisan serve
##Tests
- php artisan test
## API documentation
- https://documenter.getpostman.com/view/7011800/2s8YzTVNsC

## Deployment to cloud hosting
Requirements
- PHP >= 8.0
- PHP standard extensions
- Mysql >= 8.0
- Git

Nginx configuration

    server {
        listen 80;
        listen [::]:80;
        server_name example.com;
        root /srv/example.com/public;
    
        add_header X-Frame-Options "SAMEORIGIN";
        add_header X-Content-Type-Options "nosniff";
     
        index index.php;
     
        charset utf-8;
     
        location / {
            try_files $uri $uri/ /index.php?$query_string;
        }
     
        location = /favicon.ico { access_log off; log_not_found off; }
        location = /robots.txt  { access_log off; log_not_found off; }
     
        error_page 404 /index.php;
     
        location ~ \.php$ {
            fastcgi_pass unix:/var/run/php/php8.0-fpm.sock;
            fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
            include fastcgi_params;
        }
     
        location ~ /\.(?!well-known).* {
            deny all;
        }
    }   

## After server configuration
- clone the repository
- composer install --optimize-autoloader --no-dev
- php artisan config:cache
- php artisan route:cache
- php artisan view:cache
- Make sure that APP_DEBUG is false in .env
