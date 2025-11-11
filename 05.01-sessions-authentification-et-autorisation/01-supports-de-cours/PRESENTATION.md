---
marp: true
---

<!--
theme: custom-marp-theme
size: 16:9
paginate: true
author: L. Delafontaine, avec l'aide de GitHub Copilot
title: HEIG-VD ProgServ2 Course - Sessions, authentification, et autorisation
description: Sessions, authentification, et autorisation pour l'unité d'enseignement ProgServ2 enseigné à la HEIG-VD, Suisse
url: https://heig-vd-progserv-course.github.io/heig-vd-progserv2-course/05.01-sessions-authentification-et-autorisation/01-supports-de-cours/index.html
header: "[**Sessions, authentification, et autorisation**](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/05.01-sessions-authentification-et-autorisation)"
footer: '[**HEIG-VD**](https://heig-vd.ch) - [ProgServ2 2025-2026](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course) - [CC BY-SA 4.0](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/LICENSE.md)'
headingDivider: 6
math: mathjax
-->

# Sessions, authentification, et autorisation

<!--
_class: lead
_paginate: false
-->

[Lien vers le cours][cours]

<small>L. Delafontaine, avec l'aide de
[GitHub Copilot](https://github.com/features/copilot).</small>

<small>Ce travail est sous licence [CC BY-SA 4.0][license].</small>

![bg opacity:0.1][illustration-principale]

## _Retrouvez plus de détails dans le support de cours_

<!-- _class: lead -->

_Cette présentation est un résumé du support de cours. Pour plus de détails,
consultez le [support de cours][cours]._

## Objectifs

- Utiliser les sessions pour stocker des informations utilisateur.
- Différencier les sessions et les cookies.
- Implémenter l'authentification des utilisateur.trices à l'aide de sessions.
- Gérer l'autorisation des utilisateur.trices en fonction de leurs rôles.

![bg right:40%][illustration-objectifs]

## Les sessions

- Permettent de stocker de l'information côté serveur.
- Identifiées par un identifiant de session unique (généralement stocké dans un
  cookie, renvoyé automatiquement à chaque requête).
- Utilisées pour maintenir l'état entre les requêtes HTTP (ex. :
  authentification).

![bg right:40%][illustration-les-sessions]

### Démarrer une session en PHP

Utiliser `session_start()` au début de chaque script PHP qui utilise des
sessions :

```php
<?php
// Démarre la session
session_start();

// Stocke des informations dans la session
$_SESSION['user_id'] = 123;
$_SESSION['username'] = 'johndoe';
```

### Récupérer des informations de session en PHP

Utiliser la superglobale `$_SESSION` pour accéder aux données de session :

```php
<?php
// Démarre la session
session_start();

// Récupère des informations de la session
$user_id = $_SESSION['user_id'] ?? null;
$username = $_SESSION['username'] ?? 'Invité';
```

### Durée de vie des sessions

- Durée de vie courte définie par le serveur (24 minutes par défaut).
- Peut être configurée dans le fichier de configuration `php.ini`, mais ce n'est
  pas conseillé.
- Dans le futur, d'autres mécanismes plus robustes seront vus pour gérer la
  persistance des sessions.

![bg right:40%][illustration-duree-de-vie-des-sessions]

### Détruire une session en PHP

Utiliser `session_destroy()` pour détruire une session et supprimer toutes les
données associées :

```php
<?php
// Démarre la session
session_start();

// Détruit la session
session_destroy();
```

### Différences entre sessions et cookies

|                  | Cookies                                         | Sessions                                          |
| ---------------- | ----------------------------------------------- | ------------------------------------------------- |
| **Stockage**     | Côté client (navigateur)                        | Côté serveur - cookie pour identifier la session. |
| **Sécurité**     | Moins sécurisés pour les informations sensibles | Plus sécurisées pour les informations sensibles   |
| **Taille**       | Limitée (environ 4 Ko par cookie)               | Limitée par la mémoire serveur                    |
| **Durée de vie** | Configurable                                    | Courte par défaut                                 |

## Authentification et autorisation

- Les sessions permettent de gérer l'authentification et l'autorisation.
- **Concepts essentiels mais difficiles à implémenter correctement ! Dans de
  futurs unités d'enseignement, nous verrons des solutions plus robustes.**

![bg right:40%][illustration-authentification]
![bg right:40% vertical][illustration-autorisation]

### Authentification

- Processus de vérification de l'identité d'un utilisateur.
- Généralement via un nom d'utilisateur et un mot de passe.
- Si les informations sont correctes (= authentification réussie), stocker
  l'état de connexion dans la session.

![bg right:40%][illustration-authentification]

### Autorisation

- Processus de vérification des droits d'accès d'un utilisateur.
- Détermine les actions qu'un utilisateur peut effectuer.
- Basé sur les rôles et permissions définis dans l'application.

![bg right:40%][illustration-autorisation]

### Gérer l'authentification et l'autorisation avec des sessions (1/2)

Ce processus peut être résumé par les étapes suivantes :

1. Démarrer une session lors de la connexion de l'utilisateur.
2. Stocker l'ID de l'utilisateur et son rôle dans la session.
3. Vérifier les informations d'identification de l'utilisateur lors de la
   connexion.
4. Utiliser les informations de session pour autoriser ou interdire l'accès à
   certaines ressources.

### Gérer l'authentification et l'autorisation avec des sessions (2/2)

<div class="two-columns">
<div>

```php
<?php
// Démarre la session
session_start();

// Vérifie si l'utilisateur est authentifié
if (!isset($_SESSION['user_id'])) {
    // Redirige vers la page de connexion
    header('Location: login.php');
    exit();
}
```

</div>
<div>

```php
// Vérifie les droits d'accès de l'utilisateur
if ($_SESSION['role'] !== 'admin') {
    // Refuse l'accès avec une erreur 403 Forbidden
    http_response_code(403);
    exit();
}

// L'utilisateur est authentifié
// et autorisé à accéder à la ressource
// ...
```

</div>
</div>

Un exemple plus complet est disponible dans les exemples de code.

### Stocker les mots de passe de manière sécurisée dans la base de données (1/3)

- Les sessions permettent de mettre en place des mécanismes d'authentification
  et d'autorisation.
- Les données sensibles, comme les mots de passe, doivent être stockées de
  manière sécurisée.
- Hasher un mot de passe signifie le transformer en une chaîne de caractères
  fixe, difficile à inverser (`m0n-m0t-de-p4ss3` > `5f4dc...`).
- Utiliser des fonctions de hachage sécurisées, comme `password_hash()` et
  `password_verify()` en PHP (cf. exemple).

### Stocker les mots de passe de manière sécurisée dans la base de données (2/3)

```php
<?php
// register.php
// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=mydatabase', 'username', 'password');

// Récupère les données du formulaire
$username = $_POST['username'];
$password = $_POST['password'];

// Hache le mot de passe
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Insère l'utilisateur dans la base de données
$stmt = $pdo->prepare('INSERT INTO users (username, password) VALUES (:username, :password)');
$stmt->execute(['username' => $username, 'password' => $hashedPassword]);
```

### Stocker les mots de passe de manière sécurisée dans la base de données (3/3)

```php
<?php
// login.php
// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=mydatabase', 'username', 'password');

// Récupère les données du formulaire
$username = $_POST['username'];
$password = $_POST['password'];

// Récupère l'utilisateur de la base de données
$stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username');
$stmt->execute(['username' => $username]);
$user = $stmt->fetch();
```

---

```php
// Vérifie le mot de passe
if ($user && password_verify($password, $user['password'])) {
    // Authentification réussie - démarre la session
    session_start();

// Stocke les informations utilisateur dans la session
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];

    // Redirige vers la page d'accueil
    header('Location: index.php');
    exit();
} else {
    // Authentification échouée
    echo 'Nom d\'utilisateur ou mot de passe incorrect.';
}
```

## Conclusion

- Les sessions permettent de maintenir l'état entre les requêtes HTTP à l'aide
  d'un cookie.
- Utiliser les sessions pour gérer l'authentification et l'autorisation des
  utilisateur.trices.
- Stocker les mots de passe de manière sécurisée en les hachant avant de les
  stocker dans la base de données.

![bg right:40%][illustration-principale]

## Questions

<!-- _class: lead -->

Est-ce que vous avez des questions ?

## À vous de jouer !

- (Re)lire le support de cours.
- Explorer les exemples de code.
- Faire les exercices.
- Poser des questions si nécessaire.

➡️ [Lien vers le cours][cours]

**N'hésitez pas à vous entraidez si vous avez des difficultés !**

![bg right:40%][illustration-a-vous-de-jouer]

## Sources

- [Illustration principale][illustration-principale] par
  [Richard Jacobs](https://unsplash.com/@rj2747) sur
  [Unsplash](https://unsplash.com/photos/grayscale-photo-of-elephants-drinking-water-8oenpCXktqQ)
- [Illustration][illustration-objectifs] par
  [Aline de Nadai](https://unsplash.com/@alinedenadai) sur
  [Unsplash](https://unsplash.com/photos/low-angle-view-of-ball-shoots-in-the-ring-j6brni7fpvs)
- [Illustration][illustration-les-sessions] par
  [Markus Spiske](https://unsplash.com/@markusspiske) sur
  [Unsplash](https://unsplash.com/photos/text-nBwhHm69x4I)
- [Illustration][illustration-duree-de-vie-des-sessions] par
  [Jon Tyson](https://unsplash.com/@jontyson) sur
  [Unsplash](https://unsplash.com/photos/brown-and-white-clocks-FlHdnPO6dlw)
- [Illustration][illustration-authentification] par
  [CDC](https://unsplash.com/@cdc) sur
  [Unsplash](https://unsplash.com/photos/woman-in-green-shirt-holding-white-and-black-short-coated-dog-A82PSKGx9cI)
- [Illustration][illustration-autorisation] par
  [Imre Tomosvari](https://unsplash.com/@timester12) sur
  [Unsplash](https://unsplash.com/photos/gray-suv-on-road-during-daytime-FbhuN53_330)
- [Illustration][illustration-a-vous-de-jouer] par
  [Nikita Kachanovsky](https://unsplash.com/@nkachanovskyyy) sur
  [Unsplash](https://unsplash.com/photos/white-sony-ps4-dualshock-controller-over-persons-palm-FJFPuE1MAOM)

<!-- URLs -->

[cours]:
	https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/tree/main/05.01-sessions-authentification-et-autorisation
[license]:
	https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/LICENSE.md

<!-- Illustrations -->

[illustration-principale]:
	https://images.unsplash.com/photo-1517486430290-35657bdcef51?fit=crop&h=720
[illustration-objectifs]:
	https://images.unsplash.com/photo-1516389573391-5620a0263801?fit=crop&h=720
[illustration-les-sessions]:
	https://images.unsplash.com/photo-1601714582667-574b826b99a6?fit=crop&h=720
[illustration-duree-de-vie-des-sessions]:
	https://images.unsplash.com/photo-1533749047139-189de3cf06d3?fit=crop&h=720
[illustration-authentification]:
	https://images.unsplash.com/photo-1580795478690-5c6afcf4e7c3?fit=crop&h=720
[illustration-autorisation]:
	https://images.unsplash.com/photo-1586592707296-5608a546e9aa?fit=crop&h=720
[illustration-a-vous-de-jouer]:
	https://images.unsplash.com/photo-1509198397868-475647b2a1e5?fit=crop&h=720
