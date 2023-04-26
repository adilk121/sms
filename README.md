<h1>Getting Started</h1>
<h2>Prerequisites</h2>
To run this project, you need to have the following installed on your system:

PHP 7.4 or later
Composer
MySQL

<h2>Installing</h2>

Clone the repository to your local machine:
git clone https://github.com/adilk121/sms.git

<h2>Install dependencies:</h2>

cd project-name
composer install

<h3>Create a new database and update the .env file with your database credentials:</h3>

DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password

Run database migrations and seeders:
php artisan migrate --seed
Generate an application key:

php artisan key:generate
Start the development server:

php artisan serve
Visit http://localhost:8000 in your browser to view the application.

<h2>Usage</h2>

Login to the admin dashboard with the following credentials:

Username: admin
Password: admin@123
Create teachers, guardians, classes, and subjects.

Create students and assign them to a teacher, guardian, class, and subject(s).

View and manage student details, attendance, and grades.

<h2>Features</h2>

Admin dashboard to manage teachers, guardians, classes, subjects, and students.
Student dashboard to view attendance, grades, and download reports.
Email notification to students on registration.
Forgot password functionality with email OTP verification.
CSV export of student details.
Built With
Laravel 8
Bootstrap 5

License

This project is licensed under the MIT License - see the LICENSE.md file for details.




