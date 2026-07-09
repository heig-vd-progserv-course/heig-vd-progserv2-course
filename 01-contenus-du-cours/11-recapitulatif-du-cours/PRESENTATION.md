---
marp: true
---

<!--
theme: custom-marp-theme
size: 16:9
paginate: true
author: L. Delafontaine, avec l'aide de GitHub Copilot
title: HEIG-VD ProgServ2 Course - Récapitulatif de l'unité d'enseignement
description: Récapitulatif de l'unité d'enseignement pour l'unité d'enseignement ProgServ2 à la HEIG-VD, Suisse
url: https://heig-vd-progserv-course.github.io/heig-vd-progserv2-course/01-contenus-du-cours/09-recapitulatif-du-cours/presentation.html
header: "[**Récapitulatif de l'unité d'enseignement**](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/01-contenus-du-cours/09-recapitulatif-du-cours/README.md)"
footer: "**HEIG-VD** - ProgServ2 Course 2025-2026 - CC BY-SA 4.0"
headingDivider: 6
math: mathjax
-->

# Récapitulatif de l'unité d'enseignement

<!--
_class: lead
_paginate: false
-->

[Lien vers le cours][cours]

<small>L. Delafontaine, avec l'aide de
[GitHub Copilot](https://github.com/features/copilot).</small>

<small>Ce travail est sous licence [CC BY-SA 4.0][license].</small>

![bg brightness:2 opacity:0.2][illustration-principale]

## Récapitulatif de l'unité d'enseignement

<!-- _class: lead -->

Vous l'avez fait, bravo ! 🎉

## Retrospective

<!-- _class: lead -->

Jetons un coup d'œil sur ce que **vous** avez fait durant ce semestre.

### Objectifs de l'unité d'enseignement

> En résumé, vous devriez être capable de :
>
> - Appliquer tous les concepts vu en
>   [Programmation serveur 1 (ProgServ1)](https://github.com/heig-vd-progserv-course/heig-vd-progserv1-course)
>   dans le contexte d'un projet libre.
> - Utiliser des concepts avancés de la programmation orientée objet.
> - Déployer et accéder à votre propre application en ligne et persister les
>   données dans une base de données dédiée.
> - Gérer les préférences et l'authentification des utilisateur.trices.

### Cours 01 - Programmation orientée objet

<!-- _class: lead -->

[Retrouvez ce cours sur le dépôt Git de l'unité d'enseignement](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/01.05-programmation-orientee-objet-avance).

![bg brightness:2 opacity:0.2][illustration-principale]

#### Éléments clés à retenir

- La programmation orientée objet (POO) est un paradigme de programmation qui
  organise le code en objets.
- L'encapsulation permet de protéger les données et les méthodes des objets.
- La POO facilite la réutilisabilité et la maintenabilité du code.
- Les concepts avancés de la POO incluent l'héritage, les interfaces, et les
  classes abstraites.
- Grâce à l'autoloader, les classes peuvent être chargées automatiquement en
  fonction de leur namespace.

### Cours 02 - Bases de données MySQL/MariaDB et déploiement

<!-- _class: lead -->

[Retrouvez ce cours sur le dépôt Git de l'unité d'enseignement](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/02.01-bases-de-donnees-et-pdo-avance).

![bg brightness:2 opacity:0.2][illustration-principale]

#### Éléments clés à retenir

- Les bases de données relationnelles permettent de stocker et de gérer des
  données de manière structurée.
- PDO (PHP Data Objects) est une extension de PHP qui permet d'interagir avec
  différentes bases de données de manière sécurisée et efficace.
- PDO peut interagir avec plusieurs types de bases de données.
- SQLite en _"Programmation serveur 1 (ProgServ1)"_, MySQL en _Programmation
  serveur 2 (ProgServ2)_.
- Attention aux attaques par injection SQL et attaques XSS !

### Cours 03 - Déploiement

<!-- _class: lead -->

[Retrouvez ce cours sur le dépôt Git de l'unité d'enseignement](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/03.01-deploiement).

![bg brightness:2 opacity:0.2][illustration-principale]

#### Éléments clés à retenir

- Déployer une application web PHP demande de bien connaître son architecture
  (un serveur web (Apache) pour gérer les requêtes HTTP, un interpréteur PHP
  pour exécuter le code PHP, une base de données pour stocker les données, et un
  espace de stockage pour les fichiers de l'application).
- Configurer un environnement de production sécurisé est crucial pour protéger
  les données et les utilisateurs.
- Infomaniak est un fournisseur suisse de confiance pour héberger des
  applications web PHP.
- Vos applications sont accessibles depuis n'importe où (!).

### Cours 04 - Cookies, préférences, et gestion multilingues (i18n)

<!-- _class: lead -->

[Retrouvez ce cours sur le dépôt Git de l'unité d'enseignement](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/04.01-cookies-preferences-et-gestion-multilingues-i18n).

![bg brightness:2 opacity:0.2][illustration-principale]

#### Éléments clés à retenir

- Les cookies sont des fichiers textes stockés sur le poste client (navigateur)
  qui permettent de stocker les préférences utilisateur (ex. : langue, thème,
  etc.).
- Les cookies sont définis par le serveur et envoyés au client via les en-têtes
  HTTP, puis renvoyés par le client au serveur avec chaque requête HTTP.
- La gestion multilingue (i18n) permet d'adapter le contenu d'une application
  web en fonction de la langue préférée de l'utilisateur.
- Utiliser des fichiers de traduction pour stocker les chaînes de texte dans
  différentes langues.

### Cours 05 - Sessions, authentification, et autorisation

<!-- _class: lead -->

[Retrouvez ce cours sur le dépôt Git de l'unité d'enseignement](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/07.01-recapitulatif-de-lunite-denseignement).

![bg brightness:2 opacity:0.2][illustration-principale]

#### Éléments clés à retenir

- Les sessions (qui se reposent sur les cookies) permettent de sauvegarder des
  informations spécifiques à un utilisateur entre plusieurs requêtes HTTP.
- L'authentification vérifie l'identité d'un utilisateur (ex. : login/mot de
  passe).
- L'autorisation détermine les actions qu'un utilisateur authentifié est
  autorisé à effectuer (ex. : rôles et permissions).
- Ces deux concepts sont essentiels pour sécuriser les applications web et
  isoler/protéger les données des utilisateurs.

### Cours 06 - Gestion et envoi des e-mails

<!-- _class: lead -->

[Retrouvez ce cours sur le dépôt Git de l'unité d'enseignement](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/06.01-gestion-et-envoi-des-e-mails).

![bg brightness:2 opacity:0.2][illustration-principale]

#### Éléments clés à retenir

- Les e-mails reposent sur des protocoles standards comme SMTP, IMAP, et POP3.
- Envoyer des e-mails demande un serveur SMTP configuré correctement. Pour cela,
  nous utilisons Infomaniak (pour la production) ou Mailpit (pour le
  développement local).
- La fonction `mail()` de PHP est basique et limitée.
- Utiliser une bibliothèque comme PHPMailer permet d'envoyer des e-mails de
  manière plus fiable et sécurisée.
- Utiliser des dépendances externes simplifie le développement.

### Projet libre

<!-- _class: lead -->

[Retrouvez ce cours sur le dépôt Git de l'unité d'enseignement](<https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/tree/main/01.03-projet-libre-(1-sur-8)>).

![bg brightness:2 opacity:0.2][illustration-principale]

#### Éléments clés à retenir

- Vous avez réalisé un projet libre de A à Z.
- Vous avez déployé l'application chez un hébergeur tel qu'Infomaniak.
- L'application est disponible sur Internet, la rendant accessible à tout le
  monde.
- Vous pouvez être fier.es de ce que vous avez fait ! Bravo !

**Attention à la date et la forme du rendu** (voir support de cours). Je ferai
mon possible pour vous rendre les notes au plus vite.

## Résultats des formulaires de feedback et évaluations GAPS

<!-- _class: lead -->

Discussions et retours sur l'unité d'enseignement.

<small>

Vous pourrez les retrouver sur le [dépôt Git de l'unité d'enseignement][cours].

</small>

## Conclusion

<!-- _class: lead -->

### Conclusion (1/3)

- Jusqu'à maintenant, vous avez réalisé des applications web simples avec PHP.
- Ces applications ont été entièrement construites par vos soins, de la
  conception à la mise en ligne.
- Ces applications, bien que simples, respectent les bonnes pratiques de
  développement web.
- Néanmoins, vous avez expérimenté les défis et les complexités du développement
  web et les questions d'implémentation.
- Il existe d'autres solutions pour ne pas réinventer la roue.

### Conclusion (2/3)

- Dans le monde professionnel, nous avons des frameworks et des bibliothèques
  pour nous aider à gérer ces complexités.
- Ces outils sont conçus pour :
  1. Simplifier et accélérer le développement web.
  2. Garantir la sécurité.
  3. Mettre en œuvre des solutions éprouvées et efficaces.
  4. Le but est de ne pas devoir tout (re)faire à la main.

### Conclusion (3/3)

- Au prochain semestre, je vous souhaite d'explorer les éléments suivants :
  - Gestion de dépendances externes avec Composer.
  - Utilisation de frameworks PHP populaires comme Laravel ou Symfony.
  - Utilisation du modèle MVC avec systèmes de routage et templating.
  - Mais surtout, je vous souhaite de vous épanouir dans ce qui vous plaît le
    plus !

### Mes derniers conseils pour la suite

- Posez-vous toujours les bonnes questions : _"pourquoi ?"_, _"est-ce que je
  fais la bonne chose pour la bonne cause ?"_
- Faites toujours ce qui est bon pour vous : la santé, les relations, les ami.es
  sont plus important.es que le travail !
- Ayez toujours confiance en vous et en vos tripes : faites ce que vous pensez
  être juste !
- Aidez les autres : la coopération vaut mieux que la compétition !
- Restez critique : votre opinion compte et peut faire la différence (ne faites
  pas confiance à tout ce que vous lisez, ex. l'AI !).

## Merci !

Encore merci pour votre attention et votre engagement tout au long de cette
unité d'enseignement (autant ProgServ1 que ProgServ2).

J'ai eu beaucoup de plaisir à enseigner cette matière et à travailler avec vous.

Je vous souhaite tout le meilleur pour la suite de votre parcours académique et
professionnel mais, surtout, que vous soyez heureux.ses ! Au plaisir de vous
recroiser !

Apéro time! 🎉

## Sources

- [Illustration principale][illustration-principale] par
  [Richard Jacobs](https://unsplash.com/@rj2747) sur
  [Unsplash](https://unsplash.com/photos/grayscale-photo-of-elephants-drinking-water-8oenpCXktqQ)
- [Illustration][illustration-objectifs] par
  [Aline de Nadai](https://unsplash.com/@alinedenadai) sur
  [Unsplash](https://unsplash.com/photos/low-angle-view-of-ball-shoots-in-the-ring-j6brni7fpvs)

<!-- URLs -->

[cours]:
	https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/07.01-recapitulatif-de-lunite-denseignement
[license]:
	https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/LICENSE.md

<!-- Illustrations -->

[illustration-principale]:
	https://images.unsplash.com/photo-1517486430290-35657bdcef51?fit=crop&h=720
[illustration-objectifs]:
	https://images.unsplash.com/photo-1516389573391-5620a0263801?fit=crop&h=720
