## Show TV App

This is a Laravel web project to show tv shows and its episodes.<br />
User can register and login to see app contents and show show's episodes.<br />
In nav bar there's shows list , random 5 shows and search bar that user can use to search on show or episode.<br />
User can follow specific tv show and like episodes.<br />
There is small admin panel for admin to show users data.<br />
Admin credentials <br />
email : super@admin.com <br />
pass : admin123 <br />

## Technologies

laravel framework : "^11.0", <br />
php : "^8.2"
 

## Setup steps
Clone the repository

    git clone https://github.com/MohamedElMansy/tv-show.git

Switch to the repo folder

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Run Admin Seeder to create the Admin

    php artisan db:seed

Run storage link command to link images

    php artisan storage:link
    
Start the local development server

    php artisan serve
