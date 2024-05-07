# Task Manager Laravel Project

This repository contains a simple task manager application built with Laravel.

## Prerequisites
- PHP 8.0 or later
- Composer
- PostgreSQL or another supported database
- Node.js and npm (for front-end assets)

## Setup Instructions
1. Clone the repository to your local machine.

   git clone https://github.com/your-username/task-manager-laravel.git
   
   cd task-manager-laravel

2. Install PHP dependencies with Composer.

   composer install

3. Install front-end dependencies with npm.

   npm install

4. Create a .env file by copying the example and update it with your environment settings.

   cp .env.example .env

  - Update database connection details (DB_HOST, DB_DATABASE, DB_USERNAME, DB_PASSWORD).

5. Generate an application key.

   php artisan key:generate

6. Run database migrations.

   php artisan migrate

# Running the Application
1. Start the Laravel development server.

   php artisan serve

2. Open a web browser and navigate to the provided URL (usually http://localhost:8000).

# Design Choices
- The project uses Laravel's Eloquent ORM for database interactions.
- Bootstrap is used for front-end design and responsiveness.
- The application allows CRUD operations on tasks and provides sorting and filtering    functionality.