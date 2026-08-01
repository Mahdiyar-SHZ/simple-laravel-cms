# 🏢 Property Investment System

An advanced Web Application for managing property investments, assets, and real estate analytical data. Built with **Laravel 12** and **Blade Templating**.

---

### 🚀 Features & Capabilities
- 🔐 **Authentication & Authorization:** Secure user login, registration, and role management.
- 🏠 **Property Management:** CRUD operations for properties, listings, and investment types.
- 📊 **Financial & Investment Tracking:** Portfolio and investment data monitoring.
- 🎨 **Blade UI:** Clean, responsive front-end rendered with Laravel Blade.

---

### 🛠 Tech Stack
- **Backend Framework:** Laravel 12
- **Language:** PHP
- **Templating Engine:** Blade
- **Database:** MySQL / PostgreSQL
- **Environment:** Linux (Fedora)

---

### ⚙️ How to Run Locally

1. **Clone the repository:**
   ```bash
   git clone [https://github.com/MahdiyarDev/laravel-estate-invest.git](https://github.com/MahdiyarDev/laravel-estate-invest.git)
   cd laravel-estate-invest

```

2. **Install Backend & Frontend dependencies:**
```bash
composer install
npm install

```


3. **Configure Environment:**
```bash
cp .env.example .env
php artisan key:generate

```


4. **Setup Database & Run Migrations:**
> *Configure your database credentials in the `.env` file first.*


```bash
php artisan migrate --seed

```


5. **Start Development Server & Asset Bundler:**
```bash
npm run dev
php artisan serve

```
