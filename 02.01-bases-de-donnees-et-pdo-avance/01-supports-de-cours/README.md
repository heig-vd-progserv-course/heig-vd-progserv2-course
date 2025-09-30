# Bases de données et PDO (avancé) - Support de cours

L. Delafontaine, avec l'aide de
[GitHub Copilot](https://github.com/features/copilot).

Ce travail est sous licence [CC BY-SA 4.0][licence].

## Ressources annexes

- Objectifs, méthodes d'enseignement et d'apprentissage, et méthodes
  d'évaluation : [Lien vers le contenu](..)
- Autres formes du support de cours :
  [Presentation (web)](https://heig-vd-progserv-course.github.io/heig-vd-progserv2-course/02.01-bases-de-donnees-et-pdo-avance/01-supports-de-cours/index.html)
  ·
  [Presentation (PDF)](https://heig-vd-progserv-course.github.io/heig-vd-progserv2-course/02.01-bases-de-donnees-et-pdo-avance/01-supports-de-cours/02.01-bases-de-donnees-et-pdo-avance-presentation.pdf)
- Exemples de code : [Lien vers le contenu](../02-exemples-de-code/)
- Exercices : [Lien vers le contenu](../03-exercices/README.md)

## Table des matières

- [Ressources annexes](#ressources-annexes)
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
- [Bases de données et PDO (avancé)](#bases-de-données-et-pdo-avancé)
  - [MySQL/MariaDB](#mysqlmariadb)
  - [Accéder à MySQL/MariaDB avec MAMP et Visual Studio Code](#accéder-à-mysqlmariadb-avec-mamp-et-visual-studio-code)
  - [Gestion des erreurs avec les exceptions](#gestion-des-erreurs-avec-les-exceptions)
  - [Fichiers de configuration](#fichiers-de-configuration)
- [Conclusion](#conclusion)
- [Exemples de code](#exemples-de-code)
- [Exercices](#exercices)

## Objectifs

- Rappeler les concepts de base des formulaires HTML, validation et sécurité.
- Utiliser PDO pour interagir avec une base de données MySQL/MariaDB.
- Utiliser les exceptions pour la gestion des erreurs en PHP.
- Utiliser les fichiers de configuration pour stocker les paramètres de
  connexion à la base de données.

## Formulaires HTML et PDO, un rappel

> [!TIP]
>
> Des difficultés à comprendre certains concepts de PHP présentés dans ce
> support de cours ? Consultez les supports de cours pour l'unité d'enseignement
> Programmation serveur 1 (ProgServ1) pour vous aider :
> <https://github.com/heig-vd-progserv-course/heig-vd-progserv1-course/tree/main>.
>
> N'hésitez pas à poser des questions si besoin !

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
> [`01-simple-form.php`](./snippets/01-simple-form.php).

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
> le corps de la requête HTTP et ne sont pas visibles dans l'URL.
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
> [`02-get-data-server-side.php`](./snippets/02-get-data-server-side.php).

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
> [`03-validate-data-server-side.php`](./snippets/03-validate-data-server-side.php).

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
> [`04-keep-data-on-errors.php`](./snippets/04-keep-data-on-errors.php).

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

Dans l'unité d'enseignement ProgServ1, nous avons déjà vu comment utiliser
SQLite avec PDO pour sa simplicité.

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
> [`05-pdo-and-sqlite.php`](./snippets/05-pdo-and-sqlite.php).

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
$sql = "INSERT INTO users (first_name, last_name, email, age) VALUES (:first_name, :last_name, :email, :age)";

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
> [`05-pdo-and-sqlite.php`](./snippets/05-pdo-and-sqlite.php) et
> [`index-sqlite.php`](./snippets/index-sqlite.php).

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
> [`06-escape-special-characters.php`](./snippets/06-escape-special-characters.php)
> et [`index-sqlite.php`](./snippets/index-sqlite.php).

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
> [`07-validate-data-client-side.php`](./snippets/07-validate-data-client-side.php)
> et [`index-sqlite.php`](./snippets/index-sqlite.php).

Grâce aux attributs `required`, `minlength`, `type="email"`, et `min`, le
navigateur effectue une validation de base avant de permettre la soumission du
formulaire.

## Bases de données et PDO (avancé)

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
const DB_HOST = 'localhost';
const DB_PORT = 3306;
const DB_NAME = 'mydatabase';
const DB_USER = 'myuser';
const DB_PASSWORD = 'mypassword';

$dsn = "mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME . ";charset=utf8mb4";

$pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
```

> [!TIP]
>
> Pour voir l'exemple complet, se référer aux fichiers
> [`08-mysql-with-constants.php`](./snippets/08-mysql-with-constants.php) et
> [`index-mysql.php`](./snippets/index-mysql.php).

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
> [`08-mysql-with-constants.php`](./snippets/08-mysql-with-constants.php) et
> [`index-mysql.php`](./snippets/index-mysql.php).

En dehors de la syntaxe SQL, l'utilisation de PDO avec MySQL/MariaDB reste
similaire à celle avec SQLite, notamment en ce qui concerne les requêtes
préparées et la liaison des paramètres.

### Accéder à MySQL/MariaDB avec MAMP et Visual Studio Code

Lors de l'installation de MAMP sur votre machine, MySQL/MariaDB est déjà inclus
et prêt à l'emploi. Par défaut, l'utilisateur est `root` sans mot de passe. Il
serait recommandé de créer un nouvel utilisateur avec des privilèges limités
pour vos applications web. Mais comme il s'agit d'un environnement de
développement local, vous pouvez utiliser l'utilisateur `root` sans mot de passe
pour simplifier les choses.

MySQL est donc directement à votre disposition pour vos applications web en
développement.

Pour interagir avec MySQL/MariaDB, vous pouvez utiliser un client graphique
comme [MySQL Workbench](https://dev.mysql.com/downloads/workbench/) ou des
extensions pour Visual Studio Code comme
[Database client](https://marketplace.visualstudio.com/items?itemName=cweijan.vscode-database-client2).

Il vous suffira de configurer la connexion avec les paramètres nécessaires pour
accéder à votre serveur MySQL/MariaDB local (hôte, port, utilisateur, mot de
passe).

### Gestion des erreurs avec les exceptions

Lorsque l'on interagit avec une base de données, il est possible que des erreurs
se produisent, par exemple en cas de problème de connexion, de requête SQL
invalide, ou de violation de contraintes (comme une clé unique).

De ce fait, lorsqu'une erreur survient, PDO peut générer une exception.

Une exception est un objet qui représente une erreur ou une condition
exceptionnelle dans le programme. En PHP, les exceptions sont des instances de
la classe `Exception` ou de ses sous-classes.

Une exception peut être "jetée" (throw) lorsqu'une erreur se produit, et elle
peut être "attrapée" (catch) dans un bloc `try-catch` pour gérer l'erreur de
manière appropriée.

Une analogie courante pour comprendre les exceptions est de les comparer à des
"signaux d'alarme" dans un programme. Lorsqu'une erreur se produit, l'exception
est jetée pour signaler qu'il y a un problème. Le programme peut alors attraper
cette exception et décider comment y répondre, par exemple en affichant un
message d'erreur à l'utilisateur ou en effectuant une action de récupération.

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

    // Préparation de la requête SQL pour ajouter un utilisateur
    $sql = "INSERT INTO users (first_name, last_name, email, age) VALUES (:first_name, :last_name, :email, :age)";
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
        $sql = "INSERT INTO users (first_name, last_name, email, age) VALUES (:first_name, :last_name, :email, :age)";

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
> [`09-handle-exceptions.php`](./snippets/09-handle-exceptions.php) et
> [`index-mysql.php`](./snippets/index-mysql.php).

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
host = "127.0.0.1"
port = 3306
database = "myapp"
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
> [`10-database-configuration-file.php`](./snippets/10-database-configuration-file.php)
> et [`index-mysql.php`](./snippets/index-mysql.php).

En utilisant un fichier de configuration, il est important de s'assurer que ce
fichier n'est pas accessible publiquement via le serveur web pour des raisons de
sécurité. Il est recommandé de placer le fichier de configuration en dehors du
répertoire racine du serveur web, ou de configurer le serveur pour restreindre
l'accès à ce fichier.

Lors de l'utilisation de Git pour le contrôle de version, il est également
conseillé d'ajouter le fichier de configuration à `.gitignore` pour éviter de le
committer dans le dépôt, surtout s'il contient des informations sensibles, et
d'utiliser plutôt un fichier de configuration d'exemple (par exemple,
`database.ini.example`) dans le dépôt.

## Conclusion

Dans ce cours, nous avons exploré les concepts avancés liés aux bases de données
et à l'utilisation de PDO en PHP. Nous avons vu comment interagir avec des bases
de données MySQL/MariaDB, gérer les erreurs avec des exceptions, et utiliser des
fichiers de configuration pour stocker les paramètres de connexion.

Un rappel des concepts de base des formulaires HTML, de la validation et de la
sécurité a également été fait pour s'assurer que les données saisies par les
utilisateurs sont correctement gérées avant d'être insérées dans la base de
données.

## Exemples de code

Nous vous invitons maintenant à consulter les exemples de code du cours afin de
familiariser avec les concepts abordés.

Vous trouverez les exemples de code ici :
[Exemples de code](../02-exemples-de-code/).

## Exercices

Nous vous invitons ensuite à réaliser les exercices du cours afin de mettre en
pratique les concepts abordés.

Vous trouverez les exercices ici : [Exercices](../03-exercices/README.md).

[licence]:
	https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/LICENSE.md
