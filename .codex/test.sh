#!/usr/bin/env bash
set -e

if ! command -v php >/dev/null; then
rxq017-codex/afficher-toutes-les-applications-dans-le-tableau-de-bord
  echo "PHP is not installed. Run .codex/setup.sh first." >&2
  exit 1

    echo "PHP is not installed. Please run .codex/setup.sh to install dependencies." >&2
    exit 1
main
fi

vendor/bin/phpunit "$@"
