#!/usr/bin/env bash
set -e

echo "=== Phase de setup Codex : installation des dépendances ==="

# 1. Mettre à jour les paquets et installer PHP + extensions
apt-get update
apt-get install -y \
  php php-cli php-mbstring php-xml php-zip php-intl \
  unzip curl git zip sqlite3 php-sqlite3

# 2. Installer Composer dans ~/.local/bin
EXPECTED_SIG="$(wget -q -O - https://composer.github.io/installer.sig)"
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('SHA384','composer-setup.php') !== '$EXPECTED_SIG') { \
    echo 'ERROR: Invalid Composer installer signature'; \
    unlink('composer-setup.php'); exit 1; \
  }"
php composer-setup.php --install-dir="$HOME/.local/bin" --filename=composer --quiet
php -r "unlink('composer-setup.php');"
export PATH="$HOME/.local/bin:$PATH"

# 3. Vérifier les versions
echo "PHP version : $(php -v | head -n 1)"
echo "Composer version : $(composer --version)"

# 4. Installer les dépendances du projet
cd "$(dirname "$0")/.."
composer install --no-interaction --prefer-dist --optimize-autoloader

# 5. Configurer SQLite (pour éviter les erreurs « could not find driver »)
touch database.sqlite
php artisan migrate --force

echo "=== Setup Codex terminé ==="
