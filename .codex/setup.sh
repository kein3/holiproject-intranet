#!/usr/bin/env bash
set -e

# 1. Met à jour et installe PHP + extensions utiles
apt-get update
apt-get install -y \
  php php-cli php-mbstring php-xml php-zip php-intl \
  unzip curl git zip

# 2. Installe Composer de façon sécurisée
EXPECTED_SIG="$(wget -q -O - https://composer.github.io/installer.sig)"
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('SHA384','composer-setup.php') !== '$EXPECTED_SIG') { echo 'ERROR: Invalid installer signature'; unlink('composer-setup.php'); exit(1); }"
php composer-setup.php --install-dir=/usr/local/bin --filename=composer --quiet
php -r "unlink('composer-setup.php');"

# 3. Installe les dépendances du projet (network OK ici)
composer install --no-interaction --prefer-dist --optimize-autoloader

# 4. Vérif debug
php -v
composer --version
