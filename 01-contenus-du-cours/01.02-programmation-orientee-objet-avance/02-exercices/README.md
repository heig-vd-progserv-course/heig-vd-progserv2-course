# Programmation orientée objet (avancé) - Exercices

L. Delafontaine, avec l'aide de
[GitHub Copilot](https://github.com/features/copilot).

Ce travail est sous licence [CC BY-SA 4.0][licence].

## Ressources annexes

- Support de cours : [Lien vers le contenu](..)
- Exemples de code : [Lien vers le contenu](./01-exemples-de-code/README.md)

## Exercices

### Exercice 1

#### Consignes

Créer un système simple de gestion de bibliothèque pour comprendre les bases de
la programmation orientée objet.

La structure attendue est la suivante :

```text
./
├── public/
│   └── index.php
└── src/
    ├── Book.php
    └── Library.php
```

L'utilisation attendue est la suivante :

```php
<?php
require_once __DIR__ . '/../src/Library.php';
require_once __DIR__ . '/../src/Book.php';

$library = new Library("Bibliothèque Municipale");

$book1 = new Book("1984", "George Orwell", "978-0451524935");
$book2 = new Book("Le Petit Prince", "Antoine de Saint-Exupéry", "978-2070408504");

$library->addBook($book1);
$library->addBook($book2);

$library->borrowBook("1984");
echo $library->getLibraryStats();
```

#### Partie 1

Créez une classe `Book` avec les propriétés suivantes :

- `title` (string, privé).
- `author` (string, privé).
- `isbn` (string, privé).
- `isAvailable` (bool, privé, par défaut `true`).

Implémentez les méthodes suivantes :

- Constructeur prenant le titre, l'auteur et l'ISBN.
- Getters pour toutes les propriétés.
- `borrow()` : marque le livre comme emprunté (retourne `true` si succès,
  `false` si déjà emprunté).
- `return()` : marque le livre comme disponible.
- `getInfo()` : retourne une chaîne avec les informations du livre.

#### Partie 2

Créez une classe `Library` avec les propriétés suivantes :

- `name` (string, privé).
- `books` (array, privé).

Implémentez les méthodes suivantes :

- Constructeur prenant le nom de la bibliothèque.
- `addBook(Book $book)` : ajoute un livre à la collection.
- `findBookByTitle(string $title)` : trouve un livre par son titre.
- `findBookByAuthor(string $author)` : trouve tous les livres d'un auteur.
- `borrowBook(string $title)` : emprunte un livre par son titre.
- `returnBook(string $title)` : retourne un livre par son titre.
- `getAvailableBooks()` : retourne la liste des livres disponibles.
- `getBorrowedBooks()` : retourne la liste des livres empruntés.
- `getLibraryStats()` : retourne les statistiques (nombre total, disponibles,
  empruntés).

#### Solution

Une solution possible est disponible dans le dossier
[`solution-exercice-01`](./solution-exercice-01/README.md)

### Exercice 2

#### Consignes

Créer une classe `Calculator` pour effectuer des opérations mathématiques de
base qui implémente l'interface `CalculatorInterface` suivante :

```php
<?php
interface CalculatorInterface {
    public function add(float $a, ?float $b): float;
    public function subtract(float $a, ?float $b): float;
    public function clear(): void;
}
```

Grâce aux paramètres optionnels, chaque méthode peut être appelée avec un ou
deux arguments. Si un seul argument est fourni, l'opération doit être effectuée
en utilisant le résultat de l'opération précédente (ou zéro si aucune opération
n'a été effectuée).

Cela implique que la classe `Calculator` doit maintenir un état interne pour
stocker le résultat de l'opération précédente.

Voici un exemple d'utilisation de la classe `Calculator` :

```php
<?php
require_once __DIR__ . '/../src/Calculator.php';

$calculator = new Calculator();

// Premier calcul
echo $calculator->getCurrentValue() . "<br>";   // 0

$calculator->add(7, 3);                         // 10 (7 + 3)

echo $calculator->getCurrentValue() . "<br>";   // 10

$calculator->clear();

// Deuxième calcul
$calculator->add(5);                            // 5 (0 + 5)
$calculator->add(10);                           // 15 (5 + 10)
$calculator->subtract(3);                       // 12 (15 - 3)

echo $calculator->getCurrentValue() . "<br>";   // 12

$calculator->clear();

// Troisième calcul
$calculator->subtract(10, 15);                  // -5 (10 - 15)
$calculator->add(20);                           // 15 (-5 + 20)

echo $calculator->getCurrentValue() . "<br>";   // 15

$calculator->clear();
```

#### Solution

Une solution possible est disponible dans le dossier
[`solution-exercice-02`](./solution-exercice-02/README.md).

### Exercice 3

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
└── src/
    ├── classes/
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
require_once __DIR__ . '/../src/utils/autoloader.php';

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
[`solution-exercice-03`](./solution-exercice-03/README.md).

[licence]:
	https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/LICENSE.md
