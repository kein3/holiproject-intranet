#!/usr/bin/env bash
set -e

# Update package list and install PHP with required extensions
sudo apt-get update
sudo apt-get install -y php php-cli php-mbstring unzip curl

# Install Composer
EXPECTED_CHECKSUM="$(wget -q -O - https://composer.github.io/installer.sig)"
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '$EXPECTED_CHECKSUM') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); exit(1); }"
php composer-setup.php --quiet
php -r "unlink('composer-setup.php');"
sudo mv composer.phar /usr/local/bin/composer

composer --version
