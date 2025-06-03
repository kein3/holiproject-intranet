#!/usr/bin/env bash
set -e

echo "=== Phase de setup Codex : installation des dépendances ==="

# 1. Mettre à jour la liste des paquets
apt-get update

# 2. Installer PHP, ses extensions courantes et SQLite
apt-get install -y \
  php php-cli php-mbstring php-xml php-zip php-intl \
  unzip curl git zip sqlite3 php-sqlite3

# 3. Installer Composer globalement dans /usr/local/bin
EXPECTED_SIG="$(wget -q -O - https://composer.github.io/installer.sig)"
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('SHA384','composer-setup.php') !== \"${EXPECTED_SIG}\") { \
    echo 'ERROR: Invalid Composer installer signature'; \
    unlink('composer-setup.php'); exit 1; \
  }"
php composer-setup.php --install-dir=/usr/local/bin --filename=composer --quiet
php -r "unlink('composer-setup.php');"

# 4. Vérifier que php et composer sont maintenant disponibles
echo "PHP version : $(php -v | head -n 1)"
echo "Composer version : $(composer --version)"

# 5. Installer les dépendances Laravel
cd /home/holiprojectcom/intranetV3
composer install --no-interaction --prefer-dist --optimize-autoloader

# 6. Créer le fichier SQLite et lancer les migrations
touch database.sqlite
php artisan migrate --force

echo "=== Setup Codex terminé ==="
