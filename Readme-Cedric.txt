----------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------
Installation micro projet HelloCSE
----------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------

Sur votre environnement de travail, clic droit et faire
    --> "Git bash here"
puis faire un
    --> "git clone https://github.com/CedricPages-CNinAlps/HelloCSE-project.git"

Ensuite, lancer MAMP/WAMP/XAMPP dans phpMyAdmin :
    --> Créer une base de données : ex "hellocse"
    --> Créer un utilisateur : ex "cse"
    --> Créer un mp : ex "hellopw23072023"

Une fois cela fait, compléter le .env avec les informations précédentes dans la partie :
    --> DB_DATABASE=hellocse
    --> DB_USERNAME=cse
    --> DB_PASSWORD=hellopw23072023

Un fois tous cela réaliser retourner sur le git bash et lancer :
    --> "npm install"
    --> "npm run serve && php artisan serve"

Le projet se lancera en http://localhost ou http://127.0.0.1:8000/

Pour information, le projet comporte 9 branches :
    --> Branche principale : "master";
    --> Branches de développement step by step :
            --> '1-authentification' : Branche de mise en place de l'authentification Breeze
            --> '2-backoffice' : Construction de la structure du BO
            --> '3-frontoffice' : Construction de la structure du FO
            --> '3.1-vuejs-3' : Installation et configuration de Vue Js 3
            --> '3.2-tailwind' : Installation et configuration de Tailwind Css
            --> '3.3-axios' : Installation et configuration d'Axios
            --> '4-images' : Mise en place de l'importation des images dans le BO
            --> '5-design' : Création du design pour le FO

Toutes les branches peuvent être importer en local via la commande git suivante :
    --> git checkout -t origin/<remote-branch-name>
    "remote-branch-name" correspondant a l'un des noms de branche ci-dessus.


----------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------
Synthèse sur la méthodologie de travail.
----------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------

1- Installation de Laravel 9 en control de commande Composer
    --> ```composer create-project --prefer-dist laravel/laravel:^9.0 Hello-CSE-project ```
    --> ```cd HelloCSE-project```

2- Configuration du .env ebn local avec MAMP (a titre d'exemple, .env mis dans github, mais à ne jamais faire en condition hors local !)
    --> Créatrion base 'hellocse'
    --> Création d'un utilisateur 'cse' pour l'interfacing avec un mp 'hellopw23072023'

----------------------------------------------------------------------------------------------------------------

Création branche '1-authentification'

1- Installation de Laravel Breeze
    --> ```composer require laravel/breeze --dev```
    --> ```php artisan breeze:install```
    --> ```php artisan migrate```
    --> ```npm install```
    --> ```npm run dev```

2- Création d'un utilisateur via un compte mail pour vérifier que toute cela est bon.

Pull request 1-2 sur 'Master'

----------------------------------------------------------------------------------------------------------------

Création branche '2-backoffice'

1- Création dans le dossier 'resources/views' du dossier 'nos-stars' qui contient 4 templates blade :

2- Création du fichier de migration et controller via les lignes de commandes suivantes :
    --> ```php artisan make:migration create_stars_table```
    --> ```php artisan migrate```
    --> ```php artisan make:mode Star```
    --> ```php artisan make:controller StarController```

3- Mise en place des routes du BO dans le fichier '/routes/web.php'

Pull request 3 sur 'Master'

----------------------------------------------------------------------------------------------------------------

Création branche '3-frontoffice'

------------------------------------------------------
Préparation d'installation de VueJs 3, création de la branche '3.1-vuejs-3'

1- Installation VueJs 3
    --> ```npm install vue@next```
    --> ```npm install @vitejs/plugin-vue```

2- Configuration des fichiers 'vite.config.js' et 'app.js', création d'un composant principal 'App.vue'
    --> ```npm run dev```

------------------------------------------------------
Préparation d'installation de Tailwindcss, création de la branche '3.2-tailwind'

1- Installation Tailwindcss
    --> ```npm install -D tailwindcss postcss autoprefixer```
    --> ```npx tailwindcss init -p```

2- Configuration du fichier 'tailwind.config.js' en modifiant 'src' par 'resources'
    --> ```npm run dev```

------------------------------------------------------
Mise en place du développement du front

Création d'un composant Profile.vue pour afficher la donnée.

------------------------------------------------------
Préparation d'installation de Tailwindcss, création de la branche '3.3-axios'

Pull request 4 sur 'Master'

----------------------------------------------------------------------------------------------------------------

Création branche '4-images'

Mise en place de l'importation des images avec supression des anciennes versions.

Pull Request 5 sur 'Master'

----------------------------------------------------------------------------------------------------------------

Création branche '5-design'
