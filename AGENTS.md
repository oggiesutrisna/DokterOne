# AGENTS.md

Build, lint, test commands and code style guidelines for agentic coding in DokterOne.

## Essential Commands

### Build
- `npm run dev` - Compile assets for development
- `npm run watch` - Watch and recompile assets on changes
- `npm run production` - Compile assets for production (optimized)

### Lint
- `./vendor/bin/pint` - Fix PHP code style (Laravel preset, PSR-12)
- `vendor/bin/php-cs-fixer fix` - Fix PHP with @auto preset
- `eslint public/assets/js/` - Lint JavaScript

### Test
- `php artisan test` - Run all tests (PHPUnit 10)
- `php artisan test --filter test_name` - Run single test
- `vendor/bin/phpunit` - Alternative test runner
- `php artisan test --filter test_method_name` - Run specific test method

### Other
- `php artisan serve` - Start development server
- `php artisan migrate:fresh --seed` - Reset database with seeders

## PHP Code Style

- **Formatter**: Laravel Pint (preset: laravel, configured in .styleci.yml)
- **Standard**: PSR-12 coding conventions
- **Indentation**: 4 spaces (enforced by .editorconfig)
- **Line endings**: LF (Unix-style)
- **Trailing whitespace**: Trimmed
- **Strict types**: declare(strict_types=1) used in php-cs-fixer config
- **Type hints**: Preferred for method signatures and return types

## Naming Conventions

- **Classes**: PascalCase (PasienController, Pasien, StorePasienRequest)
- **Methods**: camelCase (index, create, store, update, destroy)
- **Variables**: camelCase ($pasien, $pasiens, $count)
- **Constants**: UPPER_SNAKE_CASE
- **Tables**: snake_case plural (pasiens, users, password_resets)
- **Columns**: snake_case (nomor_pid, sampling_time, email_verified_at)
- **Routes**: kebab-case names (pasiens.index, createPDF, previewPDF)
- **Views**: snake_case folders, kebab-case files (pasiens/index.blade.php)

## Import Organization

```php
<?php

namespace App\Http\Controllers;

// External imports (Laravel core, packages)
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// Internal imports
use App\Models\Pasien;
use App\Http\Requests\StorePasienRequest;
```

Order: namespace -> external imports -> internal imports -> class definition

## Error Handling

- **Validation**: Use Form Request classes (StorePasienRequest, UpdatePasienRequest)
- **User feedback**: Flash messages with `redirect()->route('name')->with('success', 'message')`
- **Authorization**: Form request `authorize()` method returns true for open access
- **Exceptions**: Laravel's default exception handling

## Testing Conventions

- **Framework**: PHPUnit 10.x
- **Structure**: tests/Feature/ and tests/Unit/
- **Feature tests**: Extend `Tests\TestCase` (includes Laravel app)
- **Unit tests**: Extend `PHPUnit\Framework\TestCase`
- **Test methods**: Prefix with `test_`
- **Traits**: Use `RefreshDatabase` for database tests
- **Assertions**: Laravel testing methods (`assertStatus()`, `assertRedirect()`, etc.)
- **Single test**: `php artisan test --filter test_method_name`

## Frontend Conventions

### Blade
- **Section names**: kebab-case (@section('content'), @yield('title'))
- **Directives**: @extends, @section, @yield, @include, @foreach, @if
- **Output**: `{{ }}` for escaped, `{!! !!}` for unescaped
- **URLs**: `{{ route('name') }}` for routes, `{{ asset('path') }}` for assets

### JavaScript
- **Language**: ES5 with jQuery (per .eslintrc.json)
- **Indentation**: 2 spaces
- **Semicolons**: Disabled (no semicolons)
- **Libraries**: jQuery, Bootstrap 4, SweetAlert2, Axios
- **Linting**: XO + Unicorn rules (configured in .eslintrc.json)

### CSS
- **Framework**: Bootstrap 4 + AdminLTE 3
- **Icons**: FontAwesome
- **Compilation**: Laravel Mix (webpack.mix.js)
- **Preprocessor**: Sass/SCSS

## Database & Models

- **Migrations**: snake_case file names (create_pasiens_table.php)
- **Models**: PascalCase singular (Pasien, User, Price)
- **Fillable**: Define $fillable array for mass assignment
- **Hidden**: Define $hidden for sensitive fields (password, remember_token)
- **Casts**: Define $casts for type conversion (datetime, json)
- **Route binding**: Override getRouteKeyName() for custom keys (slug instead of id)
- **Model events**: Use boot() for events (creating, updating)
- **Timestamps**: Automatic $timestamps = true
- **Soft deletes**: Not used by default

## Controller Patterns

- **Resource controllers**: Use Route::resource() with CRUD methods
- **Route model binding**: Inject models in methods (public function show(Pasien $pasien))
- **Form requests**: Type-hint in store/update methods
- **Responses**: redirect()->route() with flash messages
- **Views**: Use view() with compact() for data passing
- **Authorization**: Middleware in constructor or middleware groups

## Blade Patterns

- **Layouts**: @extends('layouts.admin') for admin pages
- **Partials**: @include('partials.flash-message') for reusable components
- **Sections**: @section('title') for page-specific content
- **Conditionals**: @if, @foreach, @forelse for control flow
- **Forms**: Use CSRF with @csrf, method spoofing with @method('DELETE')
- **Links**: {{ route('pasiens.show', $pasien) }} for model routes (uses slug)

## File Organization

- `app/Http/Controllers/` - Controller classes
- `app/Http/Requests/` - Form Request validation classes
- `app/Models/` - Eloquent models
- `database/migrations/` - Database schema changes
- `resources/views/` - Blade templates (organized by feature)
- `routes/web.php` - Web routes
- `tests/Feature/` - Feature tests
- `tests/Unit/` - Unit tests
