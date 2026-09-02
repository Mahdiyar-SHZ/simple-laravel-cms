# Laravel Basic Project

A clean and functional web application built with Laravel, featuring core administrative modules, a secure contact system, and automated backup solutions.

## 🚀 Features

* **Contact Us Module:** Secure message validation, administrative message viewing with protected interfaces, and deletion capabilities.
* **Automated & Manual Backups:** Integrated with `spatie/laravel-backup` to securely archive database dumps and local storage files.
* **Admin Interface:** Clean, straightforward management control panel for handling application data.

## 🛠️ Prerequisites

Make sure you have the following installed on your local machine:
* PHP (>= 8.2 recommended)
* Composer
* MySQL / MariaDB
* Node.js & NPM (if working with frontend assets)

## 📦 Installation & Setup

Follow these steps to set up and run the project locally:

1. **Clone the repository:**
   ```bash
   git clone https://github.com/Mahdiyar-SHZ/simple-laravel-cms.git
   cd basic


2. **Install PHP dependencies:**
```bash
composer install

```


3. **Configure environment file:**
```bash
cp .env.example .env

```


*Open the `.env` file and update your database credentials (`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`).*
4. **Generate application key:**
```bash
php artisan key:generate

```


5. **Run database migrations:**
```bash
php artisan migrate

```


6. **Run the local development server:**
```bash
php artisan serve

```



## 💾 Backup Management

This project uses the Spatie backup package. To manually trigger a full system and database backup, run:

```bash
php artisan backup:run

```

Backups are safely stored within your `storage/app/` directory.

## 👤 Author

* **Mahdiyar** - [GitHub Profile]([https://www.google.com/search?q=https://github.com/Mahdiyar-SHZ](https://github.com/Mahdiyar-SHZ))
