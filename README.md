# Basic Shop functionality
This was done as a Job interview assessment.

# Features

Posts<br/>
Post categories, Many to Many eloquent relationship<br/>
User, One to Many eloquent relationship<br/>

# Requirements

Linux/Unix, WAMP/XAMP/Laragon or MacOS environment<br/>
PHP >= 8.0<br/>
MySQL >= 5.7.8, MariaDB >= 10.2.2<br/>
Web server (Apache, Nginx or integrated PHP web server for testing)<br/>
If required PHP extensions are missing, composer will tell you about the missing dependencies.<br/>

# Installation

**Follow git instructions on how to clone a repository or you can download the project as a zip folder extract the zip folder into you host server root**

*Make sure your CLI/bash/terminal is in the project folder*<br/>
*Use vs code, however you can use any code editor you like*

To install this application, composer >= 2.1 is required. On the CLI, execute this command for a complete installation including a working setup:

<pre>Composer install</pre>

You will also need to install NPM dependencies for the frontend (make sure you have node installed on your computer)

<pre>npm install && npm run dev</pre>

Create env file. In the .env file add your database credentials then generate an app_key

<pre>cp .env.example .env</pre>

Generate APP_KEY

<pre>php artisan key:generate</pre>

Create a Database in MySQL then add database name/username/password inside your .env that you created

<pre>
DB_CONNECTION=mysql<br/>
DB_HOST=127.0.0.1<br/>
DB_PORT=3306<br/>
DB_DATABASE=laravel<br/>
DB_USERNAME=root<br/>
DB_PASSWORD=<br/>
</pre>

Run migration to add tables into the database and seed entries into the database using the following command in your CLI

<pre>php artisan migrate --seed</pre>

Lastly run application

<pre>php artisan serve</pre>

You can log into the app using the following credentials:
<code>admin@admin.com</code>
<code>password</code>


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
