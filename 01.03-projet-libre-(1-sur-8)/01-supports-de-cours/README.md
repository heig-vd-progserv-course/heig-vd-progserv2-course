# Projet libre - Support de cours

L. Delafontaine, avec l'aide de
[GitHub Copilot](https://github.com/features/copilot).

Ce travail est sous licence [CC BY-SA 4.0][licence].

## Ressources annexes

- Objectifs, méthodes d'enseignement et d'apprentissage, et méthodes
  d'évaluation : [Lien vers le contenu](..)
- Autres formes du support de cours :
  [Presentation (web)](<https://heig-vd-progserv-course.github.io/heig-vd-progserv2-course/01.03-projet-libre-(1-sur-8)/01-supports-de-cours/index.html>)
  ·
  [Presentation (PDF)](<https://heig-vd-progserv-course.github.io/heig-vd-progserv2-course/01.03-projet-libre-(1-sur-8)/01-supports-de-cours/01.03-projet-libre-(1-sur-8)-presentation.pdf>)

## Introduction

Nous utilisons Internet pour accéder à des ressources et des services variés et
ce, de façon quotidienne.

Ces ressources et ces services nous permettent de consulter de l'information,
faire des réservations, acheter des produits, etc.

Ce projet a pour but de vous permettre de réaliser une application web avec PHP,
accessible depuis Internet, proposant un service ou une fonctionnalité aux
personnes qui visitent votre site.

Le projet est libre : c'est à vous de définir les fonctionnalités et les
services que vous souhaitez proposer. Il peut s'agir d'une application web que
vous aimeriez utiliser dans votre vie quotidienne ou d'une application web que
vous aimeriez utiliser pour vos études.

Par exemple, vous pourriez créer un site de gestion de tâches, une plateforme de
réservation d'événements, un blog personnel ou encore un site pour gérer vos
notes. Vous pouvez exprimer votre créativité ! Si vous n'avez pas d'idées, le
corps enseignant peut vous aider à en trouver une qui vous convienne.

Plusieurs groupes peuvent choisir la même idée et vous pouvez partager votre
méthodologie, vous inspirer les un.es des autres et vous entraider. Cependant,
vous n'êtes pas autorisé.es à plagier le code d'un autre groupe. Vous serez
pénalisé.es si vous le faites.

## Objectifs

- Réaliser une application web complète, incluant une interface utilisateur, une
  logique métier et une persistance des données.
- Gérer correctement l'authentification et les accès aux différentes pages.
- Déployer et accéder à l'application web depuis Internet.

## Composition des groupes

Vous travaillerez en groupes de deux (2) à trois (3) personnes. Vous pouvez
choisir votre ou vos partenaires. Si vous n'avez pas de partenaire, le corps
enseignant vous en attribuera un.e.

Pour annoncer votre groupe, remplissez le document suivant :
[[ProgServ2 2025-2026] Composition des groupes](https://docs.google.com/spreadsheets/d/1IC6aVPTo2YNmhBHygb93YnOE-ZnuPYBeLIiokFlCz8E/edit?usp=sharing).

## Validation de l'idée

Le corps enseignant peut vous demander de modifier la portée de votre projet
s'il est jugé trop complexe ou trop simple.

Cela permettra d'assurer un bon équilibre entre la complexité du projet et le
temps dont vous disposez pour le réaliser.

Si vous n'avez pas d'idée, consulter le corps enseignant et il vous aidera à en
trouver une.

Un cahier des charges sera demandé afin de valider l'idée, comportant les points
suivants :

- Les membres de l'équipe.
- Fonctionnalités principales de l'application.
- Fonctionnalités optionnelles de l'application (si le temps le permet).

En fin de projet, ce même document devra être mis à jour pour refléter les
fonctionnalités réellement implémentées et une conclusion sur le projet.

Ce document doit se limiter à quelques pages seulement.

> [!CAUTION]
>
> Ce document doit être envoyé dans les deux premières semaines du projet à
> l'adresse
> [`ludovic.delafontaine@heig-vd.ch`](mailto:ludovic.delafontaine@heig-vd.ch) au
> format PDF, comme indiqué dans la section [Contraintes](#contraintes).

## Critères d'évaluation

Une grille d'évaluation sera utilisée pour noter votre travail à l'aide de
l'échelle suivante :

- 0 point - Le travail est manquant, hors sujet ou montre une compréhension très
  limitée du sujet.
- 1 point - Le travail montre une compréhension partielle : certains éléments
  clés sont manquants, peu clairs ou mal mis en œuvre.
- 2 points - Le travail est complet, précis et montre une compréhension claire
  et approfondie du sujet.

La note de votre travail sera calculée à l'aide de la formule suivante :

$\text{Note du projet} =\frac{\text{Nombre de points obtenus}}{\text{Nombre de points totaux}} * 5 + 1$

|         # | Critère                                                                                                                                                                          | Points |
| --------: | :------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -----: |
|         1 | L'application est déployée sur Internet et est fonctionnelle.                                                                                                                    |      2 |
|         2 | La plateforme propose au moins deux pages publiques (accessibles sans connexion) et au moins quatre pages privées (accessibles après connexion).                                 |      2 |
|         3 | La plateforme est traduite dans au moins deux langues.                                                                                                                           |      2 |
|         4 | La page d'accueil permet de comprendre rapidement l'objectif de la plateforme et propose un accès aux principales fonctionnalités.                                               |      2 |
|         5 | La plateforme propose un formulaire qui permet de se créer un nouveau compte sur la plateforme.                                                                                  |      2 |
|         6 | La plateforme envoie un email de confirmation lors de la création d'un compte.                                                                                                   |      2 |
|         7 | La plateforme propose un formulaire qui permet de se connecter à la plateforme.                                                                                                  |      2 |
|         8 | Une fois la personne connectée, la plateforme maintient la session de la personne.                                                                                               |      2 |
|         9 | Une fois la personne connectée, la plateforme permet à la personne de se déconnecter.                                                                                            |      2 |
|        10 | La plateforme supporte au moins deux rôles d'utilisateur (par exemple : _utilisateur_ et _administrateur_).                                                                      |      2 |
|        11 | Seules les personnes autorisées peuvent accéder aux données ou les manipuler selon leur rôle.                                                                                    |      2 |
|        12 | La plateforme permet de gérer au moins deux domaines/types de ressources avec des relations/liens entre elles (par exemple : _articles_ et _utilisateurs_)[^multiples-domaines]. |      2 |
|        13 | La plateforme stocke les mots de passe de façon sécurisée dans la base de données.                                                                                               |      2 |
|        14 | L'application est entièrement typée.                                                                                                                                             |      2 |
|        15 | L'application utilise entièrement les principes de la programmation orientée objet et les classes sont chargées automatiquement.                                                 |      2 |
|        16 | Les informations de connexion à la base de données proviennent d'un fichier de configuration.                                                                                    |      2 |
|        17 | Les différentes attentes de chaque jalon sont respectées et le travail est réparti équitablement entre les membres de l'équipe (voir [Jalon 2](#jalon-2)).                       |      2 |
|        18 | Les différentes attentes de chaque jalon sont respectées et le travail est réparti équitablement entre les membres de l'équipe (voir [Jalon 3](#jalon-3)).                       |      2 |
|        19 | Les différentes attentes de chaque jalon sont respectées et le travail est réparti équitablement entre les membres de l'équipe (voir [Jalon 4](#jalon-4)).                       |      2 |
|        20 | Les différentes attentes de chaque jalon sont respectées et le travail est réparti équitablement entre les membres de l'équipe (voir [Jalon 5](#jalon-5)).                       |      2 |
|        21 | Les différentes attentes de chaque jalon sont respectées et le travail est réparti équitablement entre les membres de l'équipe (voir [Jalon 6](#jalon-6)).                       |      2 |
|        22 | Les différentes attentes de chaque jalon sont respectées et le travail est réparti équitablement entre les membres de l'équipe (voir [Jalon 7](#jalon-7)).                       |      2 |
| **Total** |                                                                                                                                                                                  | **44** |

## Contraintes

Le projet doit respecter les règles suivantes :

- Toute l'équipe doit contribuer au projet et tou.tes les membres doivent être
  en mesure de l'expliquer en détail si on leur demande. Dans des cas
  exceptionnels, l'appréciation peut être individuelle.
- Le projet respecte le cahier des charges initial.
- Le projet doit être terminé et remis selon les instructions indiquées dans la
  section [Soumission](#soumission).
- Le projet est réalisé en PHP, avec une base de données MySQL/MariaDB, sans
  utiliser de frameworks externes (par exemple : Laravel, Symfony, etc.).
- Le projet doit respecter les bonnes pratiques étudiées et acquises jusqu'ici
  dans le cursus de formation. Cela implique les éléments étudiés en
  [Programmation serveur 1 (ProgServ1)](https://github.com/heig-vd-progserv-course/heig-vd-progserv1-course/tree/main),
  tels que la validation côté serveur et client, le nettoyage des saisies
  utilisateur, la protection contre les attaques courantes (par exemple :
  injection SQL, XSS), rédiger du code lisible, agréable à lire et explicite,
  etc.
- Vous devez indiquer vos sources si vous avez utilisé des éléments dont vous
  n'êtes pas l'auteur.trice (code provenant d'Internet, code généré par des
  outils d'IA, etc.). Vous devez également indiquer dans votre rapport final à
  quelles fins vous avez utilisé la ou les sources/outils.
- Le plagiat entraîne la note de 1. Si plusieurs groupes sont impliqués, tous
  les groupes impliqués recevront une note de 1.

> [!CAUTION]
>
> Le non-respect de ces contraintes peut entraîner des sanctions sévères, et ce,
> **pour chaque critère non respecté**.

## Soumission

Votre travail doit être remis comme suit :

- ProgServ2-A (mardi matin) : **21.12.2025 12h00**.
- ProgServ2-B (mardi après-midi) : **21.12.2025 16h15**.

La date de rendu est à décider ensemble pour les deux classes (soit avant ou
après les vacances de Noël) à l'aide du sondage suivant :
[ProgServ2 2025-2026 - Date de rendu du projet ](https://framaforms.org/progserv2-2025-2026-date-de-rendu-du-projet-1758026007).

Un e-mail doit être envoyé à
[`ludovic.delafontaine@heig-vd.ch`](mailto:ludovic.delafontaine@heig-vd.ch)
contenant une archive ZIP ou le lien vers un dépôt Git contenant :

- Le code source de votre projet.
- Le lien vers l'URL où le projet est déployé sur Internet.
- Le rapport contenant le cahier des charges et une conclusion au format PDF,
  comme indiqué dans la section [Validation de l'idée](#validation-de-lidée).

Tou.tes les membres du groupe sont mis.es en copie du mail.

> [!CAUTION]
>
> Chaque 24h de retard (dès une (1) minute après l'heure de rendu) entraînera
> une pénalité de -1 point sur la note finale, comme indiqué dans la section
> [Contraintes](#contraintes).

## Notes et retours

Les notes seront saisies dans GAPS, puis envoyées par e-mail avec les retours.

L'évaluation utilisera exactement la même grille de notation que celle indiquée
dans le support de cours.

Chaque critère sera accompagné d'un commentaire expliquant les points obtenus,
d'un commentaire général sur votre travail et de la note finale.

Si vous avez des questions concernant l'évaluation, n'hésitez pas à contacter le
corps enseignant !

<details>
<summary>Modèle d'e-mail pour le corps enseignant</summary>

```text
[ProgServ2 202X-202Y] Retours sur le projet libre

Bonjour,

Vous trouverez en pièce jointe les retours que nous vous avons faits pour le
projet libre.

La note a été saisie dans GAPS également.

Nous restons à votre disposition pour toute question.

Cordialement,
[Le personnel enseignant]
```

</details>

## Conseils

### Restez simple

Évitez de créer des fonctionnalités ou des éléments qui ne sont pas demandés
dans le cahier des charges ou qui vont au-delà de celui-ci. Concentrez-vous sur
les besoins initiaux, partez avec une solution simple et fonctionnelle, puis
améliorez/rajoutez de nouvelles choses ensuite.

- N'essayez pas d'en faire trop.
- Concentrez-vous sur l'essentiel.
- Faites-le bien.

Ne soyez pas Numérobis du film _Astérix et Obélix : Mission Cléopâtre_ !

### Mettez en place un environnement de travail collaboratif

Utilisez des outils de gestion de projet (comme GitHub, Trello, etc.) pour
faciliter la collaboration au sein de votre équipe. Assurez-vous que chaque
membre du groupe a accès aux ressources nécessaires et comprenne bien son rôle
dans le projet.

Si vous n'êtes pas familier.e avec Git/GitHub, n'hésitez pas à consulter les
ressources suivantes ou à demander de l'aide au corps enseignant :

- <https://github.com/MediaComem/comem-archidep/tree/main>, dépôt Git de l'unité
  d'enseignement Architecture et déploiement d'application (ArchiDep), enseigné
  à la HEIG-VD dans le département COMEM+.
- <https://github.com/heig-vd-dai-course/heig-vd-dai-course/tree/main/01.03-git-github-and-markdown>,
  cours sur Git, GitHub et Markdown de l'unité d'enseignement Développement
  d'applications internet (DAI), enseigné à la HEIG-VD dans le département TIC
  (en anglais).

## Jalons

Le projet est divisé en huit (8) sessions en classe de 2 x 45 minutes.

Comme il peut parfois être difficile de savoir si nous sommes sur la bonne voie
(_"Suis-je en retard ou en avance dans mon travail ?"_), le corps enseignant a
défini les étapes suivantes pour vous aider à suivre vos progrès.

Lors de chaque cours, chacun des groupes se réunira avec le corps enseignant
pour discuter de l'avancement de son projet et des éventuels obstacles
rencontrés. Ces réunions seront l'occasion de faire le point sur l'état
d'avancement de chaque groupe et de répondre à vos questions.

La réunion se veut courte et efficace (entre 5 et 10 minutes par groupe). Elle
se déroulera de la manière suivante :

1. Tour de table - chaque membre du groupe présente brièvement :
   - L'état d'avancement de sa tâche ;
   - Les éventuels obstacles rencontrés ;
   - Ses prochaines étapes ;
   - Ses besoins éventuels en termes de soutien.
2. Réponses aux éventuels questions/besoins.

**Ces jalons font partie intégrante de l'évaluation du projet** (voir
[Critères d'évaluation](#critères-dévaluation)).

### Jalon 1

A faire avant le prochain cours :

- [x] Constitution et annonces des groupes.
- [x] Choix du projet et de ses fonctionnalités.
- [x] Élaboration initiale du cahier des charges (brouillon).

**Ce jalon ne compte pas dans l'évaluation finale.**

### Jalon 2

- Tour de table - validation du travail effectué jusqu'à présent.
- Réponses aux éventuels questions/besoins.

A faire pour le prochain cours :

- [x] Finaliser le cahier des charges.
- [x] Mettre en place son environnement de travail collaboratif.
- [x] Se répartir le travail entre les différents membres du groupe.

### Jalon 3

- Tour de table - validation du travail effectué jusqu'à présent.
- Réponses aux éventuels questions/besoins.

A faire pour le prochain cours :

- [x] Avoir mis en place une base de données pour l'application.
- [x] Avoir une version déployée de l'application sur Internet.
- [x] Avoir commencé à implémenter les pages principales de l'application.

### Jalon 4

- Tour de table - validation du travail effectué jusqu'à présent.
- Réponses aux éventuels questions/besoins.

A faire pour le prochain cours :

- [x] Mettre en place la gestion multilingue à l'aide d'un cookie.

### Jalon 5

- Tour de table - validation du travail effectué jusqu'à présent.
- Réponses aux éventuels questions/besoins.

A faire pour le prochain cours :

- [x] Avoir commencé à mettre en place le système d'authentification.

#### ProgServ2-A (mardi matin)

|   # | Groupe                   | Heure de passage |
| --: | :----------------------- | :--------------- |
|   1 | Matteo, Ella, Aïdan (4)  | 10h30            |
|   2 | Lilou, Aissya (8)        | 10h40            |
|   3 | Luka, Nabil, Mathias (5) | 10h50            |
|   4 | Léa, Grégory (9)         | 11h00            |
|   5 | Marc, Ana, Charline (7)  | 11h10            |
|   6 | Inês, Rania (3)          | 11h20            |
|   7 | Luca, Sacha, Ryad (1)    | 11h30            |
|   8 | Pierre, Raul, Romain (2) | 11h40            |
|   9 | Carla, Cindy, Steve (6)  | 11h50            |

#### ProgServ2-B (mardi après-midi)

|   # | Groupe                        | Heure de passage |
| --: | :---------------------------- | :--------------- |
|   1 | Christophe, Loic, Loriane (5) | 14h45            |
|   2 | Sarah, Sasita, Enya (1)       | 14h55            |
|   3 | Inoé, Léa, Yannis (8)         | 15h05            |
|   4 | Gabriel, Nuno, Tanguy (2)     | 15h15            |
|   5 | Chloé, Benoît, Camilo (6)     | 15h25            |
|   6 | Thierry, Lilliana (3)         | 15h35            |
|   7 | Etienne, Teicir (7)           | 15h45            |
|   8 | Dylan, Valentin (4)           | 15h55            |
|   9 | Loann, Elia, Marike (9)       | 16h05            |

### Jalon 6

- Tour de table - validation du travail effectué jusqu'à présent.
- Réponses aux éventuels questions/besoins.

A faire pour le prochain cours :

- [x] Finaliser le système d'authentification avec envoi de mails.

### Jalon 7

- Tour de table - validation du travail effectué jusqu'à présent.
- Réponses aux éventuels questions/besoins.
- S'assurer que tout le monde a bien tout ce qu'il lui faut pour finaliser le
  projet.

A faire pour le prochain cours :

- [x] Arriver gentiment au bout de l'application.
- [x] Réviser pour l'évaluation.

### Jalon 8

- Réponses aux éventuels questions/besoins.
- S'assurer que tout le monde a bien tout ce qu'il lui faut pour finaliser le
  projet.

A faire pour le rendu final :

- [x] Avoir terminé l'application.
- [x] Rendre le projet en respectant la forme du rendu final.

**Ce jalon ne compte pas dans l'évaluation finale.**

[licence]:
	https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/LICENSE.md

[^multiples-domaines]:
    Lorsque nous parlons de plusieurs domaines, nous entendons par-là que
    l'application doit aller plus loin que "juste" gérer une collection de
    données (tel que vu dans l'unité d'enseignement
    [Programmation serveur 1 (ProgServ1)](https://github.com/heig-vd-progserv-course/heig-vd-progserv1-course/tree/main))
    et doit également prendre en compte les interactions entre ces différents
    domaines (la gestion des utilisateurs, la gestion des produits, etc.).
