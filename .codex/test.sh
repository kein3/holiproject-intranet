#!/usr/bin/env bash
set -e

if ! command -v php >/dev/null; then
    echo "PHP is not installed. Please run .codex/setup.sh to install dependencies." >&2
    exit 1
fi

vendor/bin/phpunit "$@"
