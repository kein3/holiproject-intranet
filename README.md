rxq017-codex/afficher-toutes-les-applications-dans-le-tableau-de-bord
# HoliProject Intranet

This project uses Laravel. The provided helper scripts make it easier to set up
PHP and run the test suite in Codex environments.

## Setup

Run the setup script to install PHP, Composer and the project dependencies:

2vdq1h-codex/afficher-toutes-les-applications-dans-le-tableau-de-bord
# Holiproject Intranet

This project uses Laravel. To run the test suite you must install PHP and Composer.

## Setup

Run the provided setup script to install PHP, Composer and other dependencies:
main

```bash
bash .codex/setup.sh
```

rxq017-codex/afficher-toutes-les-applications-dans-le-tableau-de-bord
## Testing

After setup, run the tests with:

After setup, you can run the tests with:
main

```bash
bash .codex/test.sh
```

rxq017-codex/afficher-toutes-les-applications-dans-le-tableau-de-bord
The test script checks that PHP is available and delegates to `vendor/bin/phpunit`.


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
main
main
