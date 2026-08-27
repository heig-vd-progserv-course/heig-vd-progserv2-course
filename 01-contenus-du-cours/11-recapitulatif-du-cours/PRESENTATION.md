---
marp: true
---

<!--
theme: custom-marp-theme
size: 16:9
paginate: true
author: L. Delafontaine, avec l'aide de GitHub Copilot
title: HEIG-VD ProgServ2 Course - Récapitulatif du cours
description: Récapitulatif du cours pour le cours ProgServ2 à la HEIG-VD, Suisse
url: https://heig-vd-progserv-course.github.io/heig-vd-progserv2-course/01-contenus-du-cours/09-recapitulatif-du-cours/presentation.html
header: "[**Récapitulatif du cours**](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/01-contenus-du-cours/09-recapitulatif-du-cours/README.md)"
footer: "**HEIG-VD** - ProgServ2 Course 2025-2026 - CC BY-SA 4.0"
headingDivider: 6
math: mathjax
-->

# Récapitulatif du cours

<!--
_class: lead
_paginate: false
-->

[<img src="https://raw.githubusercontent.com/primer/octicons/refs/heads/main/icons/mark-github-24.svg" style="vertical-align: middle; width: 32px;" alt="GitHub logo"> `github.com/heig-vd-progserv-course/heig-vd-progserv2-course`](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course)

[Visualiser le contenu complet sur GitHub][contenu-complet].

<small>L. Delafontaine, avec l'aide de
[GitHub Copilot](https://github.com/features/copilot).</small>

<small>Ce travail est sous licence [CC BY-SA 4.0][license].</small>

![bg opacity:0.1][illustration-principale]

## Récapitulatif du cours

<!-- _class: lead -->

Vous l'avez fait, bravo ! 🎉

## Retrospective

<!-- _class: lead -->

Jetons un coup d'œil sur ce que **vous** avez fait durant ce semestre.

### Objectifs du cours (1/2)

À la fin de ce cours, vous devriez être capable de :

> - Structurer un code serveur avec les concepts de la programmation orientée
>   objet.
> - Mettre en place les principes de session/cookie pour gérer une
>   authentification simple.
> - Mettre en place les principes de sécurité pour protéger une application web
>   contre les attaques les plus courantes.
> - Réutiliser des parties d'interface pour simplifier le développement d'une
>   application web.

### Objectifs du cours (2/2)

> - Implémenter une application web multilingue.
> - Déployer une application web avec une base de données dédiée.
> - Envoyer des e-mails depuis une application web.

---

<!-- _class: lead -->

> Grâce à ces compétences, la personne qui étudie sera en mesure de développer
> des applications web combinant plusieurs aspects avec une gestion des accès
> aux pages publiques et privées (par exemple, un gestionnaire de tâches
> multi-utilisateurs, une plateforme de réservations de concerts, etc.).

### Séance 1 - Rappels sur PHP

<!-- _class: lead -->

[Retrouvez ce contenu sur le dépôt Git du cours](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/01-contenus-du-cours/02-rappels-sur-php/README.md).

![bg opacity:0.1][illustration-principale]

#### Éléments clés à retenir

- PHP est un langage de programmation côté serveur utilisé pour créer des
  applications web dynamiques.
- PHP est interprété par un serveur web, qui génère du HTML à envoyer au
  navigateur, basé sur une architecture client-serveur.
- L'hébergement web ou l'environnement de développement permet de mettre tout le
  nécessaire pour exécuter une application web PHP sur Internet : serveur web,
  base de données, gestion des e-mails, espace de stockage, etc.
- Le début de votre projet libre !

### Séance 2 - Programmation orientée objet

<!-- _class: lead -->

[Retrouvez ce contenu sur le dépôt Git du cours](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/01-contenus-du-cours/03-programmation-orientee-objet/README.md).

![bg opacity:0.1][illustration-principale]

#### Éléments clés à retenir

- La programmation orientée objet (POO) est un paradigme de programmation qui
  organise le code en objets.
- L'encapsulation permet de protéger les données et les méthodes des objets.
- La POO facilite la réutilisabilité et la maintenabilité du code.
- Les concepts avancés de la POO incluent l'héritage, les interfaces, et les
  classes abstraites.

### Séance 3 - Bases de données MySQL/MariaDB et déploiement

<!-- _class: lead -->

[Retrouvez ce contenu sur le dépôt Git du cours](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/01-contenus-du-cours/04-bases-de-donnees-avec-mysql-mariadb-et-deploiement/README.md).

![bg opacity:0.1][illustration-principale]

#### Éléments clés à retenir

- Les bases de données relationnelles permettent de stocker et de gérer des
  données de manière structurée.
- PDO (PHP Data Objects) est une extension de PHP qui permet d'interagir avec
  différentes bases de données de manière sécurisée et efficace.
- PDO peut interagir avec plusieurs types de bases de données : SQLite en
  ProgServ1, MySQL en ProgServ2.
- Déployer une application web PHP demande de bien connaître son architecture.

### Séance 4 - Réutiliser des parties d'interface

<!-- _class: lead -->

[Retrouvez ce contenu sur le dépôt Git du cours](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/01-contenus-du-cours/05-reutiliser-des-parties-dinterface/README.md).

![bg opacity:0.1][illustration-principale]

#### Éléments clés à retenir

- La réutilisation de parties d'interface permet de créer des composants
  modulaires et maintenables.
- Il n'est donc pas nécessaire de modifier chaque page individuellement pour
  apporter des changements à l'interface.
- Les parties communes de l'interface ou les composants peuvent être inclus dans
  les pages web à l'aide de fonctions PHP comme `require()`.
- Une modification dans un fichier inclus se répercute automatiquement sur
  toutes les pages qui l'utilisent.

### Séance 5 - Sécurité et nettoyage des saisies

<!-- _class: lead -->

[Retrouvez ce contenu sur le dépôt Git du cours](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/01-contenus-du-cours/06-securite-et-nettoyage-des-saisies/README.md).

![bg opacity:0.1][illustration-principale]

#### Éléments clés à retenir

- La sécurité est cruciale dans le développement web pour protéger les données
  et les utilisateurs.
- Les attaques courantes incluent l'injection SQL et les attaques XSS
  (Cross-Site Scripting).
- Les requêtes préparées avec PDO permettent de prévenir les attaques par
  injection SQL en séparant le code SQL des données.
- Les fonctions de nettoyage comme `htmlspecialchars()` aident à sécuriser les
  données affichées dans le navigateur en échappant les caractères spéciaux.

### Séance 6 - Cookies, préférences, et gestion multilingue (i18n)

<!-- _class: lead -->

[Retrouvez ce contenu sur le dépôt Git du cours](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/01-contenus-du-cours/07-cookies-preferences-et-gestion-multilingues-i18n/README.md).

![bg opacity:0.1][illustration-principale]

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

### Séance 7 - Sessions, authentification, et autorisation

<!-- _class: lead -->

[Retrouvez ce contenu sur le dépôt Git du cours](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/01-contenus-du-cours/08-sessions-authentification-et-autorisation/README.md).

![bg opacity:0.1][illustration-principale]

#### Éléments clés à retenir

- Les sessions (qui se reposent sur les cookies) permettent de sauvegarder des
  informations spécifiques à un utilisateur entre plusieurs requêtes HTTP.
- L'authentification vérifie l'identité d'un utilisateur (ex. : login/mot de
  passe).
- L'autorisation détermine les actions qu'un utilisateur authentifié est
  autorisé à effectuer (ex. : rôles et permissions).
- Ces deux concepts sont essentiels pour sécuriser les applications web et
  isoler/protéger les données des utilisateurs.

### Séance 8 - Programmation orientée objet (avancé)

<!-- _class: lead -->

[Retrouvez ce contenu sur le dépôt Git du cours](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/01-contenus-du-cours/09-programmation-orientee-objet-avance/README.md).

![bg opacity:0.1][illustration-principale]

#### Éléments clés à retenir

- Les espaces de noms (namespaces) permettent d'organiser le code et d'éviter
  les conflits de noms entre différentes parties d'une application.
- L'autoloader permet de charger automatiquement les classes et les fichiers
  nécessaires à l'exécution d'une application, simplifiant ainsi la gestion des
  dépendances.
- Les traits sont des mécanismes de réutilisation de code qui permettent de
  partager des méthodes et des propriétés entre plusieurs classes, sans avoir à
  recourir à l'héritage.

### Séance 9 - Gestion et envoi des e-mails

<!-- _class: lead -->

[Retrouvez ce contenu sur le dépôt Git du cours](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/01-contenus-du-cours/10-gestion-et-envoi-des-e-mails/README.md).

![bg opacity:0.1][illustration-principale]

#### Éléments clés à retenir

- Les e-mails reposent sur des protocoles standards comme SMTP, IMAP, et POP3.
- Envoyer des e-mails demande un serveur SMTP configuré correctement. Pour cela,
  nous utilisons Infomaniak (pour la production) ou Mailpit (pour le
  développement local).
- La fonction `mail()` de PHP est basique et limitée.
- Utiliser une bibliothèque comme PHPMailer permet d'envoyer des e-mails de
  manière plus fiable et sécurisée.
- Utiliser des dépendances externes simplifie le développement.

### Évaluation intermédiaire

<!-- _class: lead -->

[Retrouvez ce contenu sur le dépôt Git du cours](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/02-evaluations/01-evaluation-intermediaire/README.md).

![bg opacity:0.1][illustration-principale]

#### Éléments clés à retenir

- Vous avez réalisé un projet libre **conséquent** de A à Z.
- Vous avez déployé l'application chez un hébergeur tel qu'Infomaniak avec une
  base de données dédiée et e-mails.
- L'application est disponible sur Internet, la rendant accessible à tout le
  monde. Plus avancé que tout ce que vous avez réalisé jusqu'ici (ProgServ1 et
  DévAppliS).
- **Vous pouvez être fier.es de ce que vous avez fait ! Bravo !**

**Attention à la date et la forme du rendu** (voir [support de cours]). Je ferai
mon possible pour vous rendre les notes au plus vite.

### Projet libre

<!-- _class: lead -->

[Retrouvez ce contenu sur le dépôt Git du cours](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/02-evaluations/02-projet-libre/README.md).

![bg opacity:0.1][illustration-principale]

#### Éléments clés à retenir

- Vous avez réalisé un projet libre **conséquent** de A à Z.
- Vous avez déployé l'application chez un hébergeur tel qu'Infomaniak avec une
  base de données dédiée et e-mails.
- L'application est disponible sur Internet, la rendant accessible à tout le
  monde. Plus avancé que tout ce que vous avez réalisé jusqu'ici (ProgServ1 et
  DévAppliS).

<center>

**Vous pouvez être fier.es de ce que vous avez fait ! Bravo !**

</center>

#### Rendu du projet libre

- Attention à la date et la forme du rendu.
- Votre travail sera évalué selon les différentes grilles d'évaluation.
- Je ferai mon possible pour vous rendre les notes au plus vite.

<center>

**Toutes les informations sont disponibles dans le
[support de cours](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/02-evaluations/02-projet-libre/README.md).**

</center>

## Résultats des formulaires de feedback et évaluations GAPS

<!-- _class: lead -->

Discussions et retours sur le cours.

<small>

Vous pourrez les retrouver sur le [dépôt Git du cours][contenu-complet].

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

[contenu-complet]:
	https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/01-contenus-du-cours/11-recapitulatif-du-cours/README.md
[license]:
	https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/LICENSE.md

<!-- Illustrations -->

[illustration-principale]:
	https://images.unsplash.com/photo-1517486430290-35657bdcef51?fit=crop&h=720
[illustration-objectifs]:
	https://images.unsplash.com/photo-1516389573391-5620a0263801?fit=crop&h=720
