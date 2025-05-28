# HoliProject Intranet

## Development Setup

This project requires PHP 8.2 or higher. To get started:

1. Install PHP and Composer.
2. Run `composer install` to install dependencies.
3. Copy `.env.example` to `.env` and run `php artisan key:generate`.
4. Run the local server with `php artisan serve`.

## Running Tests

Execute the test suite with:

```bash
vendor/bin/phpunit
```

If PHP is missing in your environment, install it first or use a Docker setup such as Laravel Sail.
