# Sessions, authentification, et autorisation - Support de cours

L. Delafontaine, avec l'aide de
[GitHub Copilot](https://github.com/features/copilot).

Ce travail est sous licence [CC BY-SA 4.0][licence].

## Ressources annexes

- Objectifs, méthodes d'enseignement et d'apprentissage, et méthodes
  d'évaluation : [Lien vers le contenu](..)
- Autres formes du support de cours :
  [Presentation (web)](https://heig-vd-progserv-course.github.io/heig-vd-progserv2-course/03.01-deploiement/01-supports-de-cours/index.html)
  ·
  [Presentation (PDF)](https://heig-vd-progserv-course.github.io/heig-vd-progserv2-course/03.01-deploiement/01-supports-de-cours/03.01-deploiement-presentation.pdf)
- Exemples de code : [Lien vers le contenu](../02-exemples-de-code/)
- Exercices : [Lien vers le contenu](../03-exercices/README.md)

## Table des matières

- [Ressources annexes](#ressources-annexes)
- [Table des matières](#table-des-matières)
- [Objectifs](#objectifs)
- [Les sessions](#les-sessions)
  - [Démarrer une session en PHP](#démarrer-une-session-en-php)
  - [Récupérer des informations de session en PHP](#récupérer-des-informations-de-session-en-php)
  - [Durée de vie des sessions](#durée-de-vie-des-sessions)
  - [Détruire une session en PHP](#détruire-une-session-en-php)
  - [Différences entre sessions et cookies](#différences-entre-sessions-et-cookies)
- [Authentification et autorisation](#authentification-et-autorisation)
  - [Authentification](#authentification)
  - [Autorisation](#autorisation)
  - [Gérer l'authentification et l'autorisation avec des sessions](#gérer-lauthentification-et-lautorisation-avec-des-sessions)
  - [Stocker les mots de passe de manière sécurisée dans la base de données](#stocker-les-mots-de-passe-de-manière-sécurisée-dans-la-base-de-données)
- [Conclusion](#conclusion)
- [Exemples de code](#exemples-de-code)
- [Exercices](#exercices)

## Objectifs

- Utiliser les sessions pour stocker des informations utilisateur.
- Différencier les sessions et les cookies.
- Implémenter l'authentification des utilisateurs à l'aide de sessions.
- Gérer l'autorisation des utilisateurs en fonction de leurs rôles.

## Les sessions

Les sessions permettent de stocker des informations spécifiques à un utilisateur
sur le serveur.

En effet, chaque requête HTTP est indépendante, ce qui signifie que le serveur
ne garde pas de trace des interactions précédentes avec un client. Les sessions
permettent de surmonter cette limitation en associant un identifiant de session
unique à chaque utilisateur.

Les sessions reposent sur l'utilisation de cookies pour stocker l'identifiant de
session sur le poste client (navigateur). Lorsque l'utilisateur se connecte pour
la première fois, le serveur génère un identifiant de session unique et l'envoie
au client via un cookie.

Lors des requêtes suivantes, le client renvoie ce cookie au serveur, permettant
ainsi au serveur d'identifier l'utilisateur et de récupérer les informations
associées à sa session.

Les sessions sont généralement utilisées pour stocker des informations telles
que l'état de connexion de l'utilisateur, les préférences utilisateur, ou
d'autres données temporaires.

Les sessions peuvent être utilisées pour implémenter des mécanismes
d'authentification et d'autorisation, en associant des informations de connexion
et des rôles aux sessions utilisateur.

### Démarrer une session en PHP

Pour démarrer une session en PHP, on utilise la fonction `session_start()`.
Cette fonction doit être appelée au début de chaque script PHP qui utilise des
sessions, avant tout envoi de contenu au navigateur (avant tout `echo`, `print`,
ou tout espace blanc en dehors des balises PHP).

Par exemple, pour démarrer une session et stocker des informations utilisateur,
on peut utiliser le code suivant :

```php
<?php
// Démarrer la session
session_start();

// Stocker des informations dans la session
$_SESSION['user_id'] = 123;
$_SESSION['username'] = 'johndoe';
?>
```

Dans cet exemple, nous démarrons une session avec `session_start()`, puis nous
stockons l'identifiant utilisateur et le nom d'utilisateur dans la superglobale
`$_SESSION`.

Lorsqu'une session est démarrée, PHP crée un fichier de session sur le serveur
pour stocker les données de session. Un cookie contenant l'identifiant de
session est envoyé au navigateur du client.

De cette manière, lors des requêtes suivantes, le navigateur renverra ce cookie
au serveur, permettant ainsi au serveur de retrouver les données de session
associées à cet utilisateur.

Les informations stockées dans `$_SESSION` seront accessibles dans toutes les
pages de l'application tant que la session est active.

La session reste active jusqu'à ce que l'utilisateur demande au serveur de
détruire la session ou que la session expire (généralement après une période
d'inactivité définie par le serveur).

Grâce à l'identifiant de session stocké dans le cookie, le serveur peut
retrouver les données de session associées à l'utilisateur à chaque requête.
Chaque utilisateur aura ainsi sa propre session avec ses propres données.

### Récupérer des informations de session en PHP

Pour récupérer des informations stockées dans une session en PHP, on utilise la
variable superglobale `$_SESSION`. Avant de pouvoir accéder aux données de
session, il est nécessaire d'appeler `session_start()` au début du script.

Grâce à cet appel, PHP charge les données de session associées à l'identifiant
de session envoyé par le navigateur à l'aide du cookie fournit précédemment.

Par exemple, pour récupérer l'identifiant utilisateur et le nom d'utilisateur
stockés dans la session, on peut utiliser le code suivant :

```php
<?php
// Démarrer la session
session_start();

// Récupérer des informations de la session
$user_id = $_SESSION['user_id'] ?? null;
$username = $_SESSION['username'] ?? 'Invité';
?>
```

### Durée de vie des sessions

Par défaut, les sessions en PHP expirent après une période d'inactivité définie
par le serveur (180 minutes par défaut). Il est possible de configurer la durée
de vie des sessions lors de l'appel à `session_start()` en utilisant des
paramètres de configuration.

Par exemple, pour définir une durée de vie de session de 1 heure (60 minutes),
on peut utiliser le code suivant :

```php
<?php
// Définir la durée de vie de la session à 1 heure
session_cache_expire(60);

// Démarrer la session
session_start();

// Le reste du code
// ...
?>
```

### Détruire une session en PHP

Pour détruire une session en PHP, on utilise la fonction `session_destroy()`.
Cette fonction détruit toutes les données associées à la session en cours sur le
serveur. Avant d'appeler `session_destroy()`, il est nécessaire d'appeler
`session_start()` pour accéder à la session en cours.

Voici un exemple de code pour détruire une session en PHP :

```php
<?php
// Démarrer la session
session_start();

// Détruire la session
session_destroy();
?>
```

### Différences entre sessions et cookies

Les sessions et les cookies sont deux mécanismes utilisés pour stocker des
informations utilisateur, mais ils présentent des différences importantes :

- **Stockage** :
  - Les cookies sont stockés sur le poste client (navigateur) sous forme de
    petits fichiers texte.
  - Les sessions sont stockées sur le serveur, généralement dans des fichiers de
    session ou dans une base de données.
- **Sécurité** :
  - Les cookies sont vulnérables aux attaques telles que le vol de cookies ou la
    falsification de cookies, car ils sont stockés sur le poste client.
  - Les sessions sont généralement plus sécurisées, car les données sensibles
    sont stockées sur le serveur.
- **Taille des données** :
  - Les cookies ont une taille limitée (généralement quelques kilo-octets).
  - Les sessions peuvent stocker des quantités plus importantes de données, car
    elles sont stockées sur le serveur.
- **Durée de vie** :
  - Les cookies peuvent avoir une durée de vie définie par le serveur ou être
    valides jusqu'à la fermeture du navigateur.
  - Les sessions expirent généralement après une période d'inactivité définie
    par le serveur.

Les cookies sont souvent utilisés pour stocker des préférences utilisateur ou
des informations non sensibles. Ces cookies peuvent être modifiés par le client
et définissent le comportement de l'application (par exemple, la langue
préférée) que le serveur doit respecter.

A l'inverse, les sessions sont utilisées pour stocker des informations sensibles
et temporaires, telles que l'état de connexion de l'utilisateur ou des données
de panier d'achat. Ces informations ne doivent pas être directement modifiables
par le client. La seule chose que le client doit faire est de renvoyer
l'identifiant de session au serveur via le cookie associé. Si le client modifie
ce cookie, il ne pourra plus être identifié correctement par le serveur et devra
se reconnecter.

Bien que les sessions utilisent des cookies pour stocker l'identifiant de
session sur le poste client, elles offrent une couche de sécurité supplémentaire
en stockant les données sensibles sur le serveur.

## Authentification et autorisation

Les sessions sont couramment utilisées pour implémenter des mécanismes
d'authentification et d'autorisation dans les applications web.

> [!CAUTION]
>
> L'authentification et l'autorisation sont des concepts essentiels pour la
> sécurité des applications web. Il est crucial de les implémenter correctement
> pour protéger les données utilisateur et garantir que seuls les utilisateurs
> autorisés peuvent accéder à certaines ressources.
>
> Je (Ludovic) ne suis pas un expert en sécurité informatique. Les exemples de
> code fournis dans ce support de cours sont simplifiés à des fins pédagogiques
> et ne devraient pas être utilisés tels quels dans des applications en
> production.
>
> Dans le contexte de cette unité d'enseignement, l'objectif est de comprendre
> les concepts d'authentification et d'autorisation, ainsi que la manière dont
> les sessions peuvent être utilisées pour les gérer. Cependant, ces exemples
> peuvent contenir des vulnérabilités de sécurité.
>
> Pour des applications réelles, il est recommandé de suivre les meilleures
> pratiques en matière de sécurité et de consulter des experts en sécurité
> informatique.
>
> Les ressources suivantes fournissent des informations supplémentaires sur
> l'authentification et l'autorisation sécurisées :
>
> - [OWASP Authentication Cheat Sheet](https://cheatsheetseries.owasp.org/cheatsheets/Authentication_Cheat_Sheet.html)
> - [OWASP Authorization Cheat Sheet](https://cheatsheetseries.owasp.org/cheatsheets/Authorization_Cheat_Sheet.html)
>
> Dans de futures unités d'enseignement, vous utiliserez des bibliothèques et
> des frameworks qui intègrent des mécanismes d'authentification et
> d'autorisation sécurisés.

### Authentification

L'authentification est le processus de vérification de l'identité d'un
utilisateur. Lorsqu'un utilisateur se connecte à une application, ses
informations de connexion (par exemple, son nom d'utilisateur et son mot de
passe) sont vérifiées par le serveur. Si les informations sont correctes,
l'utilisateur est considéré comme authentifié.

Une fois l'utilisateur authentifié, des informations spécifiques à cet
utilisateur sont stockées dans la session. Par exemple, l'identifiant
utilisateur peut être stocké dans la session pour permettre au serveur de
reconnaître l'utilisateur lors des requêtes suivantes.

### Autorisation

L'autorisation est le processus de détermination des actions qu'un utilisateur
est autorisé à effectuer au sein de l'application. En fonction des informations
stockées dans la session, le serveur peut déterminer les droits d'accès de
l'utilisateur. Par exemple, un utilisateur avec un rôle d'administrateur peut
avoir accès à des fonctionnalités supplémentaires par rapport à un utilisateur
standard.

### Gérer l'authentification et l'autorisation avec des sessions

Lorsqu'un utilisateur tente d'accéder à une ressource protégée, le serveur
vérifie d'abord si l'utilisateur est authentifié en vérifiant les informations
stockées dans la session. Si l'utilisateur n'est pas authentifié, il est
redirigé vers une page de connexion.

Si l'utilisateur est authentifié, le serveur vérifie ensuite les droits d'accès
de l'utilisateur en fonction des informations stockées dans la session. Si
l'utilisateur n'a pas les droits nécessaires pour accéder à la ressource, il
peut être redirigé vers une page d'erreur ou recevoir un message d'accès refusé.

Avec PHP, l'authentification et l'autorisation peuvent être gérées en utilisant
les sessions de la manière suivante :

```php
<?php
// Démarrer la session
session_start();

// Vérifier si l'utilisateur est authentifié
if (!isset($_SESSION['user_id'])) {
    // Rediriger vers la page de connexion
    header('Location: login.php');
    exit();
}

// Vérifier les droits d'accès de l'utilisateur
if ($_SESSION['role'] !== 'admin') {
    // Refuser l'accès
    header('HTTP/1.1 403 Forbidden');
    exit();
}

// L'utilisateur est authentifié et autorisé à accéder à la ressource
```

Un exemple plus complet d'implémentation de l'authentification et de
l'autorisation avec des sessions peut être trouvé dans les exemples de code du
cours.

### Stocker les mots de passe de manière sécurisée dans la base de données

Les sessions permettent de mettre en œuvre des mécanismes d'authentification et
d'autorisation, notamment grâce à des formulaires de création de compte et de
connexion.

Lors de la création d'un compte, il est essentiel de stocker les mots de passe
de manière sécurisée dans la base de données. Pour ce faire, il est recommandé
d'utiliser des fonctions de hachage sécurisées, telles que `password_hash()` en
PHP, pour hacher les mots de passe avant de les stocker.

Hasher un mot de passe signifie le transformer en une chaîne de caractères
unique et fixe, qui ne peut pas être inversée pour retrouver le mot de passe
original. Ainsi, même si la base de données est compromise, les mots de passe
restent inaccessibles.

Une fois le mot de passe haché, il peut être stocké dans la base de données en
lieu du mot de passe en clair.

Lors de la connexion, le mot de passe saisi par l'utilisateur est comparé au mot
de passe haché stocké dans la base de données à l'aide de la fonction
`password_verify()` en PHP.

La vérification du mot de passe se fait en hachant le mot de passe saisi et en
le comparant au mot de passe haché stocké. Si les deux correspondent, l'
utilisateur est authentifié avec succès. Sinon, l'authentification échoue.

Voici un exemple de code pour créer un compte utilisateur avec un mot de passe
haché :

```php
<?php
// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=mydatabase', 'username', 'password');

// Récupérer les données du formulaire
$username = $_POST['username'];
$password = $_POST['password'];

// Hacher le mot de passe
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Insérer l'utilisateur dans la base de données
$stmt = $pdo->prepare('INSERT INTO users (username, password) VALUES (:username, :password)');
$stmt->execute(['username' => $username, 'password' => $hashedPassword]);
?>
```

Lors de la connexion, il est important de vérifier le mot de passe saisi par
l'utilisateur en le comparant avec le mot de passe haché stocké dans la base de
données.

Voici un exemple de code pour vérifier les informations de connexion lors de la
connexion :

```php
<?php
// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=mydatabase', 'username', 'password');

// Récupérer les données du formulaire
$username = $_POST['username'];
$password = $_POST['password'];

// Récupérer l'utilisateur de la base de données
$stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username');
$stmt->execute(['username' => $username]);
$user = $stmt->fetch();

// Vérifier le mot de passe
if ($user && password_verify($password, $user['password'])) {
    // Authentification réussie - démarrer la session
    session_start();
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];

    // Rediriger vers la page d'accueil
    header('Location: index.php');
    exit();
} else {
    // Authentification échouée
    echo 'Nom d\'utilisateur ou mot de passe incorrect.';
}
?>
```

Un exemple plus complet d'implémentation de l'authentification et de
l'autorisation avec des sessions peut être trouvé dans les exemples de code du
cours.

## Conclusion

Dans ce cours, nous avons exploré les concepts fondamentaux des sessions, de
l'authentification et de l'autorisation dans les applications web.

Ces mécanismes sont essentiels pour garantir la sécurité et la personnalisation
des applications web, en permettant de stocker des informations utilisateur de
manière sécurisée et de contrôler l'accès aux ressources en fonction des droits
d'utilisateur.

Une analogie (fictive et simplifiée) pour comprendre les sessions est de les
comparer à une interaction à un guichet de la Poste :

1. Lorsqu'une personne (le client) arrive à la Poste (le serveur), elle reçoit
   un ticket (un cookie) avec un numéro unique (l'identifiant de session).
2. La personne attend son tour et, lorsqu'un guichet est libre, elle présente
   son ticket à la personne qui tient le guichet (le cookie est envoyé au
   serveur avec la requête HTTP).
3. La personne qui tient le guichet utilise le numéro sur le ticket
   (l'identifiant de session) pour retrouver les informations associées à la
   personne (par exemple, les informations sur son compte bancaire, ses
   préférences, etc. stockées dans la session).
4. Après la transaction, la personne peut partir, mais si elle revient plus tard
   avec le même ticket, la personne qui tient le guichet pourra à nouveau
   retrouver ses informations.
5. Mais si la personne perd son ticket ou si elle revient le lendemain (durée
   maximale de la session), la personne qui tient le guichet ne pourra pas
   l'identifier et devra lui demander de s'inscrire à nouveau.

Dans de futures unités d'enseignement, vous explorerez des mécanismes plus
avancés d'authentification et d'autorisation, implémentés à l'aide de
bibliothèques et de frameworks spécialisés.

## Exemples de code

Nous vous invitons maintenant à consulter les exemples de code du cours afin de
vous familiariser avec les concepts abordés.

Vous trouverez les exemples de code ici :
[Exemples de code](../02-exemples-de-code/).

## Exercices

Nous vous invitons ensuite à réaliser les exercices du cours afin de mettre en
pratique les concepts abordés.

Vous trouverez les exercices ici : [Exercices](../03-exercices/README.md).

[licence]:
	https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/LICENSE.md
