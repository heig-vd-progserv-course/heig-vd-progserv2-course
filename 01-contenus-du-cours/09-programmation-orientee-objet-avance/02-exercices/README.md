# Programmation orientée objet (avancé) - Exercices

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
  - [Exercice 2](#exercice-2)

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

#### Consignes

Mettre en place une hiérarchie de classes pour représenter la structure de
personnages de jeux vidéos appartenant aux classes suivantes :

- Assassin.es (`Assassins`).
- Mages (`Mages`).
- Guerrier.es (`Warriors`).

Utiliser les classes abstraites et les namespaces pour organiser le code.

La hiérarchie est la suivante :

```text
./
├── public/
│   └── index.php
├── src/
│   └── Characters/
│       ├── Assassins/
│       │   ├── AbstractAssassin.php
│       │   ├── Ninja.php
│       │   └── Spy.php
│       ├── Mages/
│       │   ├── AbstractMage.php
│       │   ├── Witch.php
│       │   └── Wizard.php
│       ├── Warriors/
│       │   ├── AbstractWarrior.php
│       │   ├── Pyrotechnician.php
│       │   └── Soldier.php
│       └── AbstractCharacter.php
└── utils/
    └── autoloader.php
```

La classe abstraite `AbstractCharacter` doit définir les propriétés et méthodes
communes à tous les personnages, telles que :

- `name` (string, protégé).
- `age` (int, protégé).
- `weapon` (string, protégé).
- `universe` (string, protégé) : l'univers fictif d'origine du personnage.
- `attack()` (méthode abstraite) : chaque sous-classe doit implémenter sa propre
  version de cette méthode.

Chaque sous-classe doit implémenter le constructeur pour initialiser les
propriétés spécifiques et la méthode `attack()` pour retourner une chaîne
décrivant l'attaque du personnage.

Voici un exemple d'utilisation attendue :

```php
<?php
require_once __DIR__ . '/../utils/autoloader.php';

use Characters\Assassins\Ninja;
use Characters\Assassins\Spy;
use Characters\Mages\Wizard;
use Characters\Mages\Witch;
use Characters\Warriors\Soldier;
use Characters\Warriors\Pyrotechnician;

$ninja = new Ninja("Ibuki", 19, "Street Fighter");
$spy = new Spy("Agent 47", 40, "Hitman");
$wizard = new Wizard("Gandalf", 100, "Lord of the Rings");
$witch = new Witch("Hermione Granger", 30, "Harry Potter");
$soldier = new Soldier("Master Chief", 45, "Halo");
$pyrotechnician = new Pyrotechnician("Jinx", 28, "Arcane");

$characters = [$ninja, $spy, $wizard, $witch, $soldier, $pyrotechnician];

foreach ($characters as $character) {
    echo $character->attack() . "<br>";
}
```

Avec la sortie attendue :

```text
Ibuki (Street Fighter) silently attacks with a katana!
Agent 47 (Hitman) silently attacks with a silenced pistol!
Gandalf (Lord of the Rings) casts a spell with a magic staff!
Hermione Granger (Harry Potter) casts a spell with a magic wand!
Master Chief (Halo) attacks with a assault rifle!
Jinx (Arcane) attacks with a fireworks!
```

#### Solution

Une solution possible est disponible dans le dossier
[`solution-exercice-01`](./solution-exercice-01/).

### Exercice 2

#### Consignes

Réaliser une hiérarchie de classes pour représenter des plantes et leurs
caractéristiques. Utiliser les traits pour partager des comportements communs
entre certaines classes de plantes.

La hiérarchie est la suivante :

```text
./
├── public/
│   └── index.php
├── src/
│   └── Plants/
│       ├── Basilic.php
│       ├── Cactus.php
│       ├── Orchid.php
│       └── Rose.php
├── traits/
│   ├── DrinkTrait.php
│   └── SmellTrait.php
└── utils/
    └── autoloader.php
```

Les traits `DrinkTrait` et `SmellTrait` doivent définir des méthodes pour
respectivement boire et sentir les plantes.

Les classes de plantes doivent utiliser les traits appropriés pour partager (ou
non) ces comportements.

Il s'agit d'un exemple un peu fictif où l'utilisation de classes abstraites
seraient peut-être plus adaptées, mais nous pouvons imaginer que certaines
plantes ont des comportements spécifiques différents qui nécessitent
l'utilisation de traits pour partager des fonctionnalités communes (ou non)
entre certaines classes de plantes :

- Seuls le basilic, l'orchidée et la rose peuvent boire de l'eau.
- Seuls le basilic et la rose peuvent sentir quelque chose.
- Le cactus ne peut ni boire ni sentir quoi que ce soit.
- L'orchidée ne sent rien, mais peut boire de l'eau.

Voici un exemple d'utilisation attendue :

```php
<?php
require_once __DIR__ . '/../utils/autoloader.php';

use Plants\Basilic;
use Plants\Cactus;
use Plants\Orchid;
use Plants\Rose;

$basilic = new Basilic();
$cactus = new Cactus();
$orchid = new Orchid();
$rose = new Rose();

echo $basilic->drink() . "<br>";
echo $basilic->smell() . "<br>";
echo $rose->drink() . "<br>";
echo $rose->smell() . "<br>";
echo $orchid->drink() . "<br>";
echo $orchid->smell() . "<br>"; // Cette ligne provoque une erreur car l'orchidée n'a pas de méthode smell()
echo $cactus->drink() . "<br>"; // Cette ligne provoque une erreur car le cactus n'a pas de méthode drink()
echo $cactus->smell() . "<br>"; // Cette ligne provoque une erreur car le cactus n'a pas de méthode smell()
```

Avec la sortie attendue :

```text
Cette plante (Basilic) boit de l'eau.
Cette plante (Basilic) sent une odeur agréable.
Cette plante (Rose) boit de l'eau.
Cette plante (Rose) sent une odeur agréable.
Cette plante (Orchidée) boit de l'eau.
```

#### Solution

Une solution possible est disponible dans le dossier
[`solution-exercice-02`](./solution-exercice-02/).

[licence]:
	https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/LICENSE.md
