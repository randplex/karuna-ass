# karuna_ass
 Assessment


This is a Laravel product management system that allows you to create, view, edit, search and delete products. The application is doen as an assessment for KARUNA,

---

## Requirements

Make sure you have the following installed on your system before proceeding:
- PHP >= 8.0
- Composer
- MySQL
- Node.js and npm (for frontend assets)
- Laravel CLI (optional)

---

## Installation

Follow these steps to set up the project locally:

### 1. Clone the Repository
```bash
git clone <repository-url>
cd <repository-folder>


###Install PHP dependencies and Node.js dependencies:
composer install
npm install
npm run dev

###Copy the .env.example file to create a .env file:
cp .env.example .env

###Generate Application Key
php artisan key:generate

###Set Up the Database
php artisan migrate

###Start server
php artisan serve

###Go to browser 
http://127.0.0.1:8000

Log in then you may proceed to http://127.0.0.1:8000/products to view the program