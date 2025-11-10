# Gestion et envoi des e-mails - Exercices

L. Delafontaine, avec l'aide de
[GitHub Copilot](https://github.com/features/copilot).

Ce travail est sous licence [CC BY-SA 4.0][licence].

## Ressources annexes

- Objectifs, méthodes d'enseignement et d'apprentissage, et méthodes
  d'évaluation : [Lien vers le contenu](..)
- Supports de cours : [Lien vers le contenu](../01-supports-de-cours/README.md)
  ·
  [Presentation (web)](https://heig-vd-progserv-course.github.io/heig-vd-progserv2-course/06.01-gestion-et-envoi-des-e-mails/01-supports-de-cours/index.html)
  ·
  [Presentation (PDF)](https://heig-vd-progserv-course.github.io/heig-vd-progserv2-course/06.01-gestion-et-envoi-des-e-mails/01-supports-de-cours/06.01-gestion-et-envoi-des-e-mails-presentation.pdf)
- Exemples de code : [Lien vers le contenu](../02-exemples-de-code/)

## Exercices

### Exercice 1

Réalisez un formulaire de contact en PHP avec la librairie
[PHPMailer](https://github.com/PHPMailer/PHPMailer) qui permet aux personnes
d'envoyer un e-mail pour vous contacter.

Le formulaire doit contenir les champs suivants :

- Nom
- Adresse e-mail
- Sujet
- Message
- Un bouton "Envoyer"

Lorsque le formulaire est soumis, le script PHP doit valider les entrées (par
exemple, vérifier que l'adresse e-mail est valide et que les champs obligatoires
ne sont pas vides) et envoyer un e-mail à une adresse prédéfinie avec les
informations fournies dans le formulaire.

Le titre du mail envoyé à l'adresse prédéfinie doit être selon la forme suivante
:

```text
Nouveau message de contact : [Sujet]
```

où `[Sujet]` est le sujet saisi dans le formulaire.

Le corps du mail envoyé à l'adresse prédéfinie doit être selon la forme suivante
:

```text
Vous avez reçu un nouveau message de [Nom] <[Adresse e-mail]>.

Sujet : [Sujet]
Message :
[Message]
```

#### Solution

Une solution possible est disponible dans le dossier
[`solution-exercice-01`](./solution-exercice-01/)

[licence]:
	https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/LICENSE.md
