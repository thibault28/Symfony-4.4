# Symfony-4.4

Cloner le répository<br/>
Faire un composer install<br/>
Faire un yarn install<br/>
Faire un yarn encore dev<br/>
Creer la BDD<br/>
Dupliquer le fichier .env et le nommer .env.local et changer les informations de la base de données et les infos pour envoyer un email<br/>
Faire un php bin/console doctrine:schema:update --force<br/>
Faire un php bin/console doctrine:fixtures:load pour mettre des données dans la BDD<br/>
Lancer le server en faisant un symfony server:start<br/>

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

# Utilisateur

email : user@user.fr<br/>
password : user <br/><br/><br/>

email : admin@admin.fr<br/>
password : admin<br/>

# Info

Pour modifier l'administration, le faire dans config/admin<br/>
Pour modifier la langue par défaut, le faire dans config/packages/translation.yml et dans src\EventSubscriber\LocaleSubscriber.php<br/>
Pour rajouter une langue, le faire dans config/services.yaml<br/>
