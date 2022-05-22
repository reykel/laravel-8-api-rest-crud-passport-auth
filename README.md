<h2>Step 1: download in your system.</h2>  

git clone https://github.com/reykel/laravel-8-api-rest-crud-passport-auth.git

    cd Laravel-8-REST-API-with-Passport-Authentication

<h2>Step 2: Configure your database from .env file</h2> 

    DB_HOST=127.0.0.1

    DB_PORT=3306
    
    DB_DATABASE=your_DB_name
    
    DB_USERNAME=your_user_name
    
    DB_PASSWORD=your_password

<h2>Step 3: composer install</h2> 
    
    composer install

<h2>Step 4: Migrate</h2> 
    
    php artisan migrate

<h2>Step 5: Run install for Passport</h2>  

    php artisan passport:install

<h2>Step 6: Set the application key</h2>  

    php artisan key:generate

<h2>Step 7: Run server</h2>  

    php artisan serve

