
## Installation Instructions

- PHP (bundled with XAMPP)
- Composer
- Laravel
- Nodejs

Create a database in phpMyAdmin (usually http://localhost:80/phpmyadmin/) named clubeg

Create a copy of the .env.example file in the root of the clubeg folder and rename it .env

Inside the file, fill out the following fields based on your mysql credentials:

- DB_DATABASE=clubeg
- DB_USERNAME=
- DB_PASSWORD=

Using command line, run the following commands from inside the clubeg folder, which is the root folder of the project:
Generate key and save it (including the square brackets):
- php artisan key:generate
- composer install
- npm install
- php artisan migrate
- php artisan db:seed
- php artisan serve

## Login credentials

- Email: admin@example.com
- Password: password
