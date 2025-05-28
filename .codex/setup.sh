#!/usr/bin/env bash
set -e

echo "=== Phase de setup Codex : installation des dépendances ==="

# 1. Met à jour la liste des paquets et installe PHP + extensions
apt-get update
apt-get install -y \
  php php-cli php-mbstring php-xml php-zip php-intl \
  unzip curl git zip

# 2. Installe Composer en toute sécurité
EXPECTED_SIG="$(wget -q -O - https://composer.github.io/installer.sig)"
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('SHA384','composer-setup.php') !== '$EXPECTED_SIG') { \
    echo 'ERROR: Invalid Composer installer signature'; \
    unlink('composer-setup.php'); exit 1; \
  }"
php composer-setup.php --install-dir=/usr/local/bin --filename=composer --quiet
php -r "unlink('composer-setup.php');"

# 3. Test de connectivité réseau (doit passer ici, réseau autorisé)
echo "=== Test de connexion à api.github.com ==="
if curl -sI https://api.github.com | head -n1 | grep "200 OK" > /dev/null; then
  echo "Réseau OK"
else
  echo "ERREUR : pas de connexion réseau pendant le setup"
  exit 1
fi

# 4. Installe les dépendances PHP du projet
echo "=== Installation des dépendances du projet ==="
composer install --no-interaction --prefer-dist --optimize-autoloader

# 5. (Optionnel) Génère l’autoload optimisé
composer dump-autoload --optimize

# 6. Affiche les versions pour debug
echo "=== Versions installées ==="
php -v
composer --version

echo "=== Setup terminé avec succès ==="
