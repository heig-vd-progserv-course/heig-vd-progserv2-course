# Sessions, authentification, et autorisation - Exercices

L. Delafontaine, avec l'aide de
[GitHub Copilot](https://github.com/features/copilot).

Ce travail est sous licence [CC BY-SA 4.0][licence].

## Ressources annexes

- Objectifs, méthodes d'enseignement et d'apprentissage, et méthodes
  d'évaluation : [Lien vers le contenu](..)
- Supports de cours : [Lien vers le contenu](../01-supports-de-cours/README.md)
  ·
  [Presentation (web)](https://heig-vd-progserv-course.github.io/heig-vd-progserv2-course/03.01-deploiement/01-supports-de-cours/index.html)
  ·
  [Presentation (PDF)](https://heig-vd-progserv-course.github.io/heig-vd-progserv2-course/03.01-deploiement/01-supports-de-cours/03.01-deploiement-presentation.pdf)
- Exemples de code : [Lien vers le contenu](../02-exemples-de-code/)

## Exercices

### Exercice 1

Réalisez une application web PHP simple de gestion de livres (uniquement la
partie authentification et autorisation) avec les fonctionnalités suivantes :

- Accéder à une page publique accessible à toutes les personnes (page
  d'accueil).
- Accéder à une page pour se créer un compte avec une adresse mail et un mot de
  passe et un rôle (auteur.trice ou lecteur.trice).
- Accéder à une page pour se connecter avec son adresse mail et son mot de
  passe.
- Accéder à une page privée accessible uniquement aux personnes connectées. La
  page devra afficher un message de bienvenue avec l'adresse mail de la personne
  et son rôle.
- Accéder à une page privée accessible uniquement aux personnes avec le rôle
  "auteur.trice".
- Se déconnecter.

Utilisez les sessions PHP pour gérer l'état de connexion des personnes.
Assurez-vous de stocker les mots de passe de manière sécurisée (en hachant le
mot de passe).

#### Solution

Une solution possible est disponible dans le dossier
[`solution-exercice-01`](./solution-exercice-01/)

[licence]:
	https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/LICENSE.md
