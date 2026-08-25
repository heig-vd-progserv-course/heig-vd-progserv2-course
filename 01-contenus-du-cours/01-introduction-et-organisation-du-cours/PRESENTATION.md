---
marp: true
---

<!--
theme: custom-marp-theme
size: 16:9
paginate: true
author: L. Delafontaine, avec l'aide de GitHub Copilot
title: HEIG-VD ProgServ2 Course - Introduction et organisation du cours
description: Introduction et organisation du cours pour le cours ProgServ2 enseigné à la HEIG-VD, Suisse
url: https://heig-vd-progserv-course.github.io/heig-vd-progserv2-course/01-contenus-du-cours/01-introduction-et-organisation-du-cours/presentation.html
header: "[**Introduction et organisation du cours**](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/01-contenus-du-cours/01-introduction-et-organisation-du-cours/README.md)"
footer: '[**HEIG-VD**](https://heig-vd.ch) - [ProgServ2 2025-2026](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course) - [CC BY-SA 4.0](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/LICENSE.md)'
headingDivider: 6
math: mathjax
-->

# Introduction et organisation du cours

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

## Bienvenue au cours Programmation serveur 2 (ProgServ2) !

<!-- _class: lead -->

## Qui suis-je

<div class="one-third-two-thirds-columns">
<div class="center">

**Ludovic  
Delafontaine**

<img src="https://avatars.githubusercontent.com/u/5037444?v=4" alt="Ludovic Delafontaine" width="200" class="rounded">

[Mail](mailto:ludovic.delafontaine@heig-vd.ch) ·
[GitHub](https://github.com/ludelafo) ·
[LinkedIn](https://www.linkedin.com/in/ludelafo/)

</div>
<div>

<small>

**Parcours**

- 2011-2015 : CFC en informatique @ ETML.
- 2015-2019 : BSc en informatique @ HEIG-VD.
- 2020-2024 : Collaborateur Ra&D @ HEIG-VD.
- 2023-2026 : Artios + Enseignement @ HEIG-VD.

**Enseignement**

- [DAI](https://github.com/heig-vd-dai-course/heig-vd-dai-course) &
  [MVP](https://github.com/heig-vd-mvp-course/heig-vd-mvp-course) @ TIC.
- [ProgServ1](https://github.com/heig-vd-progserv-course/heig-vd-progserv1-course),
  [ProgServ2](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course)
  &
  [DévProdMéd](https://github.com/heig-vd-devprodmed-course/heig-vd-devprodmed-course)
  @ COMEM.

</small>

</div>
</div>

## Mes objectifs et souhaits pour ProgServ2

[Programmation serveur 1 (ProgServ1)](https://github.com/heig-vd-progserv-course/heig-vd-progserv1-course)
vous a donné de bonnes bases en PHP pour développer une application web simple
(CRUD).

Mon objectif maintenant est de vous permettre d'appliquer ce que vous avez
appris jusqu'ici dans un contexte pratique et d'apporter les dernières briques
pour une application PHP complète.

Comme toujours, si quelque chose ne convient pas dans ma façon d'enseigner,
n'hésitez pas à me le dire. Je suis ouvert à toutes critiques pour améliorer mon
enseignement.

## Comment me contacter

Selon vos préférences, vous pouvez utiliser l'un des canaux suivants pour toutes
questions relatives au cours :

- En personne, durant les sessions de cours ou en dehors.
- Par e-mail
  ([ludovic.delafontaine@heig-vd.ch](mailto:ludovic.delafontaine@heig-vd.ch)).
- Microsoft Teams :
  - Dans le canal Teams du cours (de préférence - n'hésitez pas à vous entraider
    si je ne suis pas disponible).
  - Message privé sur Teams (à éviter si possible).

## Retrouvez le contenu complet de cette présentation sur GitHub

<!-- _class: lead -->

_Cette présentation est un résumé du contenu complet disponible sur GitHub._

_Pour plus de détails, retrouvez le contenu complet [ici][contenu-complet] ou en
cliquant sur l'en-tête de ce document._

## Objectifs

- Lister les objectifs du cours.
- Lister les modalités d'organisation du cours.
- Lister les modalités d'évaluation.

![bg right:40%][illustration-objectifs]

## Objectifs du cours (1/2)

À la fin de ce cours, vous devriez être capable de :

> - Structurer un code serveur avec les concepts de la programmation orientée
>   objet.
> - Mettre en place les principes de session/cookie pour gérer une
>   authentification simple.
> - Mettre en place les principes de sécurité pour protéger une application web
>   contre les attaques les plus courantes.
> - Réutiliser des parties d'interface pour simplifier le développement d'une
>   application web.

## Objectifs du cours (2/2)

> - Implémenter une application web multilingue.
> - Déployer une application web avec une base de données dédiée.
> - Envoyer des e-mails depuis une application web.

---

<!-- _class: lead -->

> Grâce à ces compétences, la personne qui étudie sera en mesure de développer
> des applications web combinant plusieurs aspects avec une gestion des accès
> aux pages publiques et privées (par exemple, un gestionnaire de tâches
> multi-utilisateurs, une plateforme de réservations de concerts, etc.).

## Modalités d'organisation du cours

- En présentiel chaque semaine dans cette même salle.
- Déroulement en quatre phases pour un meilleur apprentissage :
  - Moment de théorie court pour expliquer les concepts.
  - Exemples de code à explorer.
  - Exercices à faire en classe ou à la maison.
  - Projet libre à avancer en classe et à la maison.
  - Espace de discussion pour poser des questions et obtenir de l'aide (**il n'y
    a pas de questions bêtes !**, je suis payé pour ça).

### Exemples de code

- Exemples de code pour illustrer les concepts.
- Exemples à étudier et à prendre en main.
- Exemples à réutiliser dans les exercices et le projet.
- But : renforcer la lecture et la compréhension de code de façon autonome.

![bg right:40%][illustration-exemples-de-code]

### Exercices

- Permet d'exercer les concepts vus en cours, autant théoriques que pratiques.

![bg right:40%][illustration-exercices]

## Modalités d'évaluation

Le cours sera évaluée à l'aide des éléments suivants :

- Un projet libre par groupe de deux (2) à trois (3) étudiant.es à réaliser tout
  au long du cours.
- Une évaluation intermédiaire écrite.

![bg right:40%][illustration-modalites-devaluation]

### Projet libre

- Par groupe de deux (2) à trois (3) étudiant.es.
- Projet libre avec un cahier des charges à définir.
- Réunions régulières pour faire le point sur l'avancement.
- Grille d'évaluation disponible à l'avance.
- 50% de la note finale du cours.

![bg right:40%][illustration-projet]

### Évaluation intermédiaire

- Évaluation sur toutes les connaissances et compétences acquises tout au long
  du cours.
- Durée d'environ 90 minutes.
- Papier et crayon.
- **Aucune aide autorisée.**
- 50% de la note finale du cours.

![bg right:40%][illustration-modalites-devaluation]

## Besoin de rafraîchissement ?

Le cours ProgServ2 s'appuie sur les connaissances acquises en
[ProgServ1](https://github.com/heig-vd-progserv-course/heig-vd-progserv1-course).

J'essaie de faire mon possible pour rappeler les concepts clés de ProgServ1
avant de rentrer dans les concepts propres à ProgServ2.

Néanmoins, si vous avez besoin d'un rafraîchissement plus approfondi, je vous
invite à (re)voir les supports de cours de
[ProgServ1](https://github.com/heig-vd-progserv-course/heig-vd-progserv1-course).

## La programmation et l'anglais

Le domaine de la programmation est très largement anglophone. La majorité des
ressources que vous trouverez dans votre carrière sont en anglais.

Dans le but de vous préparer à cette réalité, les exemples de code que nous
utiliserons dans les cours seront en anglais (commentaires en français par
contre).

Le reste du cours restera néanmoins en français. Si l'anglais est une barrière
pour vous, n'hésitez pas à me le faire savoir.

## _"Qu'en est-il de ChatGPT, etc. ?"_

<!-- _class: lead -->

## _"Qu'en est-il de ChatGPT, etc. ?"_ (1)

**Vous pouvez utiliser tous les outils que vous souhaitez** (notes personnelles,
Internet, outils d'IA, etc.), **sauf pendant les évaluations** (sauf mention
contraire). Vous pouvez les utiliser dans la vie réelle ; il serait utopique de
ma part de vous en priver.

Cependant, d'après mon expérience, **ces outils ne sont pas suffisamment
fiables** pour être utilisés sans supervision. **Ils peuvent vous aider, mais
ils ne remplacent pas vos propres connaissances et compétences**.

## _"Qu'en est-il de ChatGPT, etc. ?"_ (2)

Concentrez-vous sur la compréhension des concepts et des principes qui
sous-tendent les tâches sur lesquelles vous travaillez.

Une fois que vous maîtrisez les concepts, vous pouvez utiliser ces outils pour
vous aider dans la mise en œuvre.

Au risque d'utiliser une analogie un peu vieillotte : apprenez à calculer avant
de vouloir utiliser une calculatrice.

Une excellente vidéo sur le sujet :
[_"La Fabrique à Idiots"_ - Micode](https://www.youtube.com/watch?v=4xq6bVbS-Pw).

## _"Qu'en est-il de ChatGPT, etc. ?"_ (3)

Quelques règles concernant l'utilisation de ces outils pour vos rendus :

- Vous **devez indiquer quand, pourquoi et comment vous avez utilisé une aide
  externe** (la raison, outils, sources, etc.), **soit dans le code, soit dans
  un rapport annexe**.
- Vous **devez expliquer le fonctionnement du code que vous avez utilisé**, que
  ce soit du code généré par des outils d'intelligence artificielle ou du code
  copié depuis des sources externes, **et comment il s'intègre dans votre
  travail**.

## _"Qu'en est-il de ChatGPT, etc. ?"_ (4)

- En cas de doutes de notre part, vous pourriez être questionné.e.
- **Si vos explications ne sont pas convaincantes, injustifiées dans le contexte
  ou si vous n'êtes pas transparent.e sur l'utilisation de ces outils**, je
  considère que vous n'avez pas acquis les compétences nécessaires du cours.
  **Vous serez alors pénalisé.e avec la note 1 pour l'évaluation concernée**.
- En cas de doutes, n'hésitez pas à me contacter pour discuter de votre
  utilisation de ces outils.

<center>

**Votre intégrité personnelle et académique est en jeu**.

</center>

## _Qu'en est-il de ChatGPT, etc. ?"_ (5)

**Tout le monde va utiliser l'AI lorsque vous sortirez de vos études.**

**C'est justement grâce à un esprit critique et une bonne compréhension des
concepts** que vous saurez utiliser efficacement les outils à disposition (AI ou
autre) et **que vous pourrez vous démarquer des autres**.

À titre personnel, je pense qu'une personne issue du monde de l'ingénierie ne
fait bien son travail que si elle le remet en question.

---

<!--
_header: ""
_footer: ""
_paginate: false
-->

<div class="thumbnail">

[_"La Fabrique à Idiots"_ - Micode, 15.01.2026](https://www.youtube.com/watch?v=4xq6bVbS-Pw)

![bg](./images/la-fabrique-a-idiots-micode.jpg)

</div>

## Bibliographie et ressources utilisées

- <https://www.php.net/manual/index.php>
- <https://developer.mozilla.org>
- <https://phptherightway.com/>
- <https://www.w3schools.com/php/>
- <https://github.com/ziadoz/awesome-php>

![bg right:40%][illustration-bibliographie-et-ressources]

## Questions

<!-- _class: lead -->

Est-ce que vous avez des questions ?

## Sources

- [Illustration principale][illustration-principale] par
  [Richard Jacobs](https://unsplash.com/@rj2747) sur
  [Unsplash](https://unsplash.com/photos/grayscale-photo-of-elephants-drinking-water-8oenpCXktqQ)
- [Illustration][illustration-objectifs] par
  [Aline de Nadai](https://unsplash.com/@alinedenadai) sur
  [Unsplash](https://unsplash.com/photos/low-angle-view-of-ball-shoots-in-the-ring-j6brni7fpvs)
- [Illustration][illustration-modalites-devaluation] par
  [Nguyen Dang Hoang Nhu](https://unsplash.com/@nguyendhn) sur
  [Unsplash](https://unsplash.com/photos/person-writing-on-white-paper-qDgTQOYk6B8)
- [Illustration][illustration-projet] par
  [Samantha Fortney](https://unsplash.com/@goldencoastgrams) sur
  [Unsplash](https://unsplash.com/photos/man-in-green-and-black-plaid-long-sleeve-shirt-holding-red-and-black-cordless-hand-drill-OGDyzpsTjyA)
- [Illustration][illustration-bibliographie-et-ressources] par
  [Tim van Cleef](https://unsplash.com/@_timvancleef) sur
  [Unsplash](https://unsplash.com/photos/wooden-ladder-by-bookshelves-1JBOZwuW7sI)
- [Illustration][illustration-exemples-de-code] par
  [Alec Favale](https://unsplash.com/@alecfavale) sur
  [Unsplash](https://unsplash.com/photos/man-wearing-gray-polo-shirt-beside-dry-erase-board-3V8xo5Gbusk)
- [Illustration][illustration-exercices] par
  [Samuel Girven](https://unsplash.com/@samuelgirven) sur
  [Unsplash](https://unsplash.com/photos/dumbbells-on-floor-VJ2s0c20qCo)
- [Illustration][illustration-a-vous-de-jouer] par
  [Nikita Kachanovsky](https://unsplash.com/@nkachanovskyyy) sur
  [Unsplash](https://unsplash.com/photos/white-sony-ps4-dualshock-controller-over-persons-palm-FJFPuE1MAOM)

<!-- URLs -->

[contenu-complet]:
	https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/tree/main/01-contenus-du-cours/01-introduction-et-organisation-du-cours/README.md
[license]:
	https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/LICENSE.md

<!-- Illustrations -->

[illustration-principale]:
	https://images.unsplash.com/photo-1517486430290-35657bdcef51?fit=crop&h=720
[illustration-objectifs]:
	https://images.unsplash.com/photo-1516389573391-5620a0263801?fit=crop&h=720
[illustration-modalites-devaluation]:
	https://images.unsplash.com/photo-1606326608606-aa0b62935f2b?fit=crop&h=720
[illustration-projet]:
	https://images.unsplash.com/photo-1608613304810-2d4dd52511a2?fit=crop&h=720
[illustration-bibliographie-et-ressources]:
	https://images.unsplash.com/photo-1554906493-4812e307243d?fit=crop&h=720
[illustration-exemples-de-code]:
	https://images.unsplash.com/photo-1532619675605-1ede6c2ed2b0?fit=crop&h=720
[illustration-exercices]:
	https://images.unsplash.com/photo-1576678927484-cc907957088c?fit=crop&h=720
[illustration-a-vous-de-jouer]:
	https://images.unsplash.com/photo-1509198397868-475647b2a1e5?fit=crop&h=720
