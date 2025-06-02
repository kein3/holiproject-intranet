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

hux0tn-codex/exclure-.env-de-git-et-ajouter-.env.example
After copying, edit `.env` to add your database credentials and other
secrets. This file should never be committed to version control.


 0addug-codex/exclure-.env-de-git-et-ajouter-.env.example
After copying, edit `.env` to add your database credentials and other
secrets. This file should never be committed to version control.

After the script completes, edit `.env` to add your database credentials
and other secrets. This file should never be committed to version control.
main

main
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
 0addug-codex/exclure-.env-de-git-et-ajouter-.env.example
3. Copy `.env.example` to `.env` and run `php artisan key:generate`.
   Provide your own credentials in the new `.env` file and keep it out
   of version control.

hux0tn-codex/exclure-.env-de-git-et-ajouter-.env.example

3. Execute `bash scripts/setup.sh` to create `.env`, generate the
   application key and run the migrations. Provide your own credentials
   in the new `.env` file and keep it out of version control.
 main
main
4. Start the application with `php artisan serve`.

## Deployment

On a production server, copy `.env.example` to `.env` and generate an
application key:

```bash
cp .env.example .env
php artisan key:generate
```

Fill in your database credentials and other secrets directly in this
`.env` file on the server. Keep it out of Git. If `.env` or `APP_KEY` is
missing, Laravel will respond with a 500 error.

## Running PHPUnit

You can invoke the test runner directly:

```bash
vendor/bin/phpunit
```

If PHP is not installed, run `.codex/setup.sh` or use a containerized approach such as Laravel Sail.

## Deployment

For production deployments, copy `.env.example` to `.env` on the server and
configure all required secrets. Keep this `.env` file out of version control and
manage values through your hosting provider or a secret manager. The application
will fail with a 500 error if the environment file or `APP_KEY` is missing.
