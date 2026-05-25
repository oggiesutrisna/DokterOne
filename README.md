# DokterOne

DokterOne is a Laravel-based clinic and patient management application for managing patient records, generating COVID-19 test certificates, and verifying certificate authenticity through QR codes.

## Features

- Patient management with create, read, update, and delete workflows.
- COVID-19 antigen and PCR certificate generation.
- Printable A4 PDF output powered by DomPDF.
- QR-code based certificate verification.
- Slug-based patient URLs for cleaner public links.
- Authentication and staff-facing dashboard screens.

## Tech Stack

- PHP 8.1+
- Laravel 10
- MySQL
- Laravel UI
- Blade templates
- Bootstrap 4
- jQuery
- Laravel Mix
- DomPDF
- chillerlan/php-qrcode

## Requirements

- PHP 8.1 or newer with the GD extension enabled.
- Composer.
- Node.js and npm.
- MySQL or another Laravel-supported database.

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/oggiesutrisna/DokterOne.git
   cd DokterOne
   ```

2. Install PHP dependencies:

   ```bash
   composer install
   ```

3. Install JavaScript dependencies:

   ```bash
   npm install
   ```

4. Create the environment file and application key:

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. Configure the database connection in `.env`.

6. Run migrations and seeders:

   ```bash
   php artisan migrate:fresh --seed
   ```

7. Build frontend assets:

   ```bash
   npm run dev
   ```

8. Start the local server:

   ```bash
   php artisan serve
   ```

## Default Credentials

After seeding the database, sign in with:

- Username: `admin`
- Password: `password`

## Common Commands

```bash
php artisan test
./vendor/bin/pint
npm run dev
npm run watch
npm run production
```

## Project Structure

- `app/Http/Controllers/` - Web controllers.
- `app/Http/Requests/` - Form request validation.
- `app/Models/` - Eloquent models.
- `database/migrations/` - Database schema changes.
- `database/seeders/` - Seed data.
- `resources/views/` - Blade templates.
- `routes/web.php` - Web routes.
- `tests/Feature/` - Feature tests.
- `tests/Unit/` - Unit tests.

## License

DokterOne is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

Built by [Oggie Sutrisna](https://twitter.com/oggiesutrisna).
