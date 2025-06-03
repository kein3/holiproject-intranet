# HoliProject Intranet

Ce dépôt contient l'intranet **HoliProject** développé avec [Laravel 12](https://laravel.com/). Il s'appuie sur le starter kit Breeze pour l'authentification et utilise Vite ainsi que Tailwind CSS pour la partie front‑end.

## Fonctionnalités principales

- Authentification complète (inscription, connexion, réinitialisation de mot de passe)
- Tableau de bord proposant l'accès à l'intranet, au formulaire de contact et à la page de profil
- Formulaire de contact public enregistrant les messages dans la base via le modèle `Contact`
- Édition du profil utilisateur : nom, bio, avatar et mot de passe
- Modèles `User` et `Team` reliés par une relation many‑to‑many
- Page interne « Intranet » réservée aux utilisateurs connectés
- Suite de tests PHPUnit couvrant l'authentification, l'intranet, le formulaire de contact et la gestion du profil

## Pré‑requis

- PHP ≥ 8.2
- Composer
- Node.js et npm

## Installation rapide

1. Exécutez le script d'installation des dépendances :

   ```bash
   bash .codex/setup.sh
   ```

2. Générez le fichier `.env`, la clé d'application et appliquez les migrations :

   ```bash
   bash scripts/setup.sh
   ```

3. Modifiez ensuite `.env` pour y renseigner vos identifiants de base de données et autres secrets (ce fichier ne doit jamais être versionné).

## Lancement en développement

Installez les dépendances npm puis lancez Vite et le serveur Laravel :

```bash
npm install
npm run dev        # compile les assets en mode développement
php artisan serve  # démarre le serveur local
```

## Exécution de la batterie de tests

Utilisez le script fourni ou invoquez PHPUnit directement :

```bash
bash .codex/test.sh
# ou
vendor/bin/phpunit
```

## Déploiement

En production, copiez l'exemple de configuration :

```bash
cp .env.example .env
php artisan key:generate
```

Renseignez les valeurs sensibles dans `.env` sur le serveur puis exécutez `php artisan migrate --force` et `npm run build` pour compiler les assets.

## Licence

Le projet est distribué sous licence [MIT](LICENSE).
