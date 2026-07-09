# Sessions, authentification, et autorisation - Exercices

L. Delafontaine, avec l'aide de
[GitHub Copilot](https://github.com/features/copilot).

Ce travail est sous licence [CC BY-SA 4.0][licence].

> [!TIP]
>
> Toutes les informations relatives à ce contenu sont décrites dans le
> [contenu principal](../README.md).

## Table des matières

- [Table des matières](#table-des-matières)
- [Exercices](#exercices)
  - [Exercice 1](#exercice-1)

## Exercices

> [!NOTE]
>
> Bien que ces exercices puissent paraître simples et que leur solution est
> disponible dans ce même document, il est fortement recommandé de les réaliser
> sans consulter les solutions au préalable.
>
> Ils ont pour but de vous former et de pratiquer les concepts vus dans le
> contenu de cours.
>
> Il est donc important de les faire par vous-même avant de vérifier vos
> réponses avec les solutions fournies.

### Exercice 1

Réalisez une application web PHP simple de gestion de livres (uniquement la
partie authentification et autorisation) avec les fonctionnalités suivantes :

> [!TIP]
>
> **Astuce** : repartez de l'exemple de code disponible dans les exemples de
> code pour la gestion des sessions, de l'authentification et de l'autorisation.

- Accéder à une page publique accessible à toutes les personnes (page
  d'accueil).
- Accéder à une page pour se créer un compte avec une adresse mail et un mot de
  passe et un rôle auteur.trice ou lecteur.trice (`author` ou `reader`).
- Accéder à une page pour se connecter avec son adresse mail et son mot de
  passe.
- Accéder à une page privée accessible uniquement aux personnes connectées. La
  page devra afficher un message de bienvenue avec l'adresse mail de la personne
  et son rôle.
- Accéder à une page privée accessible uniquement aux personnes auteur.trice (=
  avec le rôle `author`).
- Se déconnecter.

Utilisez les sessions PHP pour gérer l'état de connexion des personnes.
Assurez-vous de stocker les mots de passe de manière sécurisée (en hachant le
mot de passe).

#### Solution

Une solution possible est disponible dans le dossier
[`solution-exercice-01`](./solution-exercice-01/)

[licence]:
	https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/LICENSE.md
