# Gestion et envoi des e-mails - Exercices

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

Réalisez un formulaire de contact en PHP avec la librairie
[PHPMailer](https://github.com/PHPMailer/PHPMailer) qui permet aux personnes
d'envoyer un e-mail pour vous contacter.

> [!IMPORTANT]
>
> Le support de cours explique comment installer et configurer PHPMailer pour
> envoyer des e-mails via SMTP avec un environnement de développement (avec
> Mailpit) et un environnement de production (avec Infomaniak).
>
> Référez-vous au support de cours pour l'installation et la configuration de
> PHPMailer.

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
