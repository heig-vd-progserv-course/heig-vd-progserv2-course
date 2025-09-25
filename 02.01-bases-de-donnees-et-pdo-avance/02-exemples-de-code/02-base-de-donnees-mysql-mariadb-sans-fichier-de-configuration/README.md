# Exemple : Base de données MySQL / MariaDB sans fichier de configuration

Cet exemple illustre la création d'une base de données avec :

- MySQL / MariaDB comme système de gestion de base de données (SGBD).
- PHP Data Objects (PDO) pour l'interaction avec la base de données.
- Une hiérarchie de classes pour gérer les opérations sur la base de données de
  manière orientée objet.
- Un autoloader pour charger automatiquement les classes PHP.
- Trois pages web pour interagir avec la base de données :
  - `index.php` : Affiche les enregistrements de la base de données.
  - `create.php` : Formulaire pour ajouter un nouvel enregistrement.
  - `delete.php` : Supprime un enregistrement existant.
