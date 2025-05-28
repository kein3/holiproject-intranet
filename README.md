# HoliProject Intranet

This project uses Laravel. The provided helper scripts make it easier to set up
PHP and run the test suite in Codex environments.

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
