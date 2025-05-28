#!/usr/bin/env bash
set -e

if ! command -v php >/dev/null; then
  echo "PHP is not installed. Run .codex/setup.sh first." >&2
  exit 1
fi

vendor/bin/phpunit "$@"
