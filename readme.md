
## Installation Instructions

Install the following on your system:
  - PHP (bundled with XAMPP)
  - Composer
  - Laravel
  - Nodejs (Note: the app does not run on a Node server, but Node is required in order to install npm modules)

1. Create a database in phpMyAdmin (usually http://localhost:80/phpmyadmin/) named clubeg
2. Delete the existing .env file inside the clubeg folder (it is configured to run the app in Heroku)
3. Create a copy of the .env.example file in the root of the clubeg folder and rename it .env
4. Inside the file, fill out the following fields based on your mysql credentials:
    - DB_DATABASE=clubeg
    - DB_USERNAME=
    - DB_PASSWORD=

Using command line, run the following commands from inside the clubeg folder, which is the root folder of the project:
   composer install
    php artisan key:generate
    npm install
    php artisan migrate
    php artisan db:seed
    php artisan serve


## Login credentials

- Email: admin@example.com
- Password: password
