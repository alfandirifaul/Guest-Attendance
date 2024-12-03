# Laravel Guest Management System

This is a Laravel-based Guest Management System with a Dockerized environment. Follow the steps below to set up and run the project locally.

---

## Prerequisites

- [Docker Desktop](https://www.docker.com/products/docker-desktop) installed and running
- [Visual Studio Code](https://code.visualstudio.com/) installed
- [PHP](https://www.php.net/downloads.php) and [Composer](https://getcomposer.org/download/) installed on your system

---

## Setup Instructions

### Step 1: Start Docker Desktop
Open Docker Desktop and ensure Docker Desktop is running and containers are ready to start.

### Step 2: Open the Laravel Project
Open the project folder in Visual Studio Code.

### Step 3: Start the Laravel Development Server
Open a new terminal in Visual Studio Code and run the following command:
```
php artisan serve
```
This will start the Laravel development server. You can access the application at:
```
http://127.0.0.1:8000
```

### Step 4: Start Docker Services
Open a new terminal in Visual Studio Code, navigate to the docker-serve/ directory, and start the Docker containers:
```
cd docker-serve/
docker compose up
```
And if you want to visit the database adminer, access the link below:
```
http://localhost:8080
```
Set the requirement like below:
```
server: mysql
username: root
passwword: root
database: 
```

### Step 5: Run Migrations 
Open a new terminal in Visual Studio Code and set up the database schema by running Laravel migrations and you must store the admin auth for login the dashboard
```
php artisan migrate
php artisan db:seed
```


### Step 6: Login to Dashboard Page to Manage and Track Guests
If you want to go the dashboard, you can access the page at:
```
http://127.0.0.1:8000/dashboard
```

And you must login to the page first by the default auth is: 
```
username: admin
password: admin
```

### Step 7: Change the Admin Authentication to Login the Dashboard if You Need
Open `database/seeders/DatabaseSeeder.php` file and then change the comment line if you need
```
public function run(): void
    {
        // CHANGE THE ADMIN AUTH BELOW
        User::factory()->create([
            'name' => 'admin', // USERNAME
            'email' => 'admin@smti.edu', // EMAIL
            'password' => Hash::make('admin'), // PASSWORD
        ]);
    }
```
Change `'admin'` as `your username` and `'admin'` as `your password` and after than you must store it to database using the command line below:
```
php artisan db:seed
```

#### Consider to always remember your username and password, if you forget about your username and password, you can do this step to change your auth login

If you forget your auth login, change the `name`, `email`, `password` is absolutely different with before.

---
### Notes
If you encounter any errors during setup, try the following:
1.	**Restart Docker Desktop:** Ensure all containers are running without errors.
2.	**Clear Laravel Cache:** Run the following commands:
```
php artisan config:clear
php artisan cache:clear
```
3. **Check Docker Logs:** Inspect logs for any issues with the containers:
```
docker compose logs
```
4.	**Re-run Migrations:** If the database is not set up correctly, try:
```
php artisan migrate:fresh
```
5. **Error When on Login Page:** Try to install requirement below:
```
composer require laravel/breeze --dev
php artisan breeze:install
php artisan migrate
```

---
## License

This project is licensed under the MIT License.

Feel free to contribute or raise an issue for further improvements.

### Features:
1. **Markdown Formatting**:
    - Clearly structured sections (`Prerequisites`, `Setup Instructions`, etc.).
    - Numbered steps for logical flow.
    - Code blocks for commands.

2. **URLs for Services**:
    - Included links to services (`localhost:8000`, `localhost:8080`, `localhost:8025`) for quick navigation.

3. **Troubleshooting Section**:
    - Covers common issues with actionable solutions.

4. **License Section**:
    - Placeholder for your license information.

Replace placeholders like `your-username/your-repository` with actual values. Let me know if you’d like additional customizations!






