Installation micro projet HelloCSE

1- Installation de Laravel 9 en control de commande Composer
    --> ```composer create-project --prefer-dist laravel/laravel:^9.0 Hello-CSE-project ```
    --> ```cd HelloCSE-project```

2- Configuration du .env ebn local avec MAMP (a titre d'exemple, .env mis dans github, mais à ne jamais faire en condition hors local !)
    --> Créatrion base 'hellocse'
    --> Création d'un utilisateur 'cse' pour l'interfacing avec un mp 'hellopw23072023'

Création branche '1-authentification'

1- Installation de Laravel Breeze
    --> ```composer require laravel/breeze --dev```
    --> ```php artisan breeze:install```
    --> ```php artisan migrate```
    --> ```npm install```
    --> ```npm run dev```

2- Création d'un utilisateur via un compte mail pour vérifier que toute cela est bon.

Création branche '2-backoffice'

1- Création dans le dossier 'resources/views' du dossier 'nos-stars' qui contient 4 templates blade :

2- Création du fichier de migration et controller via les lignes de commandes suivantes :
    --> ```php artisan make:migration create_stars_table```
    --> ````php artisan migrate```
    --> ````php artisan make:mode Star```
    --> ````php artisan make:controller StarController```

3- Mise en place des routes du BO dans le fichier '/routes/web.php'

