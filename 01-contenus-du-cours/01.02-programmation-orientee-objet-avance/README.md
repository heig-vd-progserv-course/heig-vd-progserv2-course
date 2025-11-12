# Programmation orientée objet (avancé)

L. Delafontaine, avec l'aide de
[GitHub Copilot](https://github.com/features/copilot).

Ce travail est sous licence [CC BY-SA 4.0][licence].

## Ressources

### Ressources annexes

- Autres formes du support de cours :
  [Presentation (web)](https://heig-vd-progserv-course.github.io/heig-vd-progserv2-course/01-contenus-du-cours/01.02-programmation-orientee-objet-avance/index.html)
  ·
  [Presentation (PDF)](https://heig-vd-progserv-course.github.io/heig-vd-progserv2-course/01-contenus-du-cours/01.02-programmation-orientee-objet-avance/01.02-programmation-orientee-objet-avance-presentation.pdf)
- Exemples de code : [Lien vers le contenu](./01-exemples-de-code/README.md)
- Exercices : [Lien vers le contenu](./02-exercices/README.md)

### Méthodes d'enseignement et d'apprentissage

Les méthodes d'enseignement et d'apprentissage utilisées pour animer le cours
sont les suivantes :

- Présentation magistrale.
- Discussions collectives.
- Travail en autonomie.

### Méthodes d'évaluation

L'évaluation prend la forme d'exercices à réaliser en autonomie en classe ou à
la maison.

L'évaluation se fait en utilisant les critères suivants :

- Capacité à s'approprier des exemples de code.
- Capacité à appliquer les exemples de code à des situations similaires.
- Capacité à répondre avec justesse.
- Capacité à argumenter.

Les retours se font de la manière suivante :

- Corrigé des exercices.

L'évaluation ne donne pas lieu à une note.

## Table des matières

- [Ressources](#ressources)
  - [Ressources annexes](#ressources-annexes)
  - [Méthodes d'enseignement et d'apprentissage](#méthodes-denseignement-et-dapprentissage)
  - [Méthodes d'évaluation](#méthodes-dévaluation)
- [Table des matières](#table-des-matières)
- [Objectifs](#objectifs)
- [PHP, un rappel](#php-un-rappel)
  - [Architecture client-serveur](#architecture-client-serveur)
  - [Variables](#variables)
  - [Constantes](#constantes)
  - [Opérateurs](#opérateurs)
  - [Structures conditionnelles](#structures-conditionnelles)
  - [Fonctions](#fonctions)
  - [Importation de fichiers](#importation-de-fichiers)
  - [Tableaux et boucles](#tableaux-et-boucles)
  - [Formulaires HTML, validation et sécurité](#formulaires-html-validation-et-sécurité)
- [Programmation orientée objet (base)](#programmation-orientée-objet-base)
- [Programmation orientée objet (avancé)](#programmation-orientée-objet-avancé-1)
  - [Interfaces](#interfaces)
  - [Héritage](#héritage)
  - [Abstraction](#abstraction)
  - [Inclusion des fichiers et classes](#inclusion-des-fichiers-et-classes)
  - [Espaces de noms (namespaces)](#espaces-de-noms-namespaces)
  - [Limites de l'héritage et de l'abstraction](#limites-de-lhéritage-et-de-labstraction)
- [Conclusion](#conclusion)
- [Exemples de code](#exemples-de-code)
- [Exercices](#exercices)
- [À faire pour la semaine suivante](#à-faire-pour-la-semaine-suivante)

## Objectifs

- Rappeler les concepts de base de la programmation orientée objet.
- Appliquer les notions d'interface, d'héritage et d'abstraction avec la
  programmation orientée objet.

## PHP, un rappel

> [!TIP]
>
> Des difficultés à comprendre certains concepts de PHP présentés dans ce
> support de cours ? Consultez les supports de cours pour l'unité d'enseignement
> Programmation serveur 1 (ProgServ1) pour vous aider :
> <https://github.com/heig-vd-progserv-course/heig-vd-progserv1-course/tree/main>.
>
> N'hésitez pas à poser des questions si besoin !

### Architecture client-serveur

PHP repose sur une architecture client-serveur. Le client (navigateur web)
envoie des requêtes au serveur, qui traite ces requêtes et renvoie des réponses.
Cette architecture permet de séparer la logique de présentation (côté client) de
la logique de traitement (côté serveur).

![Architecture client-serveur](https://github.com/heig-vd-progserv-course/heig-vd-progserv1-course/raw/main/01-modalites-de-lunite-denseignement-et-introduction-a-php/01-theorie/images/architecture-client-serveur-avec-php.png)

### Variables

PHP est un langage à typage dynamique, ce qui signifie que les types de
variables sont déterminés automatiquement au moment de l'exécution. Voici les
types de base en PHP :

```php
<?php
$variable = "Hello";                        // string
$variable = 42;                             // int
$variable = 3.14;                           // float
$variable = true;                           // bool
$variable = [true, 2, "3", 4 => [5, 6, 7]]; // array contenant des types mixtes
$variable = null;                           // null
```

### Constantes

Les constantes sont des valeurs qui ne peuvent pas être modifiées une fois
définies. Elles sont définies à l'aide de la fonction `define()` ou du mot-clé
`const`.

```php
<?php
define("PI", 3.14159); // Définition d'une constante
const EULER = 2.71828; // Définition d'une constante
```

Les constantes sont généralement écrites en majuscules par convention et peuvent
être utilisées partout dans le code :

```php
echo PI;    // Affiche 3.14159
echo EULER; // Affiche 2.71828
```

Les variables nécessitent le signe `$` pour être utilisées, tandis que les
constantes n'utilise pas ce signe lors de leur utilisation.

Si nous essayons de modifier une constante, une erreur sera générée :

```php
EULER = 3.14; // Erreur : syntax error, unexpected token "=" (Expression is not writable)
```

### Opérateurs

Les opérateurs permettent de réaliser des opérations sur des variables et des
valeurs ou encore comparer des valeurs.

Voici quelques opérateurs courants en PHP :

- Opérateurs arithmétiques : `+`, `-`, `*`, `/`, `%`
- Opérateurs de comparaison : `==`, `===`, `!=`, `!==`, `<`, `>`, `<=`, `>=`
- Opérateurs logiques : `&&`, `||`, `!`
- Opérateurs d'affectation : `=`, `+=`, `-=`, `*=`, `/=`, `.=`
- Opérateurs de concaténation : `.`

La liste complète des opérateurs est disponible dans la documentation officielle
de PHP : <https://www.php.net/manual/fr/language.operators.php>.

Un exemple d'utilisation des opérateurs :

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

L'opérateur `=` est utilisé pour l'affectation, tandis que `==` et `===` sont
utilisés pour la comparaison. Notez que `===` vérifie à la fois la valeur et le
type, tandis que `==` ne vérifie que la valeur.

Préférez toujours `===` et `!==` pour éviter des comportements inattendus dus à
la conversion de type automatique.

### Structures conditionnelles

PHP propose plusieurs structures de contrôle pour gérer les flux de données et
les conditions à l'aide de `if`, `elseif`, `else` et `switch` et des opérateurs
logiques (`&&`, `||`, `!`).

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

Il est aussi possible de réunir plusieurs conditions dans une seule instruction
ou encore d'utiliser `default` pour gérer les cas non prévus.

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
    case "Saturday":
    case "Sunday":
        echo "It's the weekend!";
        break;
    default:
        echo "Invalid day!";
        break;
}
```

### Fonctions

Les fonctions permettent de structurer le code en blocs réutilisables. Elles
facilitent la réutilisation du code.

Une fonction peut être définie par l'utilisateur ou être une fonction intégrée à
PHP.

Une fonction est définie à l'aide du mot-clé `function`, suivi du nom de la
fonction et de ses (potentiels) paramètres.

#### Fonctions sans paramètres

```php
<?php
function greet() {
    return "Hello, World!";
}
```

Ici, la fonction `greet` ne prend pas de paramètres et retourne une chaîne de
caractères que nous pouvons utiliser comme suit :

```php
$greetings = greet();   // Affecte (= donne la valeur) "Hello, World!" à `$greetings`
echo $greetings;        // Affiche "Hello, World!"
```

#### Fonctions avec paramètres

Des paramètres peuvent être passés à une fonction pour lui fournir des
informations supplémentaires.

Les paramètres sont définis entre les parenthèses lors de la déclaration de la
fonction et ne sont disponibles que dans le corps de la fonction (entre les
accolades (`{}`)).

```php
<?php
function greet($name) {
    return "Hello, " . $name . "!";
}
```

Les paramètres sont passés lors de l'appel de la fonction, dans le même ordre
que lors de la déclaration.

```php
$greetings = greet("Alice");
echo $greetings . "<br>";       // "Hello, Alice!"
echo greet("Bob") . "<br>";     // "Hello, Bob!"
```

#### Fonctions avec des paramètres par défaut

Les paramètres par défaut permettent de spécifier une valeur par défaut pour un
paramètre d'une fonction. Si l'argument correspondant n'est pas fourni lors de
l'appel de la fonction, la valeur par défaut est utilisée.

```php
<?php
function greet($name = "World") {
    return "Hello, " . $name . "!";
}
```

```php
echo greet() . "<br>";          // "Hello, World!" (utilise la valeur par défaut)
echo greet("Alice") . "<br>";   // "Hello, Alice!" (utilise l'argument fourni)
```

#### Fonctions avec typage des paramètres et du retour

Depuis sa version 7.1, PHP permet de spécifier les types des paramètres et du
retour d'une fonction.

Cela permet de garantir que les arguments passés à la fonction et la valeur
retournée sont du type attendu, ce qui peut aider à prévenir les erreurs.

```php
<?php
function greet(string $name = "World"): string {
    return "Hello, " . $name . "!";
}

function add(int $a, int $b): int {
    return $a + $b;
}
```

Grâce au typage, les appels suivants sont valides :

```php
echo greet() . "<br>";          // "Hello, World!"
echo greet("Alice") . "<br>";   // "Hello, Alice!"
echo greet(42) . "<br>";        // "Hello, 42!" (conversion implicite)
echo add(2, 3) . "<br>";        // 5
```

Mais l'appel suivant générera une erreur de type :

```php
// Erreur 1 : Implicit conversion from float 2.5 to int loses precision
// Erreur 2 : Argument #2 ($b) must be of type int, string given
echo add(2.5, "Hello") . "<br>";
```

Les types par défaut sont `mixed`, ce qui signifie que n'importe quel type est
accepté.

La liste des types de base est la suivante :

- `int` : entier (ex. `42`, `-7`)
- `float` : nombre à virgule flottante (ex. `3.14`, `-0.001`)
- `string` : chaîne de caractères (ex. `"Hello"`, `'World'`)
- `bool` : booléen (ex. `true`, `false`)
- `array` : tableau (ex. `[1, 2, 3]`, `['a' => 'apple', 'b' => 'banana']`)
- `object` : objet (ex. `new DateTime()`, `new User()`)

Il existe d'autres types plus avancés, comme `callable`, `iterable`, `void`,
`self`, tous disponibles dans la documentation officielle de PHP :
<https://www.php.net/manual/fr/language.types.declarations.php>.

### Importation de fichiers

L'importation de fichiers permet de réutiliser du code défini dans d'autres
fichiers. Cela favorise la modularité et la maintenabilité du code.

```php
<?php
// Fichier `functions.php`
function greet(string $name = "World"): string {
    return "Hello, " . $name . "!";
}
```

```php
<?php
// Fichier `index.php`
require "functions.php"; // On inclut le fichier

// La fonction `greet()` est définie dans le fichier importé
// et peut être utilisée ici
$greetings = greet("Alice");
echo $greetings; // "Hello, Alice!"
```

Il existe plusieurs façons d'importer des fichiers en PHP :

- `include '<file>.php';` : Inclut et évalue le fichier spécifié. Si le fichier
  n'est pas trouvé, une alerte est émise, mais le reste du code est exécuté. Ce
  n'est pas recommandé.
- `require '<file>.php';` : Inclut et évalue le fichier spécifié. Si le fichier
  n'est pas trouvé, une erreur fatale est émise et le reste du code n'est pas
  exécuté. C'est la méthode recommandée.

#### Fonctions prédéfinies

PHP offre de nombreuses fonctions prédéfinies pour effectuer des tâches
courantes. Voici quelques exemples :

- `strlen($string)` : retourne la longueur d'une chaîne de caractères.
- `array_merge($array1, $array2)` : fusionne deux tableaux.
- `count($array)` : retourne le nombre d'éléments dans un tableau.

La liste complète des fonctions prédéfinies est disponible dans la documentation
officielle de PHP : <https://www.php.net/manual/fr/funcref.php>.

### Tableaux et boucles

#### Tableaux

Les tableaux (arrays) sont des structures de données qui permettent de stocker
plusieurs valeurs dans une seule variable. En PHP, les tableaux peuvent être
indexés numériquement ou associativement (avec des clés personnalisées).

```php
<?php
// Tableau indexé numériquement
$fruits = [
    'apple',
    'banana',
    'orange'
];

echo $fruits[0] . "<br>"; // "apple"

// Tableau associatif
$person = [
    'name' => 'Alice',
    'age' => 30,
    'city' => 'New York'
];

echo $person['name'] . "<br>"; // "Alice"
```

#### Boucles

Les boucles permettent de répéter un bloc de code tant qu'une condition est
vraie.

Les boucles les plus courantes sont `for`, `while`, `do-while` et `foreach`.

```php
<?php
// Affiche les nombres de 0 à 9
for ($i = 0; $i < 10; $i++) {
    echo "$i<br>";
}
```

```php
<?php
$i = 0;

// Affiche les nombres de 0 à 9
while ($i < 10) {
    echo "$i<br>";
    $i++;
}
```

```php
<?php
$randomNumber = null;

do {
    // La fonction `rand()` génère un nombre aléatoire entre 1 et 10
    $randomNumber = rand(1, 10);
    echo "The random number is $randomNumber<br>";
} while ($randomNumber < 8);
```

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

// `$user` contient la valeur de l'élément du tableau
foreach ($users as $user) {
    echo "Name: {$user['name']}<br>";
    echo "Age: {$user['age']}<br>";
    echo "City: {$user['city']}<br>";
    echo "<br>";
}
```

### Formulaires HTML, validation et sécurité

Les formulaires HTML permettent de collecter des données auprès des
utilisateurs. En PHP, les données des formulaires sont accessibles via les
superglobales `$_POST` et `$_GET`, selon la méthode utilisée pour soumettre le
formulaire.

Il est crucial de valider et de traiter correctement les données reçues des
formulaires pour éviter des vulnérabilités telles que les injections SQL ou les
attaques XSS (Cross-Site Scripting).

Nous y reviendrons plus en détail dans un futur cours.

## Programmation orientée objet (base)

La programmation orientée objet (POO) est un paradigme de programmation qui
utilise des "objets" pour représenter des données et des comportements.

La programmation orientée objet permet de structurer le code de manière plus
modulaire et réutilisable.

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

Les attributs (propriétés) sont des variables qui stockent l'état de l'objet,
tandis que les méthodes sont des fonctions qui définissent le comportement de
l'objet.

Grâce aux dernières versions de PHP, il est possible de typer les attributs
d'une classe de la même manière que pour les paramètres et le retour des
fonctions.

Les attributs et les méthodes peuvent avoir différents niveaux de visibilité :
`public`, `protected` et `private`. Il est recommandé d'utiliser `protected` ou
`private` pour les attributs afin de favoriser l'encapsulation.

Grâce à l'encapsulation, les attributs d'une classe ne sont pas accessibles
directement depuis l'extérieur de la classe. On utilise des méthodes publiques
pour accéder et modifier les attributs (communément appelées _getters_ et
_setters_).

Le constructeur est une méthode spéciale qui est appelée lors de la création
d'un objet.

Une classe est instanciée (créée) à l'aide du mot-clé `new`, ce qui crée un
nouvel objet de cette classe :

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

### Interfaces

Les interfaces définissent un contrat que les classes doivent respecter. Elles
spécifient quelles méthodes une classe doit implémenter sans définir leur
implémentation.

Considérons une interface `AnimalInterface` qui définit les méthodes que toutes
les classes d'animaux doivent implémenter.

```php
<?php
interface AnimalInterface {
    public function makeSound(): string;
    public function getHabitat(): string;
}
```

Cette interface déclare deux méthodes : `makeSound` et `getHabitat`. Toutes les
classes qui implémentent cette interface doivent fournir une implémentation pour
ces méthodes.

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

Grâce aux interfaces, nous pouvons garantir que toutes les classes d'animaux
implémentent les mêmes méthodes, ce qui facilite le polymorphisme.

```php
$lion = new Lion();
$penguin = new Penguin();

echo $lion->makeSound();        // "Roar!"
echo $lion->getHabitat();       // "Savannah"
echo $penguin->makeSound();     // "Honk!"
echo $penguin->getHabitat();    // "Antarctica"
```

Le polymorphisme permet de traiter différents types d'objets de manière uniforme
lorsqu'ils implémentent la même interface. Ici, tous les animaux peuvent être
traités de la même manière grâce à l'interface `AnimalInterface`.

### Héritage

L'héritage permet à une classe (classe fille) d'hériter des propriétés et
méthodes d'une autre classe (classe parent), favorisant la réutilisation du
code.

A la différence des interfaces, une classe peut inclure les attributs et
méthodes d'une autre classe.

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

Ici, la classe `Plant` est une classe de base qui représente une plante avec son
nom anglais et son nom latin.

Les attributs sont `protected`, ce qui signifie qu'ils sont accessibles dans la
classe et ses sous-classes.

Si des attributs sont privés (`private`), ils ne sont pas accessibles dans les
sous-classes.

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

Ici, nous avons deux classes filles, `Basil` et `Tomato`, qui héritent de la
classe `Plant`. Elles ajoutent chacune un attribut spécifique (`variety` pour le
basilic et `color` pour la tomate) et redéfinissent le constructeur pour
initialiser ces nouveaux attributs.

Dans le constructeur des classes filles, nous appelons le constructeur de la
classe parent avec `parent::__construct(...)` pour initialiser les attributs
hérités.

```php
$plant = new Plant("Generic Plant", "Plantae");
$basil = new Basil("Basil", "Ocimum basilicum", "Sweet Basil");
$tomato = new Tomato("Tomato", "Solanum lycopersicum", "Red");

echo $plant->getEnglishName(); // "Generic Plant"
echo $plant->getLatinName();   // "Plantae"
echo $basil->getVariety();     // "Sweet Basil"
echo $tomato->getColor();      // "Red"
```

Ces classes peuvent être ensuite utilisées pour créer des objets représentant
des plantes spécifiques.

### Abstraction

Les classes abstraites permettent de définir une base commune avec des méthodes
partiellement implémentées. Elles ne peuvent pas être instanciées directement.

Nous pouvons imaginer une classe abstraite comme un mélange entre une interface
et une classe normale.

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

Ici, nous avons une classe abstraite `Shape` qui définit une propriété `color`
et une méthode concrète `getColor()`. Elle déclare également deux méthodes
abstraites `calculateArea()` et `calculatePerimeter()` que les classes filles
doivent implémenter.

Cette classe abstraite a pour but de fournir une structure commune pour toutes
les formes géométriques, tout en laissant les détails spécifiques à chaque forme
aux classes filles.

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

Ici, nous avons une première classe fille `Rectangle` qui hérite de la classe
abstraite `Shape`. Elle implémente les méthodes abstraites `calculateArea()` et
`calculatePerimeter()` pour calculer l'aire et le périmètre d'un rectangle.

Si une classe fille n'implémente pas toutes les méthodes abstraites, une erreur
fatale est générée lors de l'exécution, car elle doit respecter le contrat
défini par la classe abstraite.

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

Ici, nous avons une deuxième classe fille `Circle` qui hérite également de la
classe abstraite `Shape`. Elle implémente les méthodes abstraites pour calculer
l'aire et le périmètre d'un cercle.

Il suffit maintenant d'instancier les classes filles pour créer des objets
représentant des formes géométriques spécifiques.

```php
$rectangle = new Rectangle("blue", 10, 5);
$circle = new Circle("red", 7);

echo $rectangle->getShapeInfo();
// Shape: Rectangle, Color: blue, Area: 50.00, Perimeter: 30.00

echo $circle->getShapeInfo();
// Shape: Circle, Color: red, Area: 153.94, Perimeter: 43.98
```

Il n'est pas possible d'instancier directement la classe abstraite `Shape` :

```php
$shape = new Shape("green"); // Erreur fatale : Cannot instantiate abstract class Shape
```

La classe abstraite `Shape` sert uniquement de modèle pour les classes filles.

### Inclusion des fichiers et classes

En PHP, il est courant d'organiser le code en plusieurs fichiers pour améliorer
la lisibilité et la maintenabilité. Chaque classe peut être définie dans son
propre fichier, et ces fichiers peuvent être inclus dans d'autres fichiers selon
les besoins.

#### Inclusion manuelle

Pour inclure des fichiers en PHP, nous pouvons utiliser les fonctions `include`
et `require`.

Si nous prenons le diagramme de classes suivant :

![Exemple de diagramme de classes](./images/animal-hierarchy-example.png)

Nous avons plusieurs classes abstraites et concrètes représentant différents
animaux. Chaque classe peut être définie dans son propre fichier.

Le fichier `Animal.php` pourrait contenir la classe abstraite `Animal` :

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

Le fichier `Pet.php` pourrait contenir la classe abstraite `Pet` qui hérite de
`Animal` :

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

Le fichier `Dog.php` pourrait contenir la classe concrète `Dog` qui hérite de la
classe abstraite `Pet` :

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

Le fichier `Cat.php` pourrait contenir la classe concrète `Cat` qui hérite de la
classe abstraite `Pet` :

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

Puis finalement, le fichier `index.php` pourrait être le point d'entrée de notre
application, où nous incluons les fichiers nécessaires et créons des objets :

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

Avec le code actuel, nous sommes confronté à un problème d'import.

En effet, PHP va exécuter le fichier `index.php` et va rencontrer la ligne
`require 'Dog.php';`. PHP va alors inclure le fichier `Dog.php`.

Le fichier `Dog.php` importe lui-même le fichier `Pet.php` avec la ligne
`require 'Pet.php';`.

Le fichier `Pet.php` importe lui-même le fichier `Animal.php` avec la ligne
`require 'Animal.php';`.

Jusqu'ici, tout va bien.

Le même processus se produit pour la ligne `require 'Cat.php';` dans le fichier
`index.php`, qui inclut `Cat.php`, mais ce fichier contient lui-même une ligne
`require 'Pet.php';`.

Hors, le fichier `Pet.php` a déjà été inclus une première fois, donc PHP va
générer une erreur fatale :

```text
Fatal error: Cannot declare class Pet, because the name is already in use in /path/to/Pet.php on line 4
```

Pour éviter ce problème, nous pouvons utiliser `require_once` au lieu de
`require`. Cela garantit que chaque fichier n'est inclus qu'une seule fois, même
s'il est référencé plusieurs fois.

Ainsi, tous les fichiers `Dog.php`, `Cat.php` et `Pet.php` doivent utiliser
`require_once` au lieu de `require` :

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

De cette manière, lorsque PHP inclut `Dog.php`, il inclut `Pet.php` une seule
fois (qui lui-même inclut `Animal.php` une seule fois) et lorsque `Cat.php` est
inclus, `Pet.php` n'est pas inclus à nouveau. Le problème d'import est résolu !

### Espaces de noms (namespaces)

Les namespaces permettent d'organiser le code en regroupant les classes,
fonctions et constantes sous un même espace de noms. Cela peut permettre
d'éviter les conflits de noms et d'améliorer la lisibilité du code.

En reprenant l'exemple précédent, nous pourrions définir un namespace pour
chaque groupe de classes.

```php
<?php
// src/Animals/Animal.php
namespace Animals;

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

    public function getSize(): float {
        return $this->size;
    }
}
```

```php
<?php
// src/Animals/Pets/Pet.php
namespace Animals\Pets;

require_once 'Animal.php';

use Animals\Animal;

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

```php
<?php
// src/Animals/Pets/Dog.php
namespace Animals\Pets;

require_once 'Pet.php';

use Animals\Pets\Pet;

class Dog extends Pet {
    public function __construct(string $name, float $size, string $nickname) {
        parent::__construct($name, $size, $nickname);
    }

    public function makeSound(): string {
        return "Woof!";
    }
}
```

```php
<?php
// src/Animals/Pets/Cat.php
namespace Animals\Pets;

require_once 'Pet.php';

use Animals\Pets\Pet;

class Cat extends Pet {
    public function __construct(string $name, float $size, string $nickname) {
        parent::__construct($name, $size, $nickname);
    }

    public function makeSound(): string {
        return "Meow!";
    }
}
```

Pour utiliser cette classe dans un autre fichier, nous devons importer le
namespace ou utiliser son nom complet.

```php
<?php
require_once 'src/Animals/Pets/Dog.php';
require_once 'src/Animals/Pets/Cat.php';

use Animals\Pets\Dog;
use Animals\Pets\Cat;

$dog = new Dog("Nalia", 30.5, "Naliouille");
$cat = new Cat("Tofu", 10.0, "Sushi");

echo $dog->getName() . " says: " . $dog->makeSound() . "<br>";
echo $cat->getName() . " says: " . $cat->makeSound() . "<br>";
```

```php
<?php
require_once 'Dog.php';
require_once 'Cat.php';

$dog = new \MyApp\Animals\Pets\Dog("Nalia", 30.5, "Naliouille");
$cat = new \MyApp\Animals\Pets\Cat("Tofu", 10.0, "Sushi");

echo $dog->getName() . " says: " . $dog->makeSound() . "<br>";
echo $cat->getName() . " says: " . $cat->makeSound() . "<br>";
```

Les namespaces ne sont pas obligatoires, mais ils peuvent aider à organiser le
code pour les projets plus complexes et éviter les conflits de noms (plusieurs
classes avec le même nom dans des contextes différents).

#### Inclusion automatique (autoloader)

Gérer les imports manuellement peut devenir fastidieux dans les projets plus
complexes avec de nombreuses classes et dépendances. Pour simplifier ce
processus, PHP offre une fonctionnalité d'inclusion automatique (autoloader).

L'autoloader permet de charger automatiquement les classes lorsqu'elles sont
utilisées, sans avoir à inclure manuellement chaque fichier.

L'autoloader sera importé une seule fois par fichier, puis il s'occupera de
charger toutes les autres classes utilisées dans ce fichier de manière
automatique :

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

Ensuite, dans le fichier `index.php`, nous incluons simplement l'autoloader au
lieu d'inclure chaque fichier de classe individuellement :

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

L'autoloader va automatiquement chercher et inclure les fichiers nécessaires
lorsque les classes `Dog` et `Cat` sont instanciées. L'autoloader se chargera
d'importer qu'un seul fichier par classe, même si plusieurs classes sont
utilisées dans le même fichier.

### Limites de l'héritage et de l'abstraction

PHP ne supporte pas l'héritage multiple, c'est-à-dire qu'une classe ne peut
hériter que d'une seule classe parent. Cependant, une classe peut implémenter
plusieurs interfaces.

Il est important de noter que l'héritage et l'abstraction doivent être utilisés
avec parcimonie pour éviter une hiérarchie de classes trop complexe. Une
hiérarchie trop profonde peut rendre le code difficile à comprendre et à
maintenir.

L'exemple suivant illustre une hiérarchie de classes qui peut déjà être
considérée comme trop complexe :

![Exemple de diagramme de classes inutilement compliqué](./images/animal-hierarchy-example-over-engineered.png)

Restez simple et adaptez la structure de votre code aux besoins réels de votre
application si les besoins évoluent.

## Conclusion

Dans ce cours, nous avons exploré les concepts fondamentaux de la programmation
en PHP ainsi que les principes de la programmation orientée objet (POO).

Nous avons couvert les bases du langage PHP, y compris les variables, les types
de données, les structures de contrôle, les fonctions, et l'importation de
fichiers.

Ensuite, nous avons approfondi la POO en examinant les classes, les objets,
l'héritage, les interfaces, l'abstraction, et la gestion des espaces de noms.

Nous avons également abordé des pratiques avancées telles que l'inclusion
automatique des classes (autoloader) pour simplifier la gestion des dépendances
dans les projets plus complexes.

La POO est un paradigme puissant qui permet de structurer le code de manière
modulaire et réutilisable, mais il est essentiel de l'utiliser judicieusement
pour éviter une complexité excessive.

## Exemples de code

Nous vous invitons maintenant à consulter les exemples de code du cours afin de
vous familiariser avec les concepts abordés.

Vous trouverez les exemples de code ici :
[Exemples de code](./01-exemples-de-code/README.md).

## Exercices

Nous vous invitons ensuite à réaliser les exercices du cours afin de mettre en
pratique les concepts abordés.

Vous trouverez les exercices ici : [Exercices](./02-exercices/README.md).

## À faire pour la semaine suivante

Chaque personne est libre de gérer son temps comme elle le souhaite. Cependant,
il est recommandé pour le cours suivant de :

- Relire les supports de cours si nécessaire.
- Finaliser l'appropriation des exemples de code qui n'ont pas été vus en
  classe.
- Finaliser les exercices qui n'ont pas été terminés en classe.

[licence]:
	https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/LICENSE.md
