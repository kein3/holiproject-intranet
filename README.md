# HoliProject Intranet

This Laravel project includes helper scripts for developing and testing in Codex environments.

## Quick Start

Run the setup script to install PHP, Composer and all project dependencies:

```bash
bash .codex/setup.sh
```

Next, run the helper script to create your `.env` file, generate the
application key and apply the database migrations:

```bash
bash scripts/setup.sh
```

After the script completes, edit `.env` to add your database credentials
and other secrets. This file should never be committed to version control.

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
3. Execute `bash scripts/setup.sh` to create `.env`, generate the
   application key and run the migrations. Provide your own credentials
   in the new `.env` file and keep it out of version control.
4. Start the application with `php artisan serve`.

## Running PHPUnit

You can invoke the test runner directly:

```bash
vendor/bin/phpunit
```

If PHP is not installed, run `.codex/setup.sh` or use a containerized approach such as Laravel Sail.
