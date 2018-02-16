<p align="center">Création d'un site Web proposant des stages et des formations dasn le cadre de ma formation à l'école multimédia</p>



## Contexte technique

Utilisation du framework Laravel avec MySQL
Utilisation de Bootstrap pour le visuel

## Données

Vous utiliserez une seule table « posts » pour les formations/stages dans laquelle
vous utiliserez une colonne post_type dont les valeurs pourront-être :
« formation » ou « stage » pour définir ces contenus.
Les formations/stages auront un titre, une description, une date de début et de
fin, un prix et un nombre maximal d’élèves par formation/stage.
Une formation et un stage auront au plus une catégorie.
On pourra associer une image au plus à un « post ».
Un utilisateur, « administrateur », pourra effectuer les actions de CRUD sur la
ressource « posts ». Cet utilisateur devra être authentifié pour accéder à
l’administration des contenus. Vous utiliserez donc la table « users » pour définir
ce dernier et mettre en en place le système d’authentification de Laravel.
Vous devez faire un diagramme des tables MySQL avant de commencer les
migrations.
Vous utiliserez également les seeders pour mettre des données d’exemple dans
les tables du projet.

La page d’accueil affichera les dernières formations/stages proposés par le site
Web. Seulement les deux prochains stages/formations seront affichés sur cette
page.
Deux menus seront placés sur les pages du site : un menu principal et un menu
secondaire. Ils sont identiques.
Un moteur de recherche sera également placé dans la colonne latérale.

## Menu principal

Les items sont respectivement : un lien vers la page d’accueil, un lien vers la
catégorie présentant tous les stages, un lien vers la page des formations et enfin
un lien vers la page de contact que nous détaillerons plus bas.
Le menu secondaire sera identique au menu principal et placé dans le footer.

## Formations/stage

La page de formation et de stage seront identiques à la page d’accueil, pour la
mise en page en HTML. Mais elles listerons respectivement l’ensemble de stages
et l’ensemble des formations pour leur catégorie donnée. Ces pages listent les
formations/stages avec respectivement le titre, une description et la date de
début uniquement.

## Moteur de recherche

La page de recherche affichera les résultats à gauche avec de la pagination si les
résultats sont plus de 5.

## Page de contact

Pour la page de contact vous utiliserez mailDev un composant NodeJs, pour
tester l’envoi d’email. Vous placerez les champs obligatoires: email et description
dans ce dernier.

## backoffice

Pour l’administration vous mettrez un lien vers la page de login/password que
vous n’afficherez pas sur le site. Il faudra tapez directement dans l’url du site
/login pour accéder à la page d’authentification de Laravel.
Une fois authentifié vous afficherez un lien dans le header du site pour vous
déconnecter ou retourner à l’administration.

## Facultatif

Vous ajouterez la possibilité de supprimer de manière multiple des
« stages/formations » et ajouterez un champ de recherche sur les
stages/formations.

Si vous avez le temps vous pouvez mettre en place la suppression avec un
système de corbeille pour suppression définitive, à vous de proposer un affichage
de cette page dans le backoffice.
Dans la corbeille vous mettez la possibilité de supprimer de manière définitive les
stages/formations
