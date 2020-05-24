# Symfony-4.4

Cloner le répository<br/>
Faire un composer install<br/>
Faire un yarn install<br/>
Faire un yarn encore dev<br/>
Creer la BDD
Dupliquer le fichier .env et le nommer .env.local et changer les informations de la base de données<br/>
Faire un php bin/console doctrine:schema:updat --force<br/>
Faire un php bin/console doctrine:fixtures:load pour mettre des données dans la BDD

# Bundle

Webpack encore : Bootstrap JQuery<br/>
Fixture : Ajout de contenu dans la BDD<br/>
Faker : Génération de fausses données<br/>
SwiftMailer : Envoie de mail<br/>
EasyAdmin : Administration<br/>
KnpPaginator : Pagination<br/>
Phpspreadsheet : Excel<br/>
Dompdf : PDF<br/>
VichUploaderBundle : Upload<br/>

# Pages

/ : Accueil<br/>
/register : Inscription<br/>
/login : Connexion<br/>
/logout : Déconnexion<br/>
/admin : Administration<br/>
/example : Tous les exemples avec pagination<br/>
/example/add : Ajout d'un exemple avec upload de fichier<br/>
/example/email : Envoie email<br/>
/example/translate : Traduction site<br/>
/example/pdf : Affiche un PDF<br/>
/example/excel : Télécharger une feuille excel<br/>

# Info

Pour rajouter une langue, le faire dans config/services.yaml<br/>
