# Bases de données et PDO (avancé) - Exercices

L. Delafontaine, avec l'aide de
[GitHub Copilot](https://github.com/features/copilot).

Ce travail est sous licence [CC BY-SA 4.0][licence].

## Ressources annexes

- Objectifs, méthodes d'enseignement et d'apprentissage, et méthodes
  d'évaluation : [Lien vers le contenu](..)
- Supports de cours : [Lien vers le contenu](../01-supports-de-cours/README.md)
  ·
  [Presentation (web)](https://heig-vd-progserv-course.github.io/heig-vd-progserv2-course/02.01-bases-de-donnees-et-pdo-avance/01-supports-de-cours/index.html)
  ·
  [Presentation (PDF)](https://heig-vd-progserv-course.github.io/heig-vd-progserv2-course/02.01-bases-de-donnees-et-pdo-avance/01-supports-de-cours/02.01-bases-de-donnees-et-pdo-avance-presentation.pdf)
- Exemples de code : [Lien vers le contenu](../02-exemples-de-code/)

## Exercices

### Exercice 1

#### Consignes

En repartant de l'exemple
[_"Base de données MySQL/MariaDB"_](../02-exemples-de-code/02-base-de-donnees-mysql-mariadb/)
disponible dans les exemples de code, développer une application web en PHP qui
permet de gérer une liste d'outils.

L'application doit permettre de :

- Ajouter un nouvel outil.
- Afficher la liste des outils.
- Supprimer un outil.

Chaque outil doit avoir les propriétés suivantes :

- ID (généré automatiquement)
- Nom (string - unique)
- Type (string, par exemple "bêche", "râteau", "tondeuse", etc.)
- Date d'achat (date)
  - Documentation pour un champ de type `date` côté navigateur (client)
    disponible ici :
    <https://developer.mozilla.org/fr/docs/Web/HTML/Element/input/date>.
  - Documentation pour un champ de type `DateTime` côté serveur (PHP) disponible
    ici : <https://www.php.net/manual/fr/class.datetime.php>.
  - Documentation pour un champ de type `DATE` côté base de données
    (MySQL/MariaDB) disponible ici :
    <https://dev.mysql.com/doc/refman/8.0/en/datetime.html>.
- Prix (float)

L'application doit utiliser une base de données MySQL ou MariaDB pour stocker
les outils et utiliser un fichier de configuration pour les paramètres de
connexion à la base de données.

L'interface utilisateur doit être simple et intuitive, avec des formulaires pour
ajouter des outils, et une table pour afficher la liste des outils et des
actions pour supprimer un outil.

Tous les champs doivent être validés côté client et côté serveur avant d'être
insérés dans la base de données et des messages d'erreur appropriés doivent être
affichés en cas de validation échouée.

L'insertion est sécurisée contre les injections SQL en utilisant des requêtes
préparées et l'affichage des données est sécurisé contre les attaques XSS.

L'application est structurée avec les principes de la programmation orientée
objet (POO) et utilise PDO pour les interactions avec la base de données.

#### Solution

Une solution possible est disponible dans le dossier
[`solution-exercice-01`](./solution-exercice-01/)

[licence]:
	https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/LICENSE.md
