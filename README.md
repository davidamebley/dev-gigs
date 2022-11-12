# DEV GIGS (FullStack App with Laravel)

## Description
With the demand for more personnel to fill or take up software development jobs, there is the need for a platform where companies can post their software-related job listings for qualified candidates from around the world to discover and apply to. The DEVeloper GIGS platform comes in to connect employers to their future employees.

## Installation
- To run this application, first make sure you have [PHP](https://www.php.net/manual/en/install.php), [Laravel](https://laravel.com/docs/9.x/installation), and [Composer](https://getcomposer.org/download/) installed. **Note:** You have to install Composer first, then you can install Laravel.

- The database used was created with Postgresql. Please make sure you have it installed or follow the instructions [here](https://www.postgresql.org/download/) to install it. <strong>Create an empty database for this application.</strong> You may use MySQL, SQLite, or any other RDMS.

- After installing these, clone this project repo onto your local machine.

- In the project root directory, run the following to install the Composer dependencies for this project:
<br /> <code>composer install</code>

- Create a copy of the <code> .env </code> file by cloning the <code> .env.example </code> file that comes with this project and renaming it. 
Use the following command: 
<br /> <code> cp .env.example .env</code> 
    - This clones and renames it to <code>.env</code>
    
- Generate an app encryption key in the <code> .env </code> file (which is required by Laravel to encode various elements of the app). Run the following command in the Terminal:
<br /> <code> php artisan key:generate </code>
    - **Note:** make sure Laravel is installed via Composer and the <code> .env</code> file is created before completing this step.
    
- Open the <code> .env </code> file and fill the various database connection fields with credentials from your created database. You may retrieve the necessary information using pgAdmin or the database tool you used. The fields you need to fill are:
<br /> DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, & DB_PASSWORD.
    - **Note:** Change the default <code> DB_CONNECTION </code> value in the <code> .env </code> file to __*'pgsql'*__ if you're using Postgres
    
- Run your database migrations after completing the credentials above with:
<br /> <code> php artisan migrate </code>
    - **Note:** You may use your database tool like pgAdmin to check if all your database tables were migrated successfully
    
- After running your migration successfully, run the following command:
<br /> <code> php artisan serve </code>
    - Running this command starts the application server and runs the app at: http://127.0.0.1:8000

<hr />

- UNAUTHENTICATED USERS MAIN SCREEN
<img src="https://github.com/davidamebley/dev-gigs/blob/main/public/images/app_screenshots/home_guest.png"/>

- LOGIN
<img src="https://github.com/davidamebley/dev-gigs/blob/main/public/images/app_screenshots/login_form.png"/>

- REGISTER
<img src="https://github.com/davidamebley/dev-gigs/blob/main/public/images/app_screenshots/register_form.png"/>

- CREATE NEW LISTING/GIG
<img src="https://github.com/davidamebley/dev-gigs/blob/main/public/images/app_screenshots/create_gig_form.png"/>

- GIG LISTINGS 
<img src="https://github.com/davidamebley/dev-gigs/blob/main/public/images/app_screenshots/gig_listings.png" />

- MANAGE LISTINGS
<img src="https://github.com/davidamebley/dev-gigs/blob/main/public/images/app_screenshots/manage_gigs_view.png" />

- EDIT LISTING
<img src="https://github.com/davidamebley/dev-gigs/blob/main/public/images/app_screenshots/edit_gig_form.png"/>

### Tech stack:
- <strong>Language:</strong> PHP
- <strong>Framework:</strong> Laravel
- <strong>Styling:</strong> Laravel Tailwind
- <strong>Database:</strong> PostgreSQL

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
