Deployed Live Demo => http://luxtravels.herokuapp.com

## Requirement

-   XAMPP => PHP-8, MySQL
-   Composer
-   Mailtrap Account

## Download Project ||Git Clone

Link=> https://github.com/RAugadh/LuxTravels

## Setup .ENV

-   Rename .env.example to .env
-   Set your database credentials
-   Create a database
-   Set your Mailtrap credentials

## Install dependency

    composer install

## Generate Laravel Key

    php artisan key:generate

## Migrate Database with dummy users

    php artisan migrate:fresh --seed

## Run Application

    php artisan serve
