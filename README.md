# HoliProject Intranet

This Laravel project includes helper scripts for developing and testing in Codex environments.

## Quick Start

Run the setup script to install PHP, Composer and all project dependencies:

```bash
bash .codex/setup.sh
```

Next, copy the example environment file and generate an application key:

```bash
cp .env.example .env
php artisan key:generate
```

After the setup completes, execute the test suite:

```bash
bash .codex/test.sh
```

## Requirements

- PHP 8.2 or higher
- Composer

## Manual Development Setup

If you prefer to manage your own environment:

1. Install PHP and Composer.
2. Run `composer install` to install dependencies.
3. Copy `.env.example` to `.env` and run `php artisan key:generate`.
4. Start the application with `php artisan serve`.

## Running PHPUnit

You can invoke the test runner directly:

```bash
vendor/bin/phpunit
```

If PHP is not installed, run `.codex/setup.sh` or use a containerized approach such as Laravel Sail.
