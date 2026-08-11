# Rappels sur PHP

L. Delafontaine, avec l'aide de
[GitHub Copilot](https://github.com/features/copilot).

Ce travail est sous licence [CC BY-SA 4.0][licence].

> [!TIP]
>
> Voici quelques informations relatives à ce contenu.
>
> **Ressources annexes**
>
> - Autres formats :
>   [Presentation (web)](https://heig-vd-progserv-course.github.io/heig-vd-progserv2-course/01-contenus-du-cours/02-rappels-sur-php/presentation.html)
>   ·
>   [Presentation (PDF)](https://heig-vd-progserv-course.github.io/heig-vd-progserv2-course/01-contenus-du-cours/02-rappels-sur-php/02-rappels-sur-php-presentation.pdf)
> - Exemples de code : [Code source](./01-exemples-de-code/README.md).
> - Exercices : [Énoncés et solutions](./02-exercices/README.md).
>
> **Objectifs**
>
> - Rappeler les concepts de base de PHP.
>
> **Méthodes d'enseignement et d'apprentissage**
>
> Les méthodes d'enseignement et d'apprentissage utilisées pour animer le cours
> sont les suivantes :
>
> - Présentation.
> - Discussions collectives.
> - Travail en autonomie.
>
> **Méthodes d'évaluation**
>
> L'évaluation prend la forme d'exercices à réaliser en autonomie en classe ou à
> la maison.
>
> L'évaluation se fait en utilisant les critères suivants :
>
> - Capacité à s'approprier des exemples de code.
> - Capacité à appliquer les exemples de code à des situations similaires.
> - Capacité à répondre avec justesse.
> - Capacité à argumenter.
>
> Les retours se font de la manière suivante :
>
> - Corrigé des exercices.
>
> L'évaluation ne donne pas lieu à une note.

## Table des matières

- [Table des matières](#table-des-matières)
- [Objectifs](#objectifs)
- [Architecture client-serveur](#architecture-client-serveur)
- [Variables](#variables)
- [Constantes](#constantes)
- [Opérateurs](#opérateurs)
- [Structures conditionnelles](#structures-conditionnelles)
- [Fonctions](#fonctions)
  - [Fonctions sans paramètres](#fonctions-sans-paramètres)
  - [Fonctions avec paramètres](#fonctions-avec-paramètres)
  - [Fonctions avec des paramètres par défaut](#fonctions-avec-des-paramètres-par-défaut)
  - [Fonctions avec typage des paramètres et du retour](#fonctions-avec-typage-des-paramètres-et-du-retour)
- [Importation de fichiers](#importation-de-fichiers)
  - [Fonctions prédéfinies](#fonctions-prédéfinies)
- [Tableaux et boucles](#tableaux-et-boucles)
  - [Tableaux](#tableaux)
  - [Boucles](#boucles)
- [Formulaires HTML, validation et sécurité](#formulaires-html-validation-et-sécurité)
- [Conclusion](#conclusion)
- [Exemples de code](#exemples-de-code)
- [À faire pour la semaine suivante](#à-faire-pour-la-semaine-suivante)

## Objectifs

Le but de ce contenu est de rappeler les concepts de base de PHP, afin de de se
remettre à niveau pour la suite du cours.

La liste complète des objectifs est disponible dans la section _"Objectifs"_ du
bloc d'information en haut de ce contenu.

> [!TIP]
>
> Des difficultés à comprendre certains concepts de PHP présentés dans ce
> support de cours ? Consultez les supports de cours pour le cours Programmation
> serveur 1 (ProgServ1) pour vous aider :
> <https://github.com/heig-vd-progserv-course/heig-vd-progserv1-course/tree/main>.
>
> N'hésitez pas à poser des questions si besoin !

## Architecture client-serveur

PHP repose sur une architecture client-serveur. Le client (navigateur web)
envoie des requêtes au serveur, qui traite ces requêtes et renvoie des réponses.
Cette architecture permet de séparer la logique de présentation (côté client) de
la logique de traitement (côté serveur).

![Architecture client-serveur](https://github.com/heig-vd-progserv-course/heig-vd-progserv1-course/raw/main/01-modalites-de-lunite-denseignement-et-introduction-a-php/01-theorie/images/architecture-client-serveur-avec-php.png)

## Variables

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

## Constantes

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

## Opérateurs

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

## Structures conditionnelles

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

## Fonctions

Les fonctions permettent de structurer le code en blocs réutilisables. Elles
facilitent la réutilisation du code.

Une fonction peut être définie par l'utilisateur ou être une fonction intégrée à
PHP.

Une fonction est définie à l'aide du mot-clé `function`, suivi du nom de la
fonction et de ses (potentiels) paramètres.

### Fonctions sans paramètres

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

### Fonctions avec paramètres

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

### Fonctions avec des paramètres par défaut

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

### Fonctions avec typage des paramètres et du retour

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

## Importation de fichiers

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
require_once "functions.php"; // On inclut le fichier

// La fonction `greet()` est définie dans le fichier importé
// et peut être utilisée ici
$greetings = greet("Alice");
echo $greetings; // "Hello, Alice!"
```

Il existe plusieurs façons d'importer des fichiers en PHP :

- `include_once '<file>.php';` : Inclut et évalue le fichier spécifié. Si le
  fichier n'est pas trouvé, une alerte est émise, mais le reste du code est
  exécuté. Ce n'est pas recommandé.
- `require_once '<file>.php';` : Inclut et évalue le fichier spécifié. Si le
  fichier n'est pas trouvé, une erreur fatale est émise et le reste du code
  n'est pas exécuté. C'est la méthode recommandée.

### Fonctions prédéfinies

PHP offre de nombreuses fonctions prédéfinies pour effectuer des tâches
courantes. Voici quelques exemples :

- `strlen($string)` : retourne la longueur d'une chaîne de caractères.
- `array_merge($array1, $array2)` : fusionne deux tableaux.
- `count($array)` : retourne le nombre d'éléments dans un tableau.

La liste complète des fonctions prédéfinies est disponible dans la documentation
officielle de PHP : <https://www.php.net/manual/fr/funcref.php>.

## Tableaux et boucles

### Tableaux

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

### Boucles

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

## Formulaires HTML, validation et sécurité

Les formulaires HTML permettent de collecter des données auprès des
utilisateurs. En PHP, les données des formulaires sont accessibles via les
superglobales `$_POST` et `$_GET`, selon la méthode utilisée pour soumettre le
formulaire.

Il est crucial de valider et de traiter correctement les données reçues des
formulaires pour éviter des vulnérabilités telles que les injections SQL ou les
attaques XSS (Cross-Site Scripting).

Nous y reviendrons plus en détail dans une future séance.

## Conclusion

Dans ce séance, nous avons exploré les concepts fondamentaux de la programmation
en PHP.

Nous avons couvert les bases du langage PHP, y compris les variables, les types
de données, les structures de contrôle, les fonctions, et l'importation de
fichiers.

## Exemples de code

Nous vous invitons maintenant à consulter les exemples de code de la séance afin
de mieux comprendre les concepts abordés.

Vous trouverez les exemples de code ici :
[Exemples de code](./01-exemples-de-code/README.md).

## À faire pour la semaine suivante

Chaque personne est libre de gérer son temps comme elle le souhaite. Cependant,
il est recommandé pour la séance suivante de :

- Relire les supports de cours si nécessaire.
- Finaliser l'appropriation des exemples de code qui n'ont pas été vus en
  classe.

[licence]:
	https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/LICENSE.md
