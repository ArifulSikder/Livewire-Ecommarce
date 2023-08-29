<p align="center"><a href="https://laravel.com" target="_blank"><img src="public/full site.png" width="400" alt="Laravel Logo"></a></p>

## About Laravel, Livewire And PHP Version


-   [Laravel Version 9.19](https://laravel.com/docs/routing).
-   [PHP Version 8.28](https://laravel.com/docs/container).
-   [Livewire 2](https://laravel-livewire.com/docs/2.x/quickstart).

## How to clone.
Just copy the following command and past into you terminal.

    $ git clone https://github.com/ArifulSikder/Livewire-Ecommarce.git

After complete cloning, open your project directory. just run the following command.

    cd Livewire-Ecommarce

Then run the following two(2) command.

    composer update.

And also

    npm install

For run your project simply run the following command.

    php artisan server

Opps! You got some database related errors. You you need to make database connection. Connect to the database and from the projects main directory, there is a folder called "sql". From this folder import database called "data.sql".

Now, you must notice that the style file and css file is not working properly. For solve this issue, run the following command.

    npm run dev

Thats it your livewire project is working fine without any loading issues. Just single page application.

Now, If you want to login the admin panel, just the the endpoint of login. And Your credentials are below:

    Email: admin@gmail.com
    Password: 12345678


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
