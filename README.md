# Booking System

## Project Installation

Use following step to install project

```bash
git clone git@github.com:vishnaka/onlineexam.git
cd into your project
composer install
npm install
cp .env.example .env

Changed below setting in .env file
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE="yours"
DB_USERNAME="yours"
DB_PASSWORD="yours"

php artisan key:generate
php artisan migrate
php artisan db:seed
```

## Login Information

Use following users to login to system

```bash
Email : user1@email.com
PWD : 1234

Email : user2@email.com
PWD : 1234
```
