# Sécurité et nettoyage des saisies

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
>   [Presentation (web)](https://heig-vd-progserv-course.github.io/heig-vd-progserv2-course/01-contenus-du-cours/05-reutiliser-des-parties-dinterface/presentation.html)
>   ·
>   [Presentation (PDF)](https://heig-vd-progserv-course.github.io/heig-vd-progserv2-course/01-contenus-du-cours/05-reutiliser-des-parties-dinterface/05-reutiliser-des-parties-dinterface-presentation.pdf).
> - Exemples de code : [Code source](./01-exemples-de-code/README.md).
> - Exercices : [Énoncés et solutions](./02-exercices/README.md).
>
> **Objectifs**
>
> - Lister les différences entre la validation et le nettoyage des saisies
>   utilisateurs.
> - Lister les implications de sécurité des saisies utilisateurs.
> - Décrire les attaques par injection SQL et XSS.
> - Se prémunir contre les injections SQL et les attaques XSS.
> - Utiliser des requêtes préparées avec PDO.
> - Échapper les données avant de les afficher dans une page web.
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
- [Validation et nettoyage des saisies utilisateurs](#validation-et-nettoyage-des-saisies-utilisateurs)
- [Nettoyage des saisies utilisateurs](#nettoyage-des-saisies-utilisateurs)
- [Implications de sécurité](#implications-de-sécurité)
  - [Injections SQL](#injections-sql)
  - [Attaques XSS](#attaques-xss)
- [Se prémunir conte les injections SQL et les attaques XSS](#se-prémunir-conte-les-injections-sql-et-les-attaques-xss)
  - [Requêtes préparées avec PDO](#requêtes-préparées-avec-pdo)
  - [Échapper les données](#échapper-les-données)
- [Conclusion](#conclusion)
- [Exemples de code](#exemples-de-code)
- [Exercices](#exercices)
- [À faire pour la semaine suivante](#à-faire-pour-la-semaine-suivante)

## Objectifs

Nous avons mentionnés à de nombreuses reprises que les saisies utilisateurs sont
une source de vulnérabilités pour les applications web.

Nous n'avons, par contre, pas eu le temps de comprendre pourquoi il était
important de se préoccuper de la sécurité des saisies utilisateurs et comment se
prémunir contre les attaques les plus courantes.

Cette session vise à vous familiariser avec les concepts de sécurité et de
nettoyage des saisies utilisateurs. Nous allons aborder les injections SQL et
les attaques XSS (Cross-Site Scripting), ainsi que les bonnes pratiques pour
éviter ces types d'attaques.

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

## Validation et nettoyage des saisies utilisateurs

La validation et le nettoyage des saisies utilisateurs sont des étapes
essentielles dans le développement d'applications web sécurisées. Ces étapes
permettent de s'assurer que les données saisies par les utilisateurs sont
valides, sûres et ne contiennent pas de code malveillant. Cela est
particulièrement important lorsque les données saisies par les utilisateurs sont
utilisées dans des requêtes SQL ou affichées dans des pages web.

La validation consiste à vérifier que les données saisies par les utilisateurs
sont conformes à un ensemble de règles prédéfinies. Par exemple, si un champ
doit contenir une adresse e-mail, la validation vérifiera que la valeur saisie
est bien une adresse e-mail valide. Si la valeur saisie ne respecte pas les
règles de validation, elle sera rejetée et l'utilisateur sera invité à corriger
sa saisie.

Le nettoyage consiste à supprimer ou échapper (= modifier) les caractères
spéciaux ou malveillants dans les données saisies par les utilisateurs. Cela
permet de s'assurer que les données saisies ne contiennent pas de code
malveillant qui pourrait être injecté dans une requête SQL ou exécuté dans une
page web.

## Nettoyage des saisies utilisateurs

Le nettoyage des saisies utilisateurs consiste à supprimer ou échapper les
caractères spéciaux ou malveillants dans les données saisies par les
utilisateurs.

Le terme _"échapper"_ fait référence à la pratique de remplacer les caractères
spéciaux par des séquences d'échappement qui sont interprétées comme des
caractères littéraux plutôt que comme des caractères spéciaux. Par exemple, le
caractère `<` est un caractère spécial en HTML qui est utilisé pour ouvrir une
balise.

Si vous souhaitez afficher le caractère `<` dans une page web, vous devez
l'échapper en utilisant la séquence d'échappement `&lt;`. Cela garantit que le
caractère `<` est affiché comme un caractère littéral plutôt que comme le début
d'une balise HTML.

En PHP, la fonction
[`htmlspecialchars`](https://www.php.net/manual/fr/function.htmlspecialchars.php)
est utilisée pour échapper les caractères spéciaux dans une chaîne de
caractères.

Voici quelques exemples de caractères spéciaux et leurs séquences d'échappement
en HTML :

| Caractère | Séquence d'échappement |
| :-------- | :--------------------- |
| `<`       | `&lt;`                 |
| `>`       | `&gt;`                 |
| `&`       | `&amp;`                |
| `"`       | `&quot;`               |
| `'`       | `&apos;`               |

Une liste plus complète des caractères spéciaux et de leurs séquences
d'échappement est disponible sur Wikipedia :
[Liste des entités de caractère de XML et HTML](https://fr.wikipedia.org/wiki/Liste_des_entit%C3%A9s_de_caract%C3%A8re_de_XML_et_HTML).

Voici un exemple de code PHP qui utilise la fonction `htmlspecialchars` pour
échapper les caractères spéciaux dans une chaîne de caractères :

```php
// On définit une chaîne de caractères HTML avec des caractères spéciaux
$string = "<a href='index.php'>Accueil</a>";

// Affiche un lien cliquable - à éviter à tout prix
echo $string;

// On échappe les caractères spéciaux
// La chaîne échappée sera : &lt;a href='index.php'&gt;Accueil&lt;/a&gt;
$escapedString = htmlspecialchars($string);

// On affiche la chaîne échappée, qui sera littéralement
// <a href='index.php'>Accueil</a>
// et non un lien cliquable
echo $escapedString;
```

Dans cet exemple, la chaîne de caractères `$string` contient du code HTML qui
génère un lien. Sans nettoyage, ce code serait interprété par le navigateur et
afficherait un lien cliquable.

Cependant, en utilisant la fonction `htmlspecialchars`, nous échappons les
caractères spéciaux et affichons la chaîne de caractères échappée.

Cela garantit que le code HTML (ou JavaScript) est affiché comme une chaîne de
caractères littérale plutôt que comme du code qui serait interprété par le
navigateur.

## Implications de sécurité

Il existe plusieurs types d'attaques qui peuvent être réalisées si les saisies
utilisateurs ne sont pas correctement nettoyées. Les deux types d'attaques les
plus courants sont :

- Les injections SQL.
- Les attaques XSS.

### Injections SQL

Les injections SQL sont une technique d'attaque qui permet à une personne qui
attaquerait votre application d'injecter du code SQL malveillant dans une
requête SQL. Cela peut entraîner des fuites de données, des modifications non
autorisées de données ou même la suppression de données.

Les injections SQL se produisent généralement lorsque les entrées utilisateur ne
sont pas correctement filtrées ou échappées avant d'être utilisées dans une
requête SQL. Par exemple, si une application web permet à un utilisateur de
fournir un nom d'utilisateur et un mot de passe, et que ces valeurs sont
directement insérées dans une requête SQL sans être échappées, une personne
attaquante pourrait entrer une chaîne de caractères malveillante qui modifie la
requête SQL pour exécuter des actions non autorisées.

Voici un exemple de code PHP vulnérable aux injections SQL :

> [!CAUTION]
>
> **Attention** : ce code est vulnérable aux injections SQL et ne respecte pas
> les bonnes pratiques pour enregistrer les mots de passe dans la base de
> données.
>
> Ni la validation ni le nettoyage des saisies utilisateurs ne sont effectués.
>
> **Ce code ne doit pas être utilisé dans une application réelle**. Il est
> uniquement fourni à titre d'exemple.

```php
<?php
// Constante pour le fichier de base de données SQLite
const DATABASE_FILE = __DIR__ . "/users.db";

// Connexion à la base de données
$pdo = new PDO("sqlite:" . DATABASE_FILE);

// Création d'une table `users`
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    email TEXT NOT NULL UNIQUE,
    password TEXT NOT NULL
)";

// On exécute la requête SQL pour créer la table
$pdo->exec($sql);

// Gère la soumission du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // On récupère les données du formulaire
    $email = $_POST["email"];
    $password = $_POST["password"];

    // On prépare la requête SQL pour ajouter un utilisateur
    $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";

    // On exécute la requête SQL pour ajouter l'utilisateur
    $pdo->exec($sql);
}
?>

<!-- Gère l'affichage du formulaire -->
<!DOCTYPE html>
<html>

<head>
    <title>Création d'un compte</title>
</head>

<body>
    <h1>Création d'un compte</h1>

    <a href="view-accounts.php"><button>Voir les comptes</button></a>

    <form action="create-account.php" method="POST">
        <label for="email">E-mail :</label><br>
        <input
            type="text"
            id="email"
            name="email" />

        <br>

        <label for="password">Mot de passe :</label><br>
        <input
            type="password"
            id="password"
            name="password" />

        <br>

        <button type="submit">Envoyer</button>
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] === "POST") { ?>
        <p>Le formulaire a été soumis avec succès.</p>
    <?php } ?>
</body>

</html>
```

Dans cet exemple, les valeurs de `$email` et `$password` sont directement
insérées dans la requête SQL sans être échappées. Cela signifie qu'une personne
attaquante pourrait entrer une chaîne de caractères malveillante dans le champ
`email` ou `password` qui modifierait la requête SQL pour exécuter des actions
non autorisées.

Par exemple, une personne attaquante pourrait entrer les valeurs suivantes dans
le formulaire :

- Pour le champ `email` : `me@example.com`.
- Pour le champ `password` : `'); DROP TABLE users; --`.

Cela modifierait la requête SQL pour qu'elle ressemble à ceci :

```sql
INSERT INTO users (email, password) VALUES ('me@example.com', ''); DROP TABLE users; --'
```

Dans cet exemple, la requête SQL serait modifiée pour exécuter deux instructions
SQL :

1. `INSERT INTO users (email, password) VALUES ('email@example.com', '');` :
   cela insérera un nouvel utilisateur avec l'adresse e-mail.
2. `DROP TABLE users;` : cela supprimera la table `users` de la base de données.

Les points-virgules (`;`) séparent les requêtes SQL entre elles. Les traits
d'union ( `--`) sont un commentaire SQL. Ce qui indique que tout ce qui suit ne
sera donc pas exécuté.

Au travers de cette injection SQL, la personne attaquante a réussi à exécuter
deux instructions SQL au travers d'un champ de saisie, supprimant ainsi la table
`users` de la base de données.

D'autres attaques par injection SQL pourraient également être réalisées, comme
la modification des données d'un utilisateur ou l'extraction de données
sensibles de la base de données.

Il est donc important de toujours valider et nettoyer les saisies utilisateurs
avant de les utiliser dans une requête SQL. Cela garantit que seules les données
valides et sûres sont utilisées dans l'application.

### Attaques XSS

Les attaques XSS (Cross-Site Scripting) sont une technique d'attaque qui permet
à une personne attaquante d'injecter du code JavaScript malveillant dans une
page web. Cela peut entraîner des fuites de données, des modifications non
autorisées de données ou même la redirection de l'utilisateur vers un site
malveillant.

Tout comme les injections SQL, les attaques XSS se produisent généralement
lorsque les entrées utilisateur ne sont pas correctement filtrées ou échappées
avant d'être affichées dans une page web. Par exemple, si une application web
permet à un utilisateur de fournir un commentaire, et que ce commentaire est
directement affiché dans une page web sans être échappé, une personne attaquante
pourrait entrer une chaîne de caractères malveillante qui injecte du code
JavaScript dans la page web.

Comme vous n'avez pas encore étudié JavaScript, nous ne nous attarderons pas
trop en détail sur ce type d'attaques. Cependant, il est important de garder à
l'esprit que les attaques XSS sont une menace sérieuse pour la sécurité des
applications web et que les principes de sécurité que vous apprendrez dans ce
mini-projet s'appliquent également à la prévention des attaques XSS.

En se basant sur l'exemple précédent, voici un exemple de code PHP vulnérable
aux attaques XSS :

> [!CAUTION]
>
> **Attention** : ce code est vulnérable aux attaques XSS et ne respecte pas les
> bonnes pratiques pour afficher les données dans une page web.
>
> **Ce code ne doit pas être utilisé dans une application réelle**. Il est
> uniquement fourni à titre d'exemple.

```php
<?php
// Constante pour le fichier de base de données SQLite
const DATABASE_FILE = __DIR__ . "/users.db";

// Connexion à la base de données
$pdo = new PDO("sqlite:" . DATABASE_FILE);

// On prépare la requête SQL pour récupérer tous les utilisateurs
$sql = "SELECT * FROM users";

// On exécute la requête SQL pour récupérer les utilisateurs
$users = $pdo->query($sql);

// On transforme le résultat en tableau
$users = $users->fetchAll();
?>

<!-- Gère l'affichage du formulaire -->
<!DOCTYPE html>
<html>

<head>
    <title>Comptes utilisateurs</title>
</head>

<body>
    <h1>Comptes utilisateurs</h1>

    <a href="create-account.php"><button>Créer un compte</button></a>

    <ul>
        <?php foreach ($users as $user) { ?>
            <li><?= htmlspecialchars($user["email"]) ?></li>
        <?php } ?>
    </ul>
</body>

</html>
```

Dans cet exemple, la valeur de `$user["email"]` est directement affichée dans la
page web sans être échappée. Cela signifie qu'une personne attaquante pourrait
entrer une chaîne de caractères malveillante dans le champ `email` qui
injecterait du code JavaScript dans la page web.

Par exemple, une personne attaquante pourrait entrer la valeur suivante dans le
champ `email` :

```html
<script>
	alert("Vous avez été piraté !");
</script>
```

Cela injecterait le code JavaScript dans la page web et afficherait une boîte de
dialogue avec le message _"Vous avez été piraté !"_.

Dans cet exemple, la personne attaquante a réussi à injecter du code JavaScript
dans la page web en utilisant le champ `email`.

Bien que cet exemple paraisse relativement inoffensif, il illustre comment une
personne attaquante pourrait injecter du code JavaScript dans une page web sans
que l'utilisateur ne s'en rende compte. Cela pourrait être utilisé pour voler
des cookies de session, rediriger l'utilisateur vers un site malveillant ou
exécuter d'autres actions malveillantes.

Il est donc important de toujours valider et nettoyer les saisies utilisateurs
avant de les afficher dans une page web. Cela garantit que seules les données
valides et sûres sont affichées dans l'application.

## Se prémunir conte les injections SQL et les attaques XSS

Pour se protéger contre les injections SQL et les attaques XSS, il est important
de suivre certaines bonnes pratiques lors de la manipulation des données saisies
par les utilisateurs. Voici quelques-unes des meilleures pratiques à suivre :

- Ne jamais faire confiance aux saisies utilisateurs. Les saisies utilisateurs
  peuvent être manipulées par des personnes attaquantes pour injecter du code
  malveillant dans l'application.
- Toujours valider et filtrer les entrées utilisateur avant de les utiliser dans
  une requête SQL ou de les afficher dans une page web. Cela garantit que seules
  les données valides et sûres sont utilisées dans l'application.
- Toujours nettoyer les donnés utilisateur lors de l'interaction avec une base
  de données. Cela garantit que les entrées utilisateur sont correctement
  échappées et que le code SQL malveillant ne peut pas être injecté dans la
  requête.
- Toujours échapper les données avant de les afficher dans une page web. Cela
  garantit que le code JavaScript malveillant ne peut pas être injecté dans la
  page web.

### Requêtes préparées avec PDO

Les requêtes préparées sont une fonctionnalité de PDO qui permet de préparer une
requête SQL avant de l'exécuter. Cela permet de séparer le code SQL des données
et d'éviter les injections SQL.

Les requêtes préparées utilisent des paramètres pour représenter les valeurs qui
seront insérées dans la requête SQL. Ces paramètres sont ensuite liés aux
valeurs réelles avant d'exécuter la requête.

Si l'on reprend l'exemple précédent, voici comment utiliser des requêtes
préparées pour éviter les injections SQL :

```php
    // On prépare la requête SQL pour ajouter un utilisateur
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";

    // On prépare la requête SQL
    $stmt = $pdo->prepare($sql);

    // On lie les paramètres aux valeurs réelles
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':password', $password);

    // On exécute la requête
    $stmt->execute();
```

Les différences sont les suivantes :

```diff
     // On prépare la requête SQL pour ajouter un utilisateur
-    $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
+    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
+
+    // On prépare la requête
+    $stmt = $pdo->prepare($sql);
+
+    // On lie les paramètres
+    $stmt->bindValue(':email', $email);
+    $stmt->bindValue(':password', $password);

     // On exécute la requête SQL pour ajouter l'utilisateur
-    $pdo->exec($sql);
+    $stmt->execute();
```

Dans cet exemple, les valeurs de `$email` et `$password` sont liées aux
paramètres `:email` et `:password` dans la requête SQL. Cela garantit que les
valeurs sont correctement échappées et que le code SQL malveillant ne peut pas
être injecté dans la requête.

Grâce à cette simple approche, les valeurs de `$email` et `$password` sont
traitées comme des données et non comme du code SQL. Cela empêche les injections
SQL et garantit que seules les données valides et sûres sont utilisées dans
l'application.

Pour éviter les injections SQL, il est donc important de toujours utiliser des
requêtes préparées lors de l'interaction avec une base de données. Cela garantit
que les entrées utilisateur sont correctement échappées et que le code SQL
malveillant ne peut pas être injecté dans la requête.

Si vous testez maintenant le code PHP ci-dessus, vous verrez que la table
`users` est créée et que les utilisateurs sont ajoutés à la base de données.

Si vous essayez d'entrer une chaîne de caractères malveillante dans le champ
`email` ou `password`, les valeurs seront correctement échappées, les données
seront insérées dans la base de données et le code SQL malveillant ne sera pas
exécuté. Cela garantit que le code SQL malveillant ne peut pas être injecté dans
la requête SQL et que la sécurité de l'application est préservée.

Nous recommandons d'utiliser les requêtes préparées même pour les instructions
qui ne contiennent pas de données saisies par les utilisateurs afin de garantir
qu'aucune injection SQL ne puisse se produire dans l'application.

Prenons l'exemple de la création d'une table `users` dans une base de données
SQLite :

```php
// On définit la requête SQL pour créer une table
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    email TEXT NOT NULL UNIQUE,
    password TEXT NOT NULL
)";

// On prépare la requête SQL pour créer la table
$stmt = $pdo->prepare($sql);

// On exécute la requête SQL pour créer la table
$stmt->execute();
```

Dans cet exemple, la requête SQL pour créer la table `users` ne contient pas de
données saisies par les utilisateurs. Il n'est donc pas nécessaire d'utiliser
des requêtes préparées mais cela reste une bonne pratique de le faire pour
toutes les requêtes SQL, même celles qui ne contiennent pas de données saisies
par les utilisateurs.

### Échapper les données

Pour éviter les attaques XSS, il est important d'échapper les données avant de
les afficher dans une page web. Cela garantit que le code JavaScript malveillant
ne peut pas être injecté dans la page web.

Si l'on reprend l'exemple précédent, voici comment échapper les données avant de
les afficher dans une page web :

```php
    <ul>
        <?php foreach ($users as $user) { ?>
            <li><?= htmlspecialchars($user["email"]) ?></li>
        <?php } ?>
    </ul>
```

Les différences sont les suivantes :

```diff
     <ul>
         <?php foreach ($users as $user) { ?>
-            <li><?= $user["email"] ?></li>
+            <li><?= htmlspecialchars($user["email"]) ?></li>
         <?php } ?>
     </ul>
```

Dans cet exemple, la fonction `htmlspecialchars` est utilisée pour échapper les
caractères spéciaux dans la valeur de `$user["email"]`. Cela garantit que le
code JavaScript malveillant ne peut pas être injecté dans la page web et que la
sécurité de l'application est préservée.

Il est donc important de toujours valider et nettoyer les saisies utilisateurs
avant de les utiliser dans une requête SQL. Cela garantit que seules les données
valides et sûres sont utilisées dans l'application.

## Conclusion

Dans ce contenu, nous avons vu l'importance de la validation et du nettoyage des
saisies utilisateurs pour garantir la sécurité des applications web.

Nous avons abordé les injections SQL et les attaques XSS, pourquoi il ne faut
pas faire confiance aux saisies utilisateurs ainsi que les bonnes pratiques pour
éviter ces types d'attaques.

Nous avons vu comment utiliser des requêtes préparées avec PDO pour éviter les
injections SQL et comment échapper les données avant de les afficher dans une
page web pour éviter les attaques XSS.

> [!CAUTION]
>
> Les conséquences d'une injection SQL ou d'une attaque XSS peuvent être graves
> et peuvent entraîner la perte de données, la compromission de la sécurité de
> l'application ou la fuite de données sensibles.
>
> Vous pourriez être tenu.e responsable des conséquences des dégâts causés par
> une injection SQL ou une attaque XSS sur une application réelle.
>
> Il est donc important de vous former à la sécurité avec des applications de
> test et de ne pas tester des applications réelles sans l'autorisation
> explicite de l'entreprise ou de la personne responsable de l'application.
>
> Si une faille de sécurité est trouvée, il est important de la signaler à
> l'entreprise ou à la personne responsable de l'application afin qu'elle puisse
> être corrigée. Cela permet de garantir la sécurité de l'application et de
> protéger les données des utilisateurs.

En suivant ces bonnes pratiques, vous pouvez améliorer la sécurité de votre
application, vous prémunir contre les attaques par injection SQL/attaques XSS et
ainsi garantir la sécurité de vos utilisateurs.

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
