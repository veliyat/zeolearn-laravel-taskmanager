# Laravel Task Manager

A task manager built with **Laravel 5.7** and **MySQL**, with user accounts and an admin area.

This is a **training project**. I built it for Laravel workshops to demonstrate authentication, resource controllers, Eloquent models, migrations, and generating exports from application data. It is not a production application.

## Features

- User registration and login (Laravel auth scaffolding)
- Task management: create, view, edit and delete tasks (Laravel resource controller)
- Admin area (`/admin`) with an activation toggle for users
- Data export from the admin area (`/admin/download`), with `dompdf` and `maatwebsite/excel` installed for PDF and Excel output
- PHPUnit test scaffolding

## Tech stack

- PHP 7.1.3+
- Laravel 5.7
- MySQL
- [dompdf](https://github.com/dompdf/dompdf) for PDF generation
- [Laravel Excel](https://laravel-excel.com/) (`maatwebsite/excel` 3.x)
- Laravel Mix (webpack) for front-end assets
- PHPUnit

## Prerequisites

- PHP 7.1.3 or higher with the usual Laravel extensions
- [Composer](https://getcomposer.org/)
- MySQL

## Getting started

1. Clone the repo:

   ```bash
   git clone https://github.com/veliyat/zeolearn-laravel-taskmanager.git
   cd zeolearn-laravel-taskmanager
   ```

2. Create an empty MySQL database.

3. Copy the environment file and set your `DB_DATABASE`, `DB_USERNAME` and `DB_PASSWORD`:

   ```bash
   cp .env.example .env
   ```

4. Install dependencies and set up the app:

   ```bash
   composer install
   php artisan key:generate
   php artisan migrate
   php artisan serve
   ```

5. Open http://127.0.0.1:8000. The root URL redirects to `/home`, which requires login. Register a user first.

## Routes at a glance

| URI | Handler | Notes |
|---|---|---|
| `/login`, `/register`, ... | `Auth::routes()` | Laravel authentication |
| `/home` | `HomeController@index` | Landing page after login |
| `/tasks` | `TaskController` (resource) | Task CRUD |
| `/admin` | `AdminController@index` | Admin area |
| `/admin/download` | `AdminController@download` | Export |
| `PATCH /activation/{user}` | closure | Toggles a user's `active` flag |

## Running the tests

```bash
vendor/bin/phpunit
```

## Status and limitations

- Built on Laravel 5.7 and PHP 7.1, both end-of-life. Fine for learning, not for deployment as is.
- Admin routes in this workshop version are kept simple and are not fully locked down. A production app would add authorization checks (middleware or policies) on every admin route.

## Author

Ravi Veliyat: [GitHub](https://github.com/veliyat) · [YouTube](https://www.youtube.com/raviveliyat)
