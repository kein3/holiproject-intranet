# HoliProject Intranet

This project uses Laravel. The provided helper scripts make it easier to set up PHP and run the test suite in Codex environments.

## Setup

Run the setup script to install PHP, Composer and the project dependencies:

```bash
bash .codex/setup.sh
```

## Testing

After setup, run the tests with:

```bash
bash .codex/test.sh
```

The test script checks that PHP is available and delegates to `vendor/bin/phpunit`.

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
