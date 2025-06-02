#!/usr/bin/env bash
set -e

# Ensure environment file exists
if [ ! -f .env ]; then
  echo "Copying .env.example to .env" >&2
  cp .env.example .env
fi

# Generate application key if missing
if ! grep -q '^APP_KEY=' .env || [ -z "$(grep '^APP_KEY=' .env | cut -d '=' -f2)" ]; then
  echo "Generating application key" >&2
  php artisan key:generate --ansi
fi

# Run database migrations if possible
if [ -n "$(grep '^DB_CONNECTION=' .env | cut -d '=' -f2)" ]; then
  echo "Running database migrations" >&2
  php artisan migrate --force
fi
