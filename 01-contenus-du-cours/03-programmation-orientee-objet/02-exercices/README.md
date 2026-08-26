# Programmation orientée objet - Exercices

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
  - [Exercice 1a](#exercice-1a)
  - [Exercice 1b](#exercice-1b)
  - [Exercice 2a](#exercice-2a)
  - [Exercice 2b](#exercice-2b)
  - [Exercice 3](#exercice-3)
  - [Exercice 4](#exercice-4)

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

### Exercice 1a

#### Consignes

Réalisez une classe `Person` avec PHP qui représente une personne avec les
attributs `firstName`, `lastName`, `age` et `email`. Implémentez les méthodes
suivantes :

- `__construct(string $firstName, string $lastName, int $age, string $email)` :
  constructeur pour initialiser les attributs.
- Tous les setters et getters pour les attributs `firstName`, `lastName`, `age`
  et `email`.
- `getFullName()` : retourne le nom complet de la personne (prénom + nom).
- `isAdult()` : retourne `true` si la personne est majeure (18 ans ou plus),
  `false` sinon.
- `getEmailDomain()` : retourne le domaine de l'email (par exemple, pour
  `jane.doe@example.com`, retourne `example.com`). Vous pouvez utiliser la
  fonction [`explode`](https://www.php.net/manual/fr/function.explode.php) de
  PHP pour séparer l'email par le caractère `@` et retourner la deuxième partie.
  Si l'email n'est pas valide, retournez une chaîne vide.

Contraintes :

- Utilisez la visibilité `private` pour les attributs.
- Utilisez la visibilité `public` pour les méthodes.
- Toutes les méthodes doivent avoir des types de retour et des types de
  paramètres appropriés.

#### Solution

Une solution possible est disponible dans le dossier
[`solution-exercice-01a`](./solution-exercice-01a/)

### Exercice 1b

#### Consignes

En utilisant la classe `Person` créée dans l'exercice précédent, instantiez deux
objets `Person` avec les données suivantes :

- Personne 1 :
  - Prénom : `Jane`
  - Nom : `Doe`
  - Âge : `25`
  - Email : `jane.doe@example.com`
- Personne 2 :
  - Prénom : `John`
  - Nom : `Smith`
  - Âge : `17`
  - Email : `john.smith`

Ensuite, effectuez les opérations suivantes :

- Affichez le nom complet de chaque personne en utilisant la méthode
  `getFullName()`.
- Vérifiez si chaque personne est majeure en utilisant la méthode `isAdult()`.
- Affichez le e-mail de chaque personne en utilisant la méthode `getEmail()`.
- Affichez le domaine de l'email de chaque personne en utilisant la méthode
  `getEmailDomain()`. Pour la personne avec un email invalide, affichez un
  message indiquant que l'email est invalide.

#### Solution

Une solution possible est disponible dans le dossier
[`solution-exercice-01b`](./solution-exercice-01b/)

### Exercice 2a

#### Consignes

Réalisez une classe `Vehicle` avec PHP qui représente un véhicule avec les
attributs `numberOfWheels`, `color`, `brand` et `model`.

Implémentez les méthodes suivantes :

- `__construct($numberOfWheels, $color, $brand, $model)` : constructeur pour
  initialiser les attributs.
- Tous les setters et getters pour les attributs `numberOfWheels`, `color`,
  `brand` et `model`.
- `getDescription()` : retourne une description du véhicule sous la forme
  `"Brand Model, Color, Number of wheels"`. Par exemple, pour un véhicule de
  marque `Toyota`, modèle `Corolla`, couleur `Red` et 4 roues, la méthode
  retourne `"Toyota Corolla, Red, 4 wheels"`.
- `type()` : retourne le type de véhicule en fonction du nombre de roues :
  - Si le nombre de roues est 2, retourne `"Motorcycle"`.
  - Si le nombre de roues est 4, retourne `"Car"`.
  - Si le nombre de roues est supérieur à 4, retourne `"Truck"`.
  - Sinon, retourne `"Unknown"`.

Contraintes :

- Utilisez la visibilité `private` pour les attributs.
- Utilisez la visibilité `public` pour les méthodes.
- Utilisez une ou des constantes pour définir les marques de véhicules (par
  exemple, `TOYOTA`, `YAMAHA`, etc.) et/ou les types de véhicule si vous le
  souhaitez. **Astuce** : vous pouvez utiliser la syntaxe `self::` pour accéder
  aux constantes de la classe depuis l'intérieur de la classe, notamment dans la
  méthode `type()`.

#### Solution

Une solution possible est disponible dans le dossier
[`solution-exercice-02a`](./solution-exercice-02a/)

### Exercice 2b

#### Consignes

En utilisant la classe `Vehicle` créée dans l'exercice précédent, instantiez
deux objets `Vehicle` avec les données suivantes :

- Véhicule 1 :
  - Nombre de roues : `4`
  - Couleur : `Red`
  - Marque : `Toyota`
  - Modèle : `Corolla`
- Véhicule 2 :
  - Nombre de roues : `2`
  - Couleur : `Black`
  - Marque : `Yamaha`
  - Modèle : `MT-07`
- Véhicule 3 :
  - Nombre de roues : `6`
  - Couleur : `Blue`
  - Marque : `Volvo`
  - Modèle : `FH16`
- Véhicule 4 :
  - Nombre de roues : `0`
  - Couleur : `Green`
  - Marque : `UFO`
  - Modèle : `X-2000`

Ensuite, effectuez les opérations suivantes :

- Affichez la description de chaque véhicule en utilisant la méthode
  `getDescription()`.
- Affichez le type de chaque véhicule en utilisant la méthode `type()`.

#### Solution

Une solution possible est disponible dans le dossier
[`solution-exercice-02b`](./solution-exercice-02b/)

### Exercice 3

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
[`solution-exercice-03`](./solution-exercice-01/)

### Exercice 4

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
[`solution-exercice-04`](./solution-exercice-02/).

[licence]:
	https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/LICENSE.md
