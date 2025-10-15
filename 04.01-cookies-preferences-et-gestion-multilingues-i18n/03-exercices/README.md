# Cookies, préférences, et gestion multilingues (i18n) - Exercices

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

Réalisez une application web PHP qui permet à une personne de choisir sa couleur
préférée (par exemple, rouge, vert, bleu) et de stocker cette préférence dans un
cookie.

Si la personne n'a pas encore choisi de couleur, affichez un formulaire lui
permettant de sélectionner sa couleur préférée.

Une fois la couleur choisie et le formulaire soumis, stockez la couleur dans un
cookie avec une validité de 30 jours et redirigez la personne vers la même page.

La page, détectant la couleur préférée, affichera un message du type _"Votre
couleur préférée est : [couleur choisie]"_. Le style de la page utilisera cette
couleur comme couleur de fond.

Le formulaire n'est donc plus affiché mais un bouton _"Supprimer la préférence"_
devrait être proposé. Si la personne clique sur ce bouton, le cookie devrait
être supprimé et la page devrait revenir à son état initial (avec le formulaire
pour choisir une couleur).

#### Astuces

- Utilisez les outils de développement de votre navigateur pour inspecter les
  cookies et vérifier qu'ils sont bien créés, modifiés et supprimés comme
  attendu.
- Utilisez le champ `color` de HTML5 pour permettre à l'utilisateur de choisir
  une couleur facilement. Documentation :
  <https://developer.mozilla.org/fr/docs/Web/HTML/Reference/Elements/input/color>.
- Pour définir la couleur de fond de la page, vous pouvez utiliser la propriété
  CSS `background-color`. Documentation :
  <https://developer.mozilla.org/fr/docs/Web/CSS/background-color>.
- Pour supprimer la préférence, définissez un formulaire avec un bouton qui
  soumet une requête POST. Dans le code PHP, vérifiez si ce formulaire a été
  soumis et que le cookie existe, si c'est le cas, supprimez le cookie en le
  définissant avec une date d'expiration passée. Redirigez ensuite l'utilisateur
  vers la même page pour actualiser l'affichage et ainsi revenir à l'état
  initial.

#### Solution

Une solution possible est disponible dans le dossier
[`solution-exercice-01`](./solution-exercice-01/)

[licence]:
	https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/LICENSE.md
