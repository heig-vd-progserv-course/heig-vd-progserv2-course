# Bases de données MySQL/MariaDB et déploiement

L. Delafontaine, avec l'aide de
[GitHub Copilot](https://github.com/features/copilot).

Ce travail est sous licence [CC BY-SA 4.0][licence].

> [!TIP]
>
> Voici quelques informations relatives à ce contenu.
>
> **Ressources annexes**
>
> - Autres formats :
>   [Presentation (web)](https://heig-vd-progserv-course.github.io/heig-vd-progserv2-course/01-contenus-du-cours/04-bases-de-donnees-avec-mysql-mariadb-et-deploiement/presentation.html)
>   ·
>   [Presentation (PDF)](https://heig-vd-progserv-course.github.io/heig-vd-progserv2-course/01-contenus-du-cours/04-bases-de-donnees-avec-mysql-mariadb-et-deploiement/04-bases-de-donnees-avec-mysql-mariadb-et-deploiement-presentation.pdf).
> - Exemples de code : [Code source](./01-exemples-de-code/README.md).
> - Exercices : [Énoncés et solutions](./02-exercices/README.md).
>
> **Objectifs**
>
> - Rappeler les concepts de base des formulaires HTML, validation et sécurité.
> - Utiliser PDO pour interagir avec une base de données MySQL/MariaDB.
> - Utiliser les exceptions pour la gestion des erreurs en PHP.
> - Utiliser les fichiers de configuration pour stocker les paramètres de
>   connexion à la base de données.
> - Acquérir un hébergement web et y déployer une application web avec une base
>   de données MySQL/MariaDB.
>
> **Méthodes d'enseignement et d'apprentissage**
>
> Les méthodes d'enseignement et d'apprentissage utilisées pour animer le cours
> sont les suivantes :
>
> - Présentation.
> - Discussions collectives.
> - Travail en autonomie.
>
> **Méthodes d'évaluation**
>
> L'évaluation prend la forme d'exercices à réaliser en autonomie en classe ou à
> la maison.
>
> L'évaluation se fait en utilisant les critères suivants :
>
> - Capacité à s'approprier des exemples de code.
> - Capacité à appliquer les exemples de code à des situations similaires.
> - Capacité à répondre avec justesse.
> - Capacité à argumenter.
>
> Les retours se font de la manière suivante :
>
> - Corrigé des exercices.
>
> L'évaluation ne donne pas lieu à une note.

## Table des matières

- [Table des matières](#table-des-matières)
- [Objectifs](#objectifs)
- [Formulaires HTML et PDO, un rappel](#formulaires-html-et-pdo-un-rappel)
  - [Structure d'un formulaire HTML](#structure-dun-formulaire-html)
  - [Récupération des données côté serveur](#récupération-des-données-côté-serveur)
  - [Validation côté serveur](#validation-côté-serveur)
  - [Conservation des données en cas d'erreurs](#conservation-des-données-en-cas-derreurs)
  - [Connexion à une base de données SQLite avec PDO](#connexion-à-une-base-de-données-sqlite-avec-pdo)
  - [Nettoyage des données et persistance avec les requêtes préparées](#nettoyage-des-données-et-persistance-avec-les-requêtes-préparées)
  - [Affichage sécurisé des données](#affichage-sécurisé-des-données)
  - [Validation côté client](#validation-côté-client)
- [Bases de données MySQL/MariaDB](#bases-de-données-mysqlmariadb)
  - [MySQL/MariaDB](#mysqlmariadb)
  - [MariaDB avec Docker Compose et phpMyAdmin](#mariadb-avec-docker-compose-et-phpmyadmin)
  - [Gestion des erreurs avec les exceptions](#gestion-des-erreurs-avec-les-exceptions)
  - [Fichiers de configuration](#fichiers-de-configuration)
- [Déployer une application web avec une base de données MySQL/MariaDB](#déployer-une-application-web-avec-une-base-de-données-mysqlmariadb)
- [Conclusion](#conclusion)
- [Exemples de code](#exemples-de-code)
- [Exercices](#exercices)
- [À faire pour la semaine suivante](#à-faire-pour-la-semaine-suivante)

## Objectifs

Ce contenu a pour but de vous rappeler les concepts de base liés aux formulaires
HTML, à la validation côté serveur et côté client, à la persistance des données
avec PDO et à la gestion des erreurs avec les exceptions.

Nous aborderons les concepts de base des bases de données MySQL/MariaDB et nous
verrons comment déployer une application web avec une base de données
MySQL/MariaDB sur un hébergeur web.

La liste complète des objectifs est disponible dans la section _"Objectifs"_ du
bloc d'information en haut de ce contenu.

> [!TIP]
>
> Des difficultés à comprendre certains concepts de PHP présentés dans ce
> support de cours ? Consultez les supports de cours pour le cours Programmation
> serveur 1 (ProgServ1) pour vous aider :
> <https://github.com/heig-vd-progserv-course/heig-vd-progserv1-course>.
>
> N'hésitez pas à poser des questions si besoin !

## Formulaires HTML et PDO, un rappel

Les formulaires HTML sont un élément clé pour interagir avec les utilisateurs
sur le web. Ils permettent de collecter des données que les utilisateurs peuvent
soumettre à un serveur pour traitement.

### Structure d'un formulaire HTML

Un formulaire HTML est défini à l'aide de la balise `<form>`. Voici un exemple
simple :

```php
<form action="create.php" method="POST">
    <label for="first-name">Prénom</label>
    <input type="text" id="first-name" name="first-name">

    <label for="last-name">Nom</label>
    <input type="text" id="last-name" name="last-name">

    <label for="email">E-mail</label>
    <input type="email" id="email" name="email">

    <label for="age">Âge</label>
    <input type="number" id="age" name="age">

    <button type="submit">Créer</button>
</form>
```

> [!TIP]
>
> Pour voir l'exemple complet, se référer au fichier
> [`01-simple-form`](./01-exemples-de-code/01-simple-form/create.php).

Dans cet exemple :

- La balise `<form>` définit le début du formulaire. L'attribut `action`
  spécifie l'URL où les données du formulaire seront envoyées pour traitement
  (ici, `create.php`). L'attribut `method` indique la méthode HTTP utilisée pour
  envoyer les données (ici, `POST`).
- Les balises `<label>` sont utilisées pour définir des étiquettes pour les
  champs du formulaire. L'attribut `for` doit correspondre à l'attribut `id` du
  champ associé.
- Les balises `<input>` définissent les champs de saisie. L'attribut `type`
  spécifie le type de champ (texte, e-mail, nombre, etc.). L'attribut `name` est
  crucial car il détermine la clé sous laquelle la valeur saisie sera envoyée au
  serveur.
- Le bouton `<button type="submit">` permet à l'utilisateur de soumettre le
  formulaire.

> [!CAUTION]
>
> Il est recommandé d'utiliser la méthode `POST` pour les formulaires pour des
> raisons de sécurité et de confidentialité car les données sont envoyées dans
> le corps de la requête HTTP et non dans l'URL.
>
> La méthode `GET` peut être utilisée pour des formulaires de recherche ou
> lorsque les données ne sont pas sensibles, mais elle expose les données dans
> l'URL car les données sont ajoutées à l'URL sous forme de paramètres de
> requête (par exemple, `?query=ma recherche`).

### Récupération des données côté serveur

Une fois le formulaire soumis, les données peuvent être récupérées côté serveur
en PHP à l'aide des superglobales `$_POST` ou `$_GET`, selon la méthode
utilisée.

Voici comment récupérer les données envoyées par le formulaire précédent dans le
fichier `create.php` :

```php
// Gère la soumission du formulaire
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupération des données du formulaire
    $firstName = $_POST["first-name"];
    $lastName = $_POST["last-name"];
    $email = $_POST["email"];
    $age = $_POST["age"];

    // ...
```

> [!TIP]
>
> Pour voir l'exemple complet, se référer au fichier
> [`02-get-data-server-side`](./01-exemples-de-code/01-simple-form/create.php).

Grâce à la condition `if ($_SERVER["REQUEST_METHOD"] === "POST")`, on s'assure
que le code ne s'exécute que lorsque le formulaire est soumis via la méthode
`POST`.

Les données sont ensuite accessibles via la superglobale `$_POST` en utilisant
les noms des champs définis dans le formulaire HTML (par exemple,
`$_POST["first-name"]` pour récupérer la valeur du champ "Prénom").

### Validation côté serveur

Il est crucial de valider les données reçues côté serveur pour garantir leur
intégrité et sécurité. Voici un exemple simple de validation :

```php
$errors = [];

if (empty($firstName) || strlen($firstName) < 2) {
    $errors[] = "Le prénom doit contenir au moins 2 caractères.";
}

if (empty($lastName) || strlen($lastName) < 2) {
    $errors[] = "Le nom doit contenir au moins 2 caractères.";
}

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Un email valide est requis.";
}

if ($age < 0) {
    $errors[] = "L'âge doit être un nombre positif.";
}
```

> [!TIP]
>
> Pour voir l'exemple complet, se référer au fichier
> [`03-validate-data-server-side`](./01-exemples-de-code/03-validate-data-server-side/create.php).

Le tableau `$errors` est utilisé pour collecter les messages d'erreur. Chaque
condition vérifie une règle de validation spécifique, et si la règle n'est pas
respectée, un message d'erreur est ajouté au tableau.

Ce tableau peut ensuite être utilisé pour afficher les erreurs à l'utilisateur
ou pour empêcher la poursuite du traitement si des erreurs sont présentes :

```php
<?php if ($_SERVER["REQUEST_METHOD"] === "POST") { ?>
    <?php if (empty($errors)) { ?>
        <p style="color: green;">Le formulaire a été soumis avec succès !</p>
    <?php } else { ?>
        <p style="color: red;">Le formulaire contient des erreurs :</p>
        <ul>
            <?php foreach ($errors as $error) { ?>
                <li><?php echo $error; ?></li>
            <?php } ?>
        </ul>
    <?php } ?>
<?php } ?>
```

### Conservation des données en cas d'erreurs

Lorsqu'un formulaire est soumis, les valeurs saisies par l'utilisateur sont
perdues lors du rechargement de la page. Pour améliorer l'expérience utilisateur
en cas d'erreur de validation, il est utile de conserver les données saisies par
l'utilisateur pour éviter qu'il ait à tout re-saisir. Voici comment faire cela
en PHP :

```php
<input type="text" id="first-name" name="first-name" value="<?= $firstName ?? '' ?>">
```

> [!TIP]
>
> Pour voir l'exemple complet, se référer au fichier
> [`04-keep-data-on-errors`](./01-exemples-de-code/04-keep-data-on-errors/create.php).

Dans cet exemple, l'attribut `value` de l'élément `<input>` est défini pour
conserver la valeur saisie par l'utilisateur.

L'opérateur de coalescence nulle `??` est utilisé pour vérifier si `$firstName`
est défini. Si c'est le cas, sa valeur est utilisée ; sinon, une chaîne vide est
assignée, ce qui évite les messages d'erreur si la variable n'est pas définie.

### Connexion à une base de données SQLite avec PDO

Afin de stocker les données de manière persistante, il est courant d'utiliser
une base de données.

PHP met à disposition l'extension PDO (PHP Data Objects) qui fournit une
interface abstraite pour interagir avec différentes bases de données.

PDO permet d'écrire du code indépendant du type de base de données, ce qui
facilite la portabilité des applications.

PDO prend en charge plusieurs bases de données, dont MySQL, PostgreSQL, SQLite,
et bien d'autres.

SQLite est une base de données relationnelle légère qui stocke les données dans
un fichier unique sur le disque. Elle est idéale pour les applications de petite
à moyenne taille, les applications embarquées, ou les environnements de
développement.

Dans le cours ProgServ1, nous avons déjà vu comment utiliser SQLite avec PDO
pour sa simplicité.

Voici comment utiliser PDO pour se connecter à une base de données SQLite :

```php
const DATABASE_FILE = __DIR__ . '/mydatabase.db';

$pdo = new PDO("sqlite:" . DATABASE_FILE);

$sql = "CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    first_name TEXT NOT NULL,
    last_name TEXT NOT NULL,
    email TEXT NOT NULL UNIQUE,
    age INTEGER NOT NULL
);";

$stmt = $pdo->prepare($sql);

$stmt->execute();
```

> [!TIP]
>
> Pour voir l'exemple complet, se référer au fichier
> [`05-pdo-and-sqlite`](./01-exemples-de-code/05-pdo-and-sqlite/create.php).

Dans cet exemple, nous créons une connexion à une base de données SQLite stockée
dans le fichier `mydatabase.db`. Nous définissons ensuite une requête SQL pour
créer une table `users` si elle n'existe pas déjà, puis nous préparons et
exécutons cette requête.

### Nettoyage des données et persistance avec les requêtes préparées

Une fois les données validées, il est possible de les insérer dans une base de
données.

Mais avant d'insérer les données dans la base de données, il est important de
les nettoyer pour éviter les attaques de type injection SQL ou XSS.
L'utilisation de requêtes préparées avec PDO est une bonne pratique pour
sécuriser les interactions avec la base de données.

Voici un exemple d'insertion sécurisée dans une base de données avec PDO :

```php
// Définition de la requête SQL pour ajouter un utilisateur
$sql = "INSERT INTO users (
    first_name,
    last_name,
    email,
    age
) VALUES (
    :first_name,
    :last_name,
    :email,
    :age
)";

// Préparation de la requête SQL
$stmt = $pdo->prepare($sql);

// Lien avec les paramètres
$stmt->bindValue(':first_name', $firstName);
$stmt->bindValue(':last_name', $lastName);
$stmt->bindValue(':email', $email);
$stmt->bindValue(':age', $age);

// Exécution de la requête SQL pour ajouter un utilisateur
$stmt->execute();

// Redirection vers la page d'accueil avec tous les utilisateurs
header("Location: index.php");
exit();
```

> [!TIP]
>
> Pour voir l'exemple complet, se référer au fichiers
> [`05-pdo-and-sqlite`](./01-exemples-de-code/05-pdo-and-sqlite.php) et
> [`index-sqlite`](./01-exemples-de-code/index-sqlite/create.php).

Grâce aux requêtes préparées, les valeurs des variables sont liées aux
paramètres de la requête SQL. Les valeurs sont automatiquement échappées par
PDO, ce qui empêche les injections SQL.

En effet, une personne malveillante pourrait tenter d'injecter du code SQL dans
les champs du formulaire pour manipuler la base de données. Par exemple, si un
utilisateur saisit `'; DROP TABLE users; --` dans le champ "Prénom", et si les
données ne sont pas correctement échappées, cela pourrait entraîner la
suppression de la table `users`.

En échappant automatiquement les valeurs, PDO empêche ce type d'attaque, car le
code malveillant est traité comme une simple chaîne de caractères et non comme
une commande SQL.

Nous reviendrons plus spécifiquement sur ces notions de sécurité dans un futur
contenu.

### Affichage sécurisé des données

Lorsque vous affichez des données saisies par les utilisateurs, il est crucial
de les échapper pour prévenir les attaques XSS (Cross-Site Scripting). En PHP,
vous pouvez utiliser la fonction `htmlspecialchars()` pour échapper les
caractères spéciaux.

Voici comment afficher les données de manière sécurisée :

```php
<input type="text" id="first-name" name="first-name" value="<?= htmlspecialchars($firstName ?? ''); ?>">
```

> [!TIP]
>
> Pour voir l'exemple complet, se référer aux fichiers
> [`06-escape-special-characters`](./01-exemples-de-code/06-escape-special-characters.php)
> et [`index-sqlite`](./01-exemples-de-code/index-sqlite/create.php).

Ici, `htmlspecialchars()` convertit les caractères spéciaux en entités HTML,
empêchant ainsi l'exécution de code malveillant si l'utilisateur a saisi du HTML
ou du JavaScript.

Lors de l'affichage des données dans une liste ou un tableau, il est également
important d'échapper les données :

```php
<?php foreach ($users as $user) { ?>
    <tr>
        <td><?= htmlspecialchars($user['first_name']) ?></td>
        <td><?= htmlspecialchars($user['last_name']) ?></td>
        <td><?= htmlspecialchars($user['email']) ?></td>
        <td><?= htmlspecialchars($user['age']) ?></td>
    </tr>
<?php } ?>
```

### Validation côté client

Pour améliorer l'expérience utilisateur, il est également possible de valider
les données côté client à l'aide d'attributs HTML5 tels que `required`,
`minlength`, `type="email"`, etc. Cependant, cette validation côté client ne
remplace pas la validation côté serveur, qui est essentielle pour la sécurité.

> [!CAUTION]
>
> La validation côté client peut être contournée par des utilisateurs
> malveillants qui désactivent JavaScript ou modifient le code HTML. Par
> conséquent, il est impératif de **toujours** valider et nettoyer les données
> côté serveur avant de les utiliser.

En reprenant l'exemple de formulaire HTML, voici comment ajouter des attributs
de validation côté client :

```php
<form action="create.php" method="POST">
    <label for="first-name">Prénom</label>
    <input type="text" id="first-name" name="first-name" value="<?= htmlspecialchars($firstName ?? '') ?>" required minlength="2">

    <label for="last-name">Nom</label>
    <input type="text" id="last-name" name="last-name" value="<?= htmlspecialchars($lastName ?? '') ?>" required minlength="2">

    <label for="email">E-mail</label>
    <input type="email" id="email" name="email" value="<?= htmlspecialchars($email ?? '') ?>" required>

    <label for="age">Âge</label>
    <input type="number" id="age" name="age" value="<?= htmlspecialchars($age ?? '') ?>" required min="0">

    <button type="submit">Créer</button>
</form>
```

> [!TIP]
>
> Pour voir l'exemple complet, se référer aux fichiers
> [`07-validate-data-client-side`](./01-exemples-de-code/07-validate-data-client-side.php)
> et [`index-sqlite`](./01-exemples-de-code/index-sqlite/create.php).

Grâce aux attributs `required`, `minlength`, `type="email"`, et `min`, le
navigateur effectue une validation de base avant de permettre la soumission du
formulaire.

## Bases de données MySQL/MariaDB

Dans un environnement de production, SQLite peut ne pas être suffisant en raison
de ses limitations en termes de concurrence et de fonctionnalités avancées. Pour
des applications plus complexes, il est courant d'utiliser des systèmes de
gestion de bases de données (SGBD) plus robustes comme MySQL ou MariaDB.

### MySQL/MariaDB

MySQL et MariaDB sont des SGBD relationnels populaires qui offrent des
fonctionnalités avancées, une meilleure gestion de la concurrence, et une
évolutivité supérieure par rapport à SQLite.

MariaDB est un fork (= un clone) de MySQL, créé par les développeurs originaux
de MySQL après son acquisition par Oracle. MariaDB est entièrement compatible
avec MySQL, ce qui permet de migrer facilement entre les deux systèmes. C'est la
raison pour laquelle nous citons ces deux SGBD ensemble car vous pourriez tomber
sur l'un ou l'autre dans le monde professionnel.

Voici comment se connecter à une base de données MySQL/MariaDB avec PDO :

```php
const DB_HOST = 'mariadb';
const DB_PORT = 3306;
const DB_NAME = 'my_database';
const DB_USER = 'username';
const DB_PASSWORD = 'password';

$dsn = "mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME . ";charset=utf8mb4";

$pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
```

> [!TIP]
>
> Pour voir l'exemple complet, se référer aux fichiers
> [`08-mysql-with-constants`](./01-exemples-de-code/08-mysql-with-constants.php)
> et [`index-mysql`](./01-exemples-de-code/index-mysql/create.php).

Dans cet exemple, nous définissons les paramètres de connexion à la base de
données, y compris l'hôte, le port, le nom de la base de données, l'utilisateur
et le mot de passe. Nous construisons ensuite la chaîne de connexion (DSN) et
créons une instance de PDO pour établir la connexion.

La chaîne de connexion pour MySQL/MariaDB inclut le type de SGBD (`mysql`),
l'hôte, le port, le nom de la base de données, et le jeu de caractères
(`charset=utf8mb4`). Il est possible de passer d'autres options dans la chaîne
de connexion selon les besoins.

Comme pour SQLite, nous pouvons utiliser des requêtes préparées pour interagir
avec la base de données de manière sécurisée. Il est néanmoins nécessaire de
modifier légèrement la syntaxe SQL pour s'adapter aux spécificités de
MySQL/MariaDB :

```php
// Création de la base de données si elle n'existe pas
$sql = "CREATE DATABASE IF NOT EXISTS `$database` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;";
$stmt = $pdo->prepare($sql);
$stmt->execute();

// Sélection de la base de données
$sql = "USE `$database`;";
$stmt = $pdo->prepare($sql);
$stmt->execute();

// Création de la table `users` si elle n'existe pas
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    age INT NOT NULL
);";

$stmt = $pdo->prepare($sql);

$stmt->execute();
```

> [!TIP]
>
> Pour voir l'exemple complet, se référer aux fichiers
> [`08-mysql-with-constants`](./01-exemples-de-code/08-mysql-with-constants.php)
> et [`index-mysql`](./01-exemples-de-code/index-mysql/create.php).

En dehors de la syntaxe SQL, l'utilisation de PDO avec MySQL/MariaDB reste
similaire à celle avec SQLite, notamment en ce qui concerne les requêtes
préparées et la liaison des paramètres.

### MariaDB avec Docker Compose et phpMyAdmin

Le template mis à votre disposition pour le projet libre
(<https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course-php-template>)
met à disposition une base de données MariaDB prête à l'emploi à l'aide de
Docker Compose.

La base de données est décrite dans le fichier `compose.yaml` et est configurée
pour être accessible depuis votre application web PHP.

En plus de la base de données MariaDB, le template inclut également phpMyAdmin,
un outil web pratique pour gérer et interagir avec votre base de données MariaDB
via une interface graphique depuis votre navigateur web.

Pour démarrer la stack Docker Compose avec la base de données MariaDB et
phpMyAdmin, vous pouvez utiliser la commande suivante dans le terminal à la
racine du projet :

```bash
docker compose up
```

Ceci démarrera les conteneurs Docker pour votre application web, la base de
données MariaDB et phpMyAdmin.

Vous pouvez ensuite accéder à phpMyAdmin en ouvrant votre navigateur et en
naviguant vers l'URL suivante : <http://localhost:9090>.

Par défaut, les informations de connexion pour accéder à la base de données sont
les suivantes :

- Utilisateur : `username`
- Mot de passe : `password`
- Nom de la base de données : `my_database`

Il est possible de modifier le fichier `compose.yaml` pour changer ces
paramètres si nécessaire.

MariaDB et phpMyAdmin sont donc directement à votre disposition pour vos
applications web en développement.

Il vous suffira de configurer la connexion avec les paramètres nécessaires pour
accéder à votre serveur MySQL/MariaDB local (hôte, port, utilisateur, mot de
passe).

Pour arrêter la stack Docker Compose, vous pouvez utiliser `Ctrl+C` dans le
terminal où la commande `docker compose up` a été exécutée, ou utiliser la
commande suivante dans un autre terminal à la racine du projet :

```bash
docker compose down
```

### Gestion des erreurs avec les exceptions

Lorsque l'on interagit avec une base de données, il est possible que des erreurs
se produisent, par exemple en cas de problème de connexion, de requêtes SQL
invalides, ou de violation de contraintes (comme une clé unique).

De ce fait, lorsqu'une erreur survient, PDO peut générer une exception.

Une exception est un objet qui représente une erreur ou une condition
exceptionnelle dans le programme. En PHP, les exceptions sont des instances de
la classe `Exception` ou de ses sous-classes.

Une exception peut être "jetée" (throw) lorsqu'une erreur se produit, et elle
peut être "attrapée" (catch) dans un bloc `try-catch` pour gérer l'erreur de
manière appropriée.

Une analogie courante pour comprendre les exceptions est de les comparer à des
"signaux d'alarme" dans un programme. Lorsqu'une erreur se produit, l'exception
est jetée pour signaler qu'il y a un problème. Le programme peut alors
"attraper" cette exception et décider comment y répondre, par exemple en
affichant un message d'erreur à l'utilisateur ou en effectuant une action de
récupération.

Les signaux d'alarme peuvent émerger quelque part dans le code, et, si personne
ne les entend/attrape, le programme s'arrête brusquement. En revanche, si
quelqu'un est là pour les attraper, il peut gérer l'erreur de manière
appropriée, effectuer des actions correctives, informer l'utilisateur, ou
simplement relancer le signal pour qu'une autre partie du programme puisse le
gérer.

Pour gérer ces exceptions, le code doit être encapsulé dans un bloc `try-catch`.
Voici un exemple :

```php
try {
    // Code qui peut générer une exception
    throw new Exception("Une erreur s'est produite.");
} catch (Exception $e) {
    // Gestion de l'exception
    echo "Une exception a été capturée : " . $e->getMessage();
}
```

Dans cet exemple, le code à risque est placé dans le bloc `try`. Si une
exception est jetée, elle est capturée dans le bloc `catch`, où nous pouvons
gérer la situation, par exemple en affichant un message d'erreur.

Ici, de façon naïve, nous jetons une exception manuellement pour illustrer le
fonctionnement des blocs `try-catch`. En pratique, les exceptions sont souvent
jetées automatiquement par des fonctions ou des méthodes lorsqu'une erreur se
produit.

Si une exception n'est pas capturée, elle provoque l'arrêt du script et
l'affichage d'un message d'erreur dans le navigateur.

PDO est capable de lever des exceptions en cas d'erreurs de connexion ou de
requêtes SQL. Il est donc possible de gérer ces erreurs en utilisant des blocs
`try-catch`.

En utilisant la même base de données MySQL/MariaDB que précédemment, illustrons
un exemple de l'insertion de deux personnes dans la base de données avec gestion
avec la même adresse e-mail :

```php
try {
    // Connexion à la base de données
    $pdo = new PDO($dsn, DB_USER, DB_PASSWORD);

    // Définition de la requête SQL pour ajouter un utilisateur
    $sql = "INSERT INTO users (
        first_name,
        last_name,
        email,
        age
    ) VALUES (
        :first_name,
        :last_name,
        :email,
        :age
    )";

    // Préparation de la requête SQL
    $stmt = $pdo->prepare($sql);

    // Insertion du premier utilisateur
    $stmt->execute([
        ':first_name' => 'Alice',
        ':last_name' => 'Dupont',
        ':email' => 'alice.dupont@example.com',
        ':age' => 30
    ]);

    // Insertion du deuxième utilisateur (avec la même adresse e-mail)
    $stmt->execute([
        ':first_name' => 'Bob',
        ':last_name' => 'Martin',
        ':email' => 'alice.dupont@example.com',
        ':age' => 25
    ]);
} catch (PDOException $e) {
    // Gestion de l'exception
    echo "Une erreur s'est produite : " . $e->getMessage();
}
```

Lors de l'insertion du deuxième utilisateur, une exception `PDOException` sera
jetée en raison de la violation de la contrainte d'unicité sur le champ `email`.
L'exception sera capturée dans le bloc `catch`, et un message d'erreur approprié
sera affiché :

```text
Une erreur s'est produite : SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry 'alice.dupont@example.com' for key 'email'
```

Chaque erreur de PDO est associée à un code d'erreur SQLSTATE qui fournit des
informations supplémentaires sur la nature de l'erreur. Dans cet exemple, le
code `23000` indique une violation de contrainte d'intégrité, et le message
détaillé précise qu'il s'agit d'une entrée en double pour la clé `email`.

Une liste des codes d'erreur SQLSTATE est disponible ici :
<https://en.wikipedia.org/wiki/SQLSTATE>.

Il est donc possible de gérer les erreurs de manière élégante et de fournir des
messages d'erreur utiles aux utilisateurs ou aux développeurs, comme illustré
dans l'exemple ci-dessus :

```php
// Si pas d'erreurs, insertion dans la base de données
if (empty($errors)) {
    try {
        // Définition de la requête SQL pour ajouter un utilisateur
        $sql = "INSERT INTO users (
            first_name,
            last_name,
            email,
            age
        ) VALUES (
            :first_name,
            :last_name,
            :email,
            :age
        )";

        // Préparation de la requête SQL
        $stmt = $pdo->prepare($sql);

        // Lien avec les paramètres
        $stmt->bindValue(':first_name', $firstName);
        $stmt->bindValue(':last_name', $lastName);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':age', $age);

        // Exécution de la requête SQL pour ajouter un utilisateur
        $stmt->execute();

        // Redirection vers la page d'accueil avec tous les utilisateurs
        header("Location: index-mysql.php");
        exit();
    } catch (PDOException $e) {
        // Liste des codes d'erreurs : https://en.wikipedia.org/wiki/SQLSTATE
        if ($e->getCode() === "23000") {
            // Erreur de contrainte d'unicité (par exemple, email déjà utilisé)
            $errors[] = "L'adresse e-mail est déjà utilisée.";
        } else {
            $errors[] = "Erreur lors de l'interaction avec la base de données : " . $e->getMessage();
        }
    } catch (Exception $e) {
        $errors[] = "Erreur inattendue : " . $e->getMessage();
    }
}
```

> [!TIP]
>
> Pour voir l'exemple complet, se référer aux fichiers
> [`09-handle-exceptions`](./01-exemples-de-code/09-handle-exceptions.php) et
> [`index-mysql`](./01-exemples-de-code/index-mysql/create.php).

Notez l'utilisation de plusieurs blocs `catch` pour gérer différents types
d'exceptions. Le premier bloc capture les exceptions spécifiques à PDO, tandis
que le second bloc capture les exceptions générales.

### Fichiers de configuration

Dans les exemples précédents, les paramètres de connexion à la base de données
étaient définis directement dans le code. Cependant, dans une application
réelle, il est préférable de stocker ces paramètres dans un fichier de
configuration séparé.

Cela permet de modifier les paramètres sans toucher au code source, et de garder
les informations sensibles (comme les mots de passe) hors du code.

Voici un exemple simple de fichier de configuration `config/database.ini` :

```php
host = "mariadb"
port = 3306
database = "my_database"
username = "username"
password = "password"
```

Et voici comment lire ce fichier de configuration en PHP :

```php
const DATABASE_CONFIGURATION_FILE = __DIR__ . '/../config/database.ini';

// Documentation : https://www.php.net/manual/fr/function.parse-ini-file.php
$config = parse_ini_file(DATABASE_CONFIGURATION_FILE, true);

if (!$config) {
    throw new Exception("Erreur lors de la lecture du fichier de configuration : " . DATABASE_CONFIGURATION_FILE);
}

$host = $config['host'];
$port = $config['port'];
$database = $config['database'];
$username = $config['username'];
$password = $config['password'];

// Documentation :
//   - https://www.php.net/manual/fr/pdo.connections.php
//   - https://www.php.net/manual/fr/ref.pdo-mysql.connection.php
$pdo = new PDO("mysql:host=$host;port=$port;charset=utf8mb4", $username, $password);
```

> [!TIP]
>
> Pour voir l'exemple complet, se référer aux fichiers
> [`10-database-configuration-file`](./01-exemples-de-code/10-database-configuration-file.php)
> et [`index-mysql`](./01-exemples-de-code/index-mysql/create.php).

En utilisant un fichier de configuration, il est important de s'assurer que ce
fichier n'est pas accessible publiquement via le serveur web pour des raisons de
sécurité. Il est recommandé de placer le fichier de configuration en dehors du
répertoire des pages publiques accessibles par le serveur web (en dehors du
dossier `public` de notre projet).

Lors de l'utilisation de Git pour le contrôle de version, il est également
conseillé d'ajouter le fichier de configuration à `.gitignore` pour éviter de le
committer dans le dépôt, surtout s'il contient des informations sensibles, et
d'utiliser plutôt un fichier de configuration d'exemple (par exemple,
`database.ini.example`) dans le dépôt.

## Déployer une application web avec une base de données MySQL/MariaDB

Lorsque vous développez une application web, vous utilisez une base de données
locale pour tester et développer votre application.

Cependant, lorsque vous êtes prêt à déployer votre application sur un serveur de
production, vous devez configurer une base de données MySQL/MariaDB sur ce
serveur et adapter votre application pour qu'elle puisse se connecter à cette
base de données distante.

Comme déjà vu dans les cours
[Programmation serveur 1 (ProgServ1)](https://github.com/heig-vd-progserv-course/heig-vd-progserv1-course)
et
[Développer une application web simple (DévAppliS)](https://github.com/heig-vd-devapplis-course/heig-vd-devapplis-course),
nous allons utiliser le service d'hébergement web
[Infomaniak](https://www.infomaniak.com/) pour déployer notre application web
avec une base de données MySQL/MariaDB.

Pour acquérir un hébergement web avec Infomaniak avec une base de données
MariaDB, référez-vous au contenu
[Déployer un site ou une application web sur Internet](https://github.com/heig-vd-progserv-course/heig-vd-progserv1-course/tree/main/01-contenus-du-cours/06.02-deployer-un-site-ou-une-application-web-sur-internet).

Vous aurez besoin de ce contenu pour déployer votre
[projet libre](../../02-evaluations/02-projet-libre/README.md) sur Infomaniak.

> [!NOTE]
>
> **Prenez le temps de bien lire le contenu du cours pour comprendre les étapes
> nécessaires au déploiement d'une application web avec une base de données
> MySQL/MariaDB.** Vous n'aurez besoin que d'un seul déploiement par groupe pour
> le projet libre, mais il est important que chaque membre du groupe comprenne
> les étapes nécessaires pour déployer une application web avec une base de
> données MySQL/MariaDB de façon autonome.

Si vous le souhaitez, vous pouvez créer un sous-domaine (comme présenté dans le
contenu mentionné ci-dessus) par membre du groupe pour que tout le monde puisse
déployer son application web avec une base de données MySQL/MariaDB sur
Infomaniak. Cela permettra à chaque membre du groupe de pratiquer le déploiement
d'une application web avec une base de données MySQL/MariaDB de façon autonome,
et de mieux comprendre les étapes nécessaires pour le déploiement.

Les étapes résumées pour déployer une application web avec une base de données
MySQL/MariaDB sur Infomaniak sont les suivantes :

1. Acquérir un hébergement web avec Infomaniak en utilisant un nom de domaine ou
   un sous-domaine existant ou en acquérant un nouveau nom de domaine.
2. Créer une base de données MySQL/MariaDB sur Infomaniak et noter les
   informations de connexion (hôte, port, nom de la base de données,
   utilisateur, mot de passe).
3. Créer un site web PHP sur Infomaniak et configurer le répertoire racine pour
   votre application web.
4. Téléverser les fichiers de votre application web sur le serveur Infomaniak en
   utilisant un client FTP ou SFTP.
5. Adapter votre application web pour qu'elle se connecte à la base de données
   MySQL/MariaDB sur Infomaniak en utilisant les informations de connexion
   notées précédemment.
6. Tester votre application web sur Infomaniak pour vous assurer qu'elle
   fonctionne correctement avec la base de données MySQL/MariaDB.

## Conclusion

Dans ce cours, nous avons exploré les concepts avancés liés aux bases de données
et à l'utilisation de PDO en PHP. Nous avons vu comment interagir avec des bases
de données MySQL/MariaDB localement avec Docker Compose et phpMyAdmin ainsi que
dans un environnement de production sur Infomaniak, gérer les erreurs avec des
exceptions, et utiliser des fichiers de configuration pour stocker les
paramètres de connexion.

Un rappel des concepts de base des formulaires HTML, de la validation et de la
sécurité a également été fait pour s'assurer que les données saisies par les
utilisateurs sont correctement gérées avant d'être insérées dans la base de
données.

## Exemples de code

Nous vous invitons maintenant à consulter les exemples de code de la séance afin
de mieux comprendre les concepts abordés.

Vous trouverez les exemples de code ici :
[Exemples de code](./01-exemples-de-code/README.md).

## Exercices

Nous vous invitons maintenant à réaliser les exercices de la séance afin de
mettre en pratique les concepts abordés.

Vous trouverez les exercices et leur corrigé ici :
[Exercices](./02-exercices/README.md).

## À faire pour la semaine suivante

Chaque personne est libre de gérer son temps comme elle le souhaite. Cependant,
il est recommandé pour la séance suivante de :

- Relire les supports de cours si nécessaire.
- Finaliser l'appropriation des exemples de code qui n'ont pas été vus en
  classe.
- Finaliser les exercices qui n'ont pas été terminés en classe.

[licence]:
	https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/LICENSE.md
