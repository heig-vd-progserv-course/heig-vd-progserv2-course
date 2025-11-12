---
marp: true
---

<!--
theme: custom-marp-theme
size: 16:9
paginate: true
author: L. Delafontaine, avec l'aide de GitHub Copilot
title: HEIG-VD ProgServ2 Course - Programmation orientée objet (avancé)
description: Programmation orientée objet (avancé) pour l'unité d'enseignement ProgServ2 enseigné à la HEIG-VD, Suisse
url: https://heig-vd-progserv-course.github.io/heig-vd-progserv2-course/01-contenus-du-cours/01.02-programmation-orientee-objet-avance/index.html
header: "[**Programmation orientée objet (avancé)**](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/01.02-programmation-orientee-objet-avance)"
footer: '[**HEIG-VD**](https://heig-vd.ch) - [ProgServ2 2025-2026](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course) - [CC BY-SA 4.0](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/LICENSE.md)'
headingDivider: 6
math: mathjax
-->

# Programmation orientée objet (avancé)

<!--
_class: lead
_paginate: false
-->

[Lien vers le support de cours][support-de-cours]

<small>L. Delafontaine, avec l'aide de
[GitHub Copilot](https://github.com/features/copilot).</small>

<small>Ce travail est sous licence [CC BY-SA 4.0][license].</small>

![bg opacity:0.1][illustration-principale]

## _Retrouvez plus de détails dans le support de cours_

<!-- _class: lead -->

_Cette présentation est un résumé du support de cours. Pour plus de détails,
consultez le [support de cours][support-de-cours]._

## Objectifs

- Rappeler les concepts de base de la programmation orientée objet.
- Appliquer les notions d'interface, d'héritage et d'abstraction avec la
  programmation orientée objet.

![bg right:40%][illustration-objectifs]

## PHP, un rappel

<!-- _class: lead -->

### Architecture client-serveur (1/2)

- La plupart des applications web modernes reposent sur une architecture dite
  _"client-serveur"_ :
  1. Un client (navigateur web) envoie une requête à un serveur.
  2. Le serveur répond aux requêtes des différents clients.
  3. Le client affiche le résultat de la requête.
- PHP repose sur cette même architecture.

### Architecture client-serveur (2/2)

- PHP fonctionne grâce aux outils suivants :
  - Un serveur web.
  - PHP installé sur le serveur web.
  - Un navigateur web.
  - Un éditeur de code (pour le développement).

![bg right:40% contain](https://github.com/heig-vd-progserv-course/heig-vd-progserv1-course/raw/main/01-modalites-de-lunite-denseignement-et-introduction-a-php/01-theorie/images/architecture-client-serveur-avec-php.png)

### Variables (1/2)

- PHP est un language de programmation à typage dynamique.
- Il n'y a pas besoin de déclarer le type de données d'une variable.
- Le type de données d'une variable est déterminé par la valeur qui lui est
  assignée.

![bg right:40%][illustration-variables]

### Variables (2/2)

- Une variable commence toujours par le symbole `$` en PHP.
- Une valeur lui est affectée (= donnée) avec l'opérateur `=`.
- Une variable peut changer de type en cours d'exécution.

```php
<?php
$variable = "Hello";                        // string
$variable = 42;                             // int
$variable = 3.14;                           // float
$variable = true;                           // bool
$variable = [true, 2, "3", 4 => [5, 6, 7]]; // array
$variable = null;                           // null
```

### Constantes (1/2)

- Les constantes sont des valeurs qui ne peuvent pas être modifiées.
- Les constantes sont déclarées avec le mot-clé `const` ou avec la fonction
  `define()`.
- La convention veut que les constantes soient écrites en majuscules.

![bg right:40%][illustration-constantes]

### Constantes (2/2)

```php
<?php
define("PI", 3.14159); // Définition d'une constante
const EULER = 2.71828; // Définition d'une constante

echo PI;    // Affiche 3.14159
echo EULER; // Affiche 2.71828

PI = 3.14; // Erreur : les constantes ne peuvent pas être modifiées
```

### Opérateurs (1/2)

- Permet d'effectuer des opérations sur des variables et des valeurs.
- Opérateurs arithmétiques : `+`, `-`, `*`, `/`, `%` (modulo)
- Opérateurs de comparaison : `==` (égal), `!=` (différent), `>` (supérieur),
  `<` (inférieur)
- Opérateurs logiques : `&&` (et), `||` (ou), `!` (non/inversion)

![bg right:40%][illustration-operateurs]

### Opérateurs (2/2)

```php
<?php

$a = 10;
$b = 5;
$c = 15;
$d = 15;

// L'opérateur `===` permet de vérifier la valeur et le type (à préférer).
if ($a > $b && $c === $d) {
  echo "Condition met!";
} else {
  echo "Condition not met!";
}
```

### Structures conditionnelles (1/4)

- Permettent de contrôler le flux d'exécution d'un programme.
- Utilisent les opérateurs de comparaison et logiques.
- Elles se composent de `if`, `else`, `elseif` et `switch`.

![bg right:40%][illustration-structures-conditionnelles]

### Structures conditionnelles (2/4)

```php
<?php
$age = 20;

if ($age < 18) {
    echo "You are a minor.";
} elseif ($age >= 18 && $age < 65) {
    echo "You are an adult.";
} else {
    echo "You are a senior.";
}
```

### Structures conditionnelles (3/4)

<div class="two-columns">
<div>

```php
<?php
$day = "Monday";

switch ($day) {
    case "Monday":
        echo "It's Monday!";
        break;
    case "Tuesday":
        echo "It's Tuesday!";
        break;
    case "Wednesday":
        echo "It's Wednesday!";
        break;
// ...
```

</div>
<div>

```php
// ...
    case "Thursday":
        echo "It's Thursday!";
        break;
    case "Friday":
        echo "It's Friday!";
        break;
    case "Saturday":
        echo "It's Saturday!";
        break;
    case "Sunday":
        echo "It's Sunday!";
        break;
}
```

</div>
</div>

### Structures conditionnelles (4/4)

<div class="two-columns">
<div>

```php
<?php
$day = "Monday";

switch ($day) {
    case "Monday":
    case "Tuesday":
    case "Wednesday":
    case "Thursday":
    case "Friday":
        echo "It's a weekday!";
        break;
// ...
```

</div>
<div>

```php
// ...
    case "Saturday":
    case "Sunday":
        echo "It's the weekend!";
        break;
    default:
        echo "Invalid day!";
        break;
}
```

</div>
</div>

### Fonctions

- Ensemble d'instructions pour effectuer une tâche spécifique
- Inspirée des fonctions mathématiques :
  - $f(x) = x^2$
  - où $x$ est un paramètre
  - $f(2) = 4$, $f(3) = 9$, etc.
- Permettent de structurer le code en blocs réutilisables.

![bg right:40%][illustration-fonctions]

#### Fonctions sans paramètres

```php
<?php
function greet() {
    return "Hello, World!";
}

// 1. Exécute la fonction `greet()`
// 2. Récupère la valeur de retour
// 3. Affecte (= donne) cette valeur à la variable `$greetings`
$greetings = greet();

// Affiche le résultat ("Hello, World!")
echo $greetings;
```

#### Fonctions avec paramètres

```php
<?php
function greet($name) {
    return "Hello, " . $name . "!";
}

$greetings = greet("Alice");
echo $greetings . "<br>";       // "Hello, Alice!"
echo greet("Bob") . "<br>";     // "Hello, Bob!"
```

#### Fonctions avec des paramètres par défaut

```php
<?php
function greet($name = "World") {
    return "Hello, " . $name . "!";
}

echo greet() . "<br>";          // "Hello, World!" (utilise la valeur par défaut)
echo greet("Alice") . "<br>";   // "Hello, Alice!" (utilise l'argument fourni)
```

#### Fonctions avec typage des paramètres et du retour (1/2)

- Depuis la version 7.1 de PHP, il est possible de typer les paramètres et le
  retour des fonctions.

```php
<?php
function greet(string $name = "World"): string {
    return "Hello, " . $name . "!";
}

function add(int $a, int $b): int {
    return $a + $b;
}
```

#### Fonctions avec typage des paramètres et du retour (2/2)

- Le typage permet de s'assurer que les arguments passés à une fonction sont du
  bon type.

```php
echo greet() . "<br>";          // "Hello, World!"
echo greet("Alice") . "<br>";   // "Hello, Alice!"
echo greet(42) . "<br>";        // "Hello, 42!" (conversion implicite)
echo add(2, 3) . "<br>";        // 5

// Erreur 1 : Implicit conversion from float 2.5 to int loses precision
// Erreur 2 : Argument #2 ($b) must be of type int, string given
echo add(2.5, "Hello") . "<br>";
```

### Importation de fichiers (1/2)

- L'importation permet de réutiliser du code défini dans d'autres fichiers.
- Il est recommandé d'utiliser `require` (erreur et arrête l'exécution) plutôt
  que `include` (avertissement mais continue l'exécution).

![bg right:40%][illustration-importation-de-fichiers]

### Importation de fichiers (2/2)

```php
<?php
// Fichier functions.php
function greet(string $name = "World"): string {
    return "Hello, " . $name . "!";
}
```

```php
<?php
// Fichier index.php
require "functions.php";

echo greet("Alice"); // "Hello, Alice!"
```

### Tableaux et boucles

<!-- _class: lead -->

#### Tableaux (1/2)

- Les tableaux sont des collections de valeurs.
- Les tableaux sont déclarés entre des crochets (`[]`) ou avec la fonction
  `array()`.
- Les valeurs peuvent être de n'importe quel type.
- Il existe trois types de tableaux en PHP : indexés, associatifs et
  multidimensionnels.

![bg right:40%][illustration-tableaux]

#### Tableaux (2/2)

```php
<?php
// Tableau indexé numériquement
$fruits = ['apple', 'banana', 'orange'];

echo $fruits[0] . "<br>"; // "apple"

// Tableau associatif
$person = [
    'name' => 'Alice',
    'age' => 30,
    'city' => 'New York'
];

echo $person['name'] . "<br>"; // "Alice"
```

#### Boucles (1/5)

- Les boucles sont des structures de contrôle qui permettent d'exécuter un bloc
  de code plusieurs fois.
- Elles sont utilisées pour parcourir des tableaux ou des collections de
  données.
- Il existe plusieurs types de boucles en PHP : `for`, `while`, `do...while` et
  `foreach`.

![bg right:40%][illustration-boucles]

#### Boucles (2/5)

```php
<?php
// Affiche les nombres de 0 à 9
for ($i = 0; $i < 10; $i++) {
    echo "$i<br>";
}
```

#### Boucles (3/5)

```php
<?php
$i = 0;

// Affiche les nombres de 0 à 9
while ($i < 10) {
    echo "$i<br>";
    $i++;
}
```

#### Boucles (4/5)

```php
<?php
$randomNumber = null;

do {
    // La fonction `rand()` génère un nombre aléatoire entre 1 et 10
    $randomNumber = rand(1, 10);
    echo "The random number is $randomNumber<br>";
} while ($randomNumber < 8);
```

#### Boucles (5/5)

```php
<?php
$users = [
    'john' => [
        'name' => 'John Doe',
        'age' => 30,
        'city' => 'New York',
    ],
    'jane' => [
        'name' => 'Jane Doe',
        'age' => 25,
        'city' => 'Los Angeles',
    ],
];
```

---

```php
// `$user` contient la valeur de l'élément du tableau
foreach ($users as $user) {
    echo "Name: {$user['name']}<br>";
    echo "Age: {$user['age']}<br>";
    echo "City: {$user['city']}<br>";
    echo "<br>";
}
```

### Formulaires HTML, validation et sécurité

- Les formulaires HTML permettent de collecter des données.
- Les données des formulaires sont stockées dans les superglobales `$_POST` et
  `$_GET`.
- Il est nécessaire de traiter et valider les données pour éviter des
  vulnérabilités.

![bg right:40%][illustration-formulaires-html-validation-et-securite]

## Programmation orientée objet (base) (1/2)

- Paradigme de programmation qui utilise des "objets" pour modéliser des
  concepts du monde réel.
- Une classe est un modèle pour créer des objets. Un objet est une instance (=
  un exemplaire) d'une classe.

![bg right:40%][illustration-programation-orientee-objet-base]

## Programmation orientée objet (base) (2/2)

```php
<?php
class User {
    // Propriétés (attributs)
    private string $firstName;
    private string $lastName;

    // Constructeur
    public function __construct(string $firstName, string $lastName) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }
```

---

```php
    // Méthodes
    public function getFirstName(): string {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void {
        $this->firstName = $firstName;
    }

    public function getLastName(): string {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void {
        $this->lastName = $lastName;
    }

    public function getFullName(): string {
        return "{$this->firstName} {$this->lastName}";
    }
}
```

---

```php
// Création d'objets (instanciation)
$user1 = new User("Alice", "Smith");
$user2 = new User("Bob", "Johnson");

// Utilisation des méthodes
echo $user1->getFirstName() . "<br>";   // "Alice"
echo $user2->getFullName() . "<br>";    // "Bob Johnson"
$user2->setLastName("Doe");             // Modifie le nom de famille de Bob
echo $user2->getFullName() . "<br>";    // "Bob Doe"
```

## Programmation orientée objet (avancé)

<!-- _class: lead -->

### Interfaces (1/2)

- Les interfaces définissent un contrat que les classes doivent respecter.
- Chaque classe qui implémente une interface doit définir toutes les méthodes
  déclarées dans l'interface.
- Cela permet de garantir que certaines méthodes sont toujours présentes dans
  les classes qui implémentent l'interface.

### Interfaces (2/2)

```php
<?php
interface AnimalInterface {
    public function makeSound(): string;
    public function getHabitat(): string;
}
```

---

```php
class Lion implements AnimalInterface {
    public function makeSound(): string {
        return "Roar!";
    }

    public function getHabitat(): string {
        return "Savannah";
    }
}

class Penguin implements AnimalInterface {
    public function makeSound(): string {
        return "Honk!";
    }

    public function getHabitat(): string {
        return "Antarctica";
    }
}
```

---

```php
$lion = new Lion();
$penguin = new Penguin();

echo $lion->makeSound();        // "Roar!"
echo $lion->getHabitat();       // "Savannah"
echo $penguin->makeSound();     // "Honk!"
echo $penguin->getHabitat();    // "Antarctica"
```

### Héritage (1/2)

- L'héritage permet à une classe fille d'hériter des propriétés et méthodes
  d'une classe parent.
- Cela favorise la réutilisation du code et la création de hiérarchies de
  classes.

### Héritage (2/2)

```php
<?php
class Plant {
    protected string $englishName;
    protected string $latinName;

    public function __construct(string $englishName, string $latinName) {
        $this->englishName = $englishName;
        $this->latinName = $latinName;
    }

    public function getEnglishName(): string {
        return $this->englishName;
    }

    public function getLatinName(): int {
        return $this->latinName;
    }
}
```

---

```php
class Basil extends Plant {
    private string $variety;

    public function __construct(string $englishName, string $latinName, string $variety) {
        parent::__construct($englishName, $latinName);
        $this->variety = $variety;
    }

    public function getVariety(): string {
        return $this->variety;
    }
}
```

---

```php
class Tomato extends Plant {
    private string $color;

    public function __construct(string $englishName, string $latinName, string $color) {
        parent::__construct($englishName, $latinName);
        $this->color = $color;
    }

    public function getColor(): string {
        return $this->color;
    }
}
```

---

```php
$plant = new Plant("Generic Plant", "Plantae");
$basil = new Basil("Basil", "Ocimum basilicum", "Sweet Basil");
$tomato = new Tomato("Tomato", "Solanum lycopersicum", "Red");

echo $plant->getEnglishName(); // "Generic Plant"
echo $plant->getLatinName();   // "Plantae"
echo $basil->getVariety();     // "Sweet Basil"
echo $tomato->getColor();      // "Red"
```

### Abstraction (1/2)

- Les classes abstraites définissent une base commune avec des méthodes
  partiellement implémentées.
- Une classe abstraite ne peut pas être instanciée directement.
- Les classes filles doivent implémenter les méthodes abstraites définies dans
  la classe abstraite.

### Abstraction (2/2)

```php
<?php
abstract class Shape {
    protected string $color;

    public function __construct(string $color) {
        $this->color = $color;
    }

    // Méthode concrète (implémentée)
    public function getColor(): string {
        return $this->color;
    }

    // Méthodes abstraites (doivent être implémentées par les classes filles)
    abstract public function calculateArea(): float;
    abstract public function calculatePerimeter(): float;


```

---

```php
    // Méthode concrète utilisant les méthodes abstraites
    public function getShapeInfo(): string {
        return sprintf(
            "Shape: %s, Color: %s, Area: %.2f, Perimeter: %.2f",
            static::class,
            $this->color,
            $this->calculateArea(),
            $this->calculatePerimeter()
        );
    }
}
```

---

```php
class Rectangle extends Shape {
    private float $width;
    private float $height;

    public function __construct(string $color, float $width, float $height) {
        parent::__construct($color);
        $this->width = $width;
        $this->height = $height;
    }

    public function calculateArea(): float {
        return $this->width * $this->height;
    }

    public function calculatePerimeter(): float {
        return 2 * ($this->width + $this->height);
    }
}
```

---

```php
class Circle extends Shape {
    private float $radius;

    public function __construct(string $color, float $radius) {
        parent::__construct($color);
        $this->radius = $radius;
    }

    public function calculateArea(): float {
        return pi() * pow($this->radius, 2);
    }

    public function calculatePerimeter(): float {
        return 2 * pi() * $this->radius;
    }
}
```

---

```php
$rectangle = new Rectangle("blue", 10, 5);
$circle = new Circle("red", 7);

echo $rectangle->getShapeInfo();
// Shape: Rectangle, Color: blue, Area: 50.00, Perimeter: 30.00

echo $circle->getShapeInfo();
// Shape: Circle, Color: red, Area: 153.94, Perimeter: 43.98
```

```php
$shape = new Shape("green"); // Erreur fatale : Cannot instantiate abstract class Shape
```

### Inclusion des fichiers et classes

- Pour organiser le code, chaque classe peut être définie dans son propre
  fichier.
- Il est important de gérer correctement l'inclusion des fichiers pour éviter
  les erreurs.

#### Inclusion manuelle

- L'inclusion manuelle consiste à inclure chaque fichier de classe
  individuellement avec `require` ou `include`.
- Cela peut devenir fastidieux dans les projets avec de nombreuses classes.
- Il est préférable d'utiliser `require_once` ou `include_once` pour éviter les
  inclusions multiples.
- Illustrons les problèmes potentiels avec un exemple simple.

---

![bg h:85%](./_images/animal-hierarchy-example.png)

---

```php
<?php
// Animal.php
abstract class Animal {
    protected string $name;
    protected float $size;

    public function __construct(string $name, float $size) {
        $this->name = $name;
        $this->size = $size;
    }

    abstract public function makeSound(): string;

    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function getSize(): float {
        return $this->size;
    }

    public function setSize(float $size): void {
        $this->size = $size;
    }
}
```

---

```php
<?php
// Pet.php
require 'Animal.php';

abstract class Pet extends Animal {
    protected string $nickname;

    public function __construct(string $name, float $size, string $nickname) {
        parent::__construct($name, $size);
        $this->nickname = $nickname;
    }

    public function getNickname(): string {
        return $this->nickname;
    }

    public function setNickname(string $nickname): void {
        $this->nickname = $nickname;
    }
}
```

---

```php
<?php
// Dog.php
require 'Pet.php';

class Dog extends Pet {
    public function __construct(string $name, float $size, string $nickname) {
        parent::__construct($name, $size, $nickname);
    }

    public function makeSound(): string {
        return "Woof!";
    }
}
```

---

```php
<?php
// Cat.php
require 'Pet.php';

class Cat extends Pet {
    public function __construct(string $name, float $size, string $nickname) {
        parent::__construct($name, $size, $nickname);
    }

    public function makeSound(): string {
        return "Meow!";
    }
}
```

---

```php
<?php
// index.php
require 'Dog.php';
require 'Cat.php';

$dog = new Dog("Nalia", 30.5, "Naliouille");
$cat = new Cat("Tofu", 10.0, "Sushi");

echo $dog->getName() . " says: " . $dog->makeSound() . "<br>";
echo $cat->getName() . " says: " . $cat->makeSound() . "<br>";
```

---

```php
<?php
// Dog.php
require_once 'Pet.php';
...
```

```php
<?php
// Cat.php
require_once 'Pet.php';
...
```

```php
<?php
// Pet.php
require_once 'Animal.php';
...
```

### Espaces de noms (namespaces) (1/2)

- Les namespaces permettent d'organiser le code et d'éviter les conflits de noms
  dans des projets qui utilisent de nombreuses classes.
- Ils sont définis avec le mot-clé `namespace` au début d'un fichier.
- Ils permettent de grouper des classes, interfaces, fonctions et constantes
  sous un même espace de noms.

---

```php
<?php
// src/Animals/Animal.php
namespace Animals;

abstract class Animal {
    protected string $name;
    // ...
}
```

---

```php
<?php
// src/Animals/Pets/Pet.php
namespace Animals\Pets;

require_once 'Animal.php';

use Animals\Animal;

abstract class Pet extends Animal {
    protected string $nickname;
    // ...
}
```

---

```php
<?php
// src/Animals/Pets/Dog.php
namespace Animals\Pets;

require_once 'Pet.php';

use Animals\Pets\Pet;

class Dog extends Pet {
    // ...
}
```

---

```php
<?php
// src/Animals/Pets/Cat.php
namespace Animals\Pets;

require_once 'Pet.php';

use Animals\Pets\Pet;

class Cat extends Pet {
    // ...
}
```

### Inclusion automatique (autoloader) (1/2)

- L'autoloader permet de charger automatiquement les classes sans inclusions
  manuelles.
- Permet de simplifier la gestion des dépendances.
- L'autoloader sera chargé d'importer les classes au moment où elles sont
  utilisées en utilisant le namespace pour localiser le fichier.

### Inclusion automatique (autoloader) (2/2)

```php
<?php
// autoloader.php
// Charge les classes automatiquement
spl_autoload_register(function ($class) {
    // Convertit les séparateurs de namespace en séparateurs de répertoires
    $relativePath = str_replace('\\', '/', $class);

    // Construit le chemin complet du fichier
    $file = __DIR__ . '/../classes/' . $relativePath . '.php';

    // Vérifie si le fichier existe avant de l'inclure
    if (file_exists($file)) {
        // Inclut le fichier de classe
        require_once $file;
    }
});
```

---

```php
<?php
// index.php
require 'autoloader.php'; // Plus besoin d'inclure chaque fichier de classe manuellement

use Animals\Pets\Dog;
use Animals\Pets\Cat;

$dog = new Dog("Nalia", 30.5, "Naliouille");
$cat = new Cat("Tofu", 10.0, "Sushi");

echo $dog->getName() . " says: " . $dog->makeSound() . "<br>";
echo $cat->getName() . " says: " . $cat->makeSound() . "<br>";
```

### Limites de l'héritage et de l'abstraction

- PHP ne supporte pas l'héritage multiple (une classe ne peut hériter que d'une
  seule classe parent).
- Mais une classe peut implémenter plusieurs interfaces.
- Ces concepts sont à utiliser avec parcimonie pour éviter une complexité
  excessive :
  - Restez simple.
  - Évitez les hiérarchies trop profondes ou complexes.

---

![bg h:85%](./_images/animal-hierarchy-example-over-engineered.png)

## Conclusion

- PHP est un langage de programmation à typage dynamique, largement utilisé pour
  le développement web.
- La programmation orientée objet (POO) est un paradigme puissant pour
  structurer le code.
- Les concepts avancés de la POO, tels que les interfaces, l'héritage et
  l'abstraction, permettent de créer des applications modulaires et
  maintenables.
- Utilisez les namespaces et l'autoloading pour organiser et gérer vos classes
  efficacement.

## Questions

<!-- _class: lead -->

Est-ce que vous avez des questions ?

## À vous de jouer !

- (Re)lire le support de cours.
- Explorer les exemples de code.
- Faire les exercices.
- Poser des questions si nécessaire.

➡️ [Lien vers le support de cours][support-de-cours]

**N'hésitez pas à vous entraidez si vous avez des difficultés !**

![bg right:40%][illustration-a-vous-de-jouer]

## Sources (1/2)

- [Illustration principale][illustration-principale] par
  [Richard Jacobs](https://unsplash.com/@rj2747) sur
  [Unsplash](https://unsplash.com/photos/grayscale-photo-of-elephants-drinking-water-8oenpCXktqQ)
- [Illustration][illustration-objectifs] par
  [Aline de Nadai](https://unsplash.com/@alinedenadai) sur
  [Unsplash](https://unsplash.com/photos/low-angle-view-of-ball-shoots-in-the-ring-j6brni7fpvs)
- [Illustration][illustration-variables] par
  [Jan Huber](https://unsplash.com/@jan_huber) sur
  [Unsplash](https://unsplash.com/photos/yellow-and-red-light-streaks-NjV34SrbM_g)
- [Illustration][illustration-constantes] par
  [Kenny Eliason](https://unsplash.com/@neonbrand) sur
  [Unsplash](https://unsplash.com/photos/red-bricks-wall-XEsx2NVpqWY)
- [Illustration][illustration-operateurs] par
  [charlesdeluvio](https://unsplash.com/@charlesdeluvio) sur
  [Unsplash](https://unsplash.com/photos/white-calculator-on-white-table-GlavtG-umzE)
- [Illustration][illustration-structures-conditionnelles] par
  [Arham Jain](https://unsplash.com/@arham_jain48) sur
  [Unsplash](https://unsplash.com/photos/a-painting-of-blue-flowers-on-a-white-background-OkiDTYxLo34)
- [Illustration][illustration-fonctions] par
  [Birmingham Museums Trust](https://unsplash.com/@birminghammuseumstrust) sur
  [Unsplash](https://unsplash.com/photos/grayscale-photo-of-people-in-a-street-y3TC9H0261s)
- [Illustration][illustration-importation-de-fichiers] par
  [Jack Church](https://unsplash.com/@jackchurch) sur
  [Unsplash](https://unsplash.com/photos/a-sign-on-the-side-of-a-building-advertising-giving-back-LZ8NzZrByts)

## Sources (2/2)

- [Illustration][illustration-tableaux] par
  [Faris Mohammed](https://unsplash.com/@pkmfaris) sur
  [Unsplash](https://unsplash.com/photos/assorted-color-marker-pens-PQinRWK1TgU)
- [Illustration][illustration-boucles] par
  [Justin](https://unsplash.com/@heyimsolacee) sur
  [Unsplash](https://unsplash.com/photos/silhouette-of-ferris-wheel-during-sunset-6LO03psPJnE)
- [Illustration][illustration-formulaires-html-validation-et-securite] par
  [Kelly Sikkema](https://unsplash.com/@kellysikkema) sur
  [Unsplash](https://unsplash.com/photos/stack-of-papers-flat-lay-photography-tQQ4BwN_UFs)
- [Illustration][illustration-programation-orientee-objet-base] par
  [Eric Prouzet](https://unsplash.com/@eprouzet) sur
  [Unsplash](https://unsplash.com/photos/assorted-color-mugs-on-rack-5lUMTeo7-bE)
- [Illustration][illustration-a-vous-de-jouer] par
  [Nikita Kachanovsky](https://unsplash.com/@nkachanovskyyy) sur
  [Unsplash](https://unsplash.com/photos/white-sony-ps4-dualshock-controller-over-persons-palm-FJFPuE1MAOM)

<!-- URLs -->

[support-de-cours]:
	https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/tree/main/01.02-programmation-orientee-objet-avance
[license]:
	https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/LICENSE.md

<!-- Illustrations -->

[illustration-principale]:
	https://images.unsplash.com/photo-1517486430290-35657bdcef51?fit=crop&h=720
[illustration-objectifs]:
	https://images.unsplash.com/photo-1516389573391-5620a0263801?fit=crop&h=720
[illustration-variables]:
	https://images.unsplash.com/photo-1604012164853-9bb541fe0296?fit=crop&h=720
[illustration-constantes]:
	https://images.unsplash.com/photo-1495578942200-c5f5d2137def?fit=crop&h=720
[illustration-operateurs]:
	https://images.unsplash.com/photo-1587145820266-a5951ee6f620?fit=crop&h=720
[illustration-structures-conditionnelles]:
	https://images.unsplash.com/photo-1590593162201-f67611a18b87?fit=crop&h=720
[illustration-fonctions]:
	https://images.unsplash.com/photo-1583737097406-5a4b42b37b97?fit=crop&h=720
[illustration-importation-de-fichiers]:
	https://images.unsplash.com/photo-1620429405088-b41981579f19?fit=crop&h=720
[illustration-tableaux]:
	https://images.unsplash.com/photo-1561117089-3fb7c944887f?fit=crop&h=720
[illustration-boucles]:
	https://images.unsplash.com/photo-1605557254219-227294529bf0?fit=crop&h=720
[illustration-formulaires-html-validation-et-securite]:
	https://images.unsplash.com/photo-1554224155-1696413565d3?fit=crop&h=720
[illustration-programation-orientee-objet-base]:
	https://images.unsplash.com/photo-1563696629964-8c3ce077cf3e?fit=crop&h=720
[illustration-a-vous-de-jouer]:
	https://images.unsplash.com/photo-1509198397868-475647b2a1e5?fit=crop&h=720
