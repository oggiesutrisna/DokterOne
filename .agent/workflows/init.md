---
description: Initialize the DokterOne Laravel application for local development
---

# DokterOne Initialization Workflow

This workflow sets up the DokterOne Laravel 8 medical/clinic management application for local development.

## Prerequisites
- PHP 7.3+ or PHP 8.0+ with GD extension enabled
- Composer installed globally
- Node.js and npm installed
- MySQL database server running
- Git (for version control)

## Setup Steps

### 1. Install PHP Dependencies
```bash
composer install
```

### 2. Install Node.js Dependencies
```bash
npm install
```

### 3. Environment Configuration
Copy the example environment file and configure it:
```bash
copy .env.example .env
```

Then edit `.env` and configure these key settings:
- `APP_NAME` - Set to "DokterOne"
- `APP_URL` - Your local URL (default: http://localhost)

#### Option A: SQLite (Recommended for simple setup)
```env
DB_CONNECTION=sqlite
DB_DATABASE=f:/DokterOne/database/database.sqlite
DB_FOREIGN_KEYS=true
```
Make sure `database/database.sqlite` file exists (create an empty file if needed).

#### Option B: MySQL
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=dokterone
DB_USERNAME=root
DB_PASSWORD=your_password
```

### 4. Generate Application Key
```bash
php artisan key:generate
```

### 5. Create Database
Create a MySQL database matching your `DB_DATABASE` setting in `.env`:
```sql
CREATE DATABASE dokterone;
```

### 6. Run Database Migrations
```bash
php artisan migrate
```

### 7. Seed Database (Optional)
If seeders are available:
```bash
php artisan db:seed
```

### 8. Compile Frontend Assets
For development:
```bash
npm run dev
```

For production:
```bash
npm run prod
```

### 9. Start Development Server
```bash
php artisan serve
```

The application will be available at http://127.0.0.1:8000

## Quick Start (All-in-One)
If you have all prerequisites installed and a database ready:
```bash
composer install
npm install
copy .env.example .env
php artisan key:generate
php artisan migrate
npm run dev
php artisan serve
```

## Common Commands

| Command | Description |
|---------|-------------|
| `php artisan serve` | Start development server |
| `php artisan migrate` | Run database migrations |
| `php artisan migrate:fresh` | Drop all tables and re-run migrations |
| `php artisan db:seed` | Seed the database |
| `php artisan cache:clear` | Clear application cache |
| `php artisan config:clear` | Clear config cache |
| `php artisan route:list` | List all registered routes |
| `npm run watch` | Watch and compile assets on change |

## Project Structure

- `app/` - Application core (Controllers, Models, Providers)
- `config/` - Configuration files
- `database/` - Migrations, factories, and seeders
- `public/` - Public assets and entry point
- `resources/` - Views, raw assets (JS, CSS, SASS)
- `routes/` - Route definitions (web.php, api.php)
- `storage/` - Logs, cache, and uploaded files
- `tests/` - PHPUnit tests

## Key Dependencies

- **Laravel 8.40+** - PHP Framework
- **Laravel UI 3.3** - Frontend scaffolding
- **Bootstrap 4.6** - CSS Framework
- **barryvdh/laravel-dompdf** - PDF generation
- **phpoffice/phpword** - Word document generation
- **simplesoftwareio/simple-qrcode** - QR code generation
