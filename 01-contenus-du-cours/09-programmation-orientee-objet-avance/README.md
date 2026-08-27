# Programmation orientée objet (avancé)

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
>   [Presentation (web)](https://heig-vd-progserv-course.github.io/heig-vd-progserv2-course/01-contenus-du-cours/03-programmation-orientee-objet/presentation.html)
>   ·
>   [Presentation (PDF)](https://heig-vd-progserv-course.github.io/heig-vd-progserv2-course/01-contenus-du-cours/03-programmation-orientee-objet/03-programmation-orientee-objet-presentation.pdf)
> - Exemples de code : [Code source](./01-exemples-de-code/README.md).
> - Exercices : [Énoncés et solutions](./02-exercices/README.md).
>
> **Objectifs**
>
> - Inclure des fichiers à l'aide d'un autoloader et d'espaces de noms
>   (namespaces).
> - Décrire la différence entre une interface, une classe abstraite et un trait.
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
- [Espaces de noms (namespaces)](#espaces-de-noms-namespaces)
  - [Inclusion automatique (autoloader)](#inclusion-automatique-autoloader)
- [Interfaces, classes abstraites et traits](#interfaces-classes-abstraites-et-traits)
- [Conclusion](#conclusion)
- [Exemples de code](#exemples-de-code)
- [Exercices](#exercices)
- [À faire pour la semaine suivante](#à-faire-pour-la-semaine-suivante)

## Objectifs

Dans ce contenu, nous allons aborder des notions avancées de la programmation
orientée objet (POO) en PHP.

La liste complète des objectifs est disponible dans la section _"Objectifs"_ du
bloc d'information en haut de ce contenu.

## Espaces de noms (namespaces)

Un espace de noms (namespace) est un mécanisme qui permet de regrouper des
classes, des fonctions et des constantes sous un même nom. Cela permet d'éviter
les conflits de noms entre différentes parties d'un programme ou entre
différents programmes.

Vous pouvez imaginer que les namespaces sont comme des images sur Instagram que
nous étiquetons (taggeons) avec des hashtags afin de retrouver les images
communes à l'aide de leurs hashtags.

Chaque hashtag représente un namespace, et les images (classes, fonctions,
constantes) qui partagent le même hashtag sont regroupées ensemble.

En reprenant l'exemple présenté dans le contenu
[Programmation orientée objet](../03-programmation-orientee-objet/README.md),
nous pourrions définir un namespace pour chaque groupe de classes que nous
organisons de la manière suivante :

```text
./
├── public/
│   └── index.php
└── src/
    ├── Animals/
    │   └── Animal.php
    └── Pets/
        ├── Cat.php
        ├── Dog.php
        └── Pet.php
```

Le contenu des fichiers de classes pourrait ressembler à ceci :

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

Ici, nous avons défini un namespace `Animals` pour la classe `Animal`. Cela
signifie que cette classe appartient à l'espace de noms `Animals`. Pour mieux
séparer les responsabilités, nous avons également mis cette classe dans un
sous-dossier `src/Animals/`, ce qui est une bonne pratique pour organiser le
code.

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

Ici, nous avons défini un namespace `Animals\Pets` pour la classe `Pet`. Cela
signifie que cette classe appartient à l'espace de noms `Animals\Pets`. Nous
avons également mis cette classe dans un sous-dossier `src/Animals/Pets/`, ce
qui est une bonne pratique pour organiser le code.

Pour utiliser la classe `Animal` dans la classe `Pet`, nous avons utilisé
l'instruction `use Animals\Animal;` pour importer le namespace de la classe
`Animal`. Cela nous permet d'utiliser la classe `Animal` sans avoir à spécifier
son namespace complet.

De façon simplifiée, parce que nous avons étiqueté la classe `Animal` avec
l'espace de noms `Animals`, nous devons le mentionner dans la classe `Pet` avec
l'instruction `use Animals\Animal;`.

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

Même principe pour la classe `Dog`, nous avons défini un namespace
`Animals\Pets` pour la classe `Dog`. Cela signifie que cette classe appartient à
l'espace de noms `Animals\Pets`. Nous avons également mis cette classe dans un
sous-dossier `src/Animals/Pets/`, ce qui est une bonne pratique pour organiser
le code.

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

Même principe pour la classe `Cat`, nous avons défini un namespace
`Animals\Pets` pour la classe `Cat`. Cela signifie que cette classe appartient à
l'espace de noms `Animals\Pets`. Nous avons également mis cette classe dans un
sous-dossier `src/Animals/Pets/`, ce qui est une bonne pratique pour organiser
le code.

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
// public/index.php
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

### Inclusion automatique (autoloader)

Vous avez peut-être remarqué dans les exemples précédents que nous avons utilisé
l'instruction `require_once` pour inclure les fichiers de classes. Cela peut
devenir fastidieux lorsque nous avons de nombreuses classes et dépendances dans
un projet. Pour simplifier ce processus, PHP offre une fonctionnalité
d'inclusion automatique, appelé un autoloader.

L'autoloader permet de charger automatiquement les classes lorsqu'elles sont
utilisées, sans avoir à inclure manuellement chaque fichier.

L'autoloader sera importé une seule fois par fichier, puis il s'occupera de
charger toutes les autres classes utilisées dans ce fichier de manière
automatique.

Pour que cela fonctionne, nous devons suivre une convention de nommage pour les
classes et les fichiers. Par exemple, si nous avons une classe `Dog` dans le
namespace `Animals\Pets`, le fichier de classe doit être nommé `Dog.php` et se
trouver dans le dossier `src/Animals/Pets/`. De même, si nous avons une classe
`Cat` dans le namespace `Animals\Pets`, le fichier de classe doit être nommé
`Cat.php` et se trouver dans le dossier `src/Animals/Pets/`.

Illustrons cela avec un exemple d'autoloader simple. L'autoloader va
automatiquement chercher et inclure les fichiers nécessaires lorsque les classes
sont instanciées dans la structure de fichiers suivante :

```text
./
├── public/
│   └── index.php
├── src/
│   ├── Animals/
│   │   └── Animal.php
│   └── Pets/
│       ├── Cat.php
│       ├── Dog.php
│       └── Pet.php
└── utils/
    └── autoloader.php
```

Pour cela, nous devons créer un fichier `autoloader.php` qui contiendra le code
pour charger automatiquement les classes.

Voici un exemple d'autoloader simple :

```php
<?php
// Charge les classes automatiquement
spl_autoload_register(function ($class) {
    // Convertit les séparateurs de namespace en séparateurs de répertoires
    $relativePath = str_replace('\\', '/', $class);

    // Construit le chemin complet du fichier
    $file = __DIR__ . '/../src/' . $relativePath . '.php';

    // Vérifie si le fichier existe avant de l'inclure
    if (file_exists($file)) {
        // Inclut le fichier de classe
        require_once $file;
    }
});
```

Il n'est pas nécessaire de comprendre tous les détails de l'autoloader pour
l'instant. L'important est de savoir que l'autoloader va automatiquement
chercher et inclure les fichiers nécessaires des classes dans le dossier `src/`
par rapport à leur namespace.

Maintenant que cet autoloader est en place, nous pouvons simplifier nos fichiers
pour inclure l'autoloader et utiliser les classes sans avoir à inclure
manuellement chaque fichier de classe :

```php
<?php
// src/index.php
require_once 'autoloader.php'; // Plus besoin d'inclure chaque fichier de classe manuellement

use Animals\Pets\Dog;
use Animals\Pets\Cat;

$dog = new Dog("Nalia", 30.5, "Naliouille");
$cat = new Cat("Tofu", 10.0, "Sushi");

echo $dog->getName() . " says: " . $dog->makeSound() . "<br>";
echo $cat->getName() . " says: " . $cat->makeSound() . "<br>";
```

L'autoloader va automatiquement chercher et inclure les fichiers nécessaires à
l'aide des namespaces définis avec `use Animals\Pets\Dog;` et
`use Animals\Pets\Cat;`.

L'autoloader va aller chercher les fichiers `Dog.php` et `Cat.php` dans le
dossier `src/Animals/Pets/` de manière automatique, ce qui simplifie grandement
la gestion des dépendances.

Mettons également à jour tous les autres fichiers pour qu'ils utilisent
l'autoloader et ainsi charger automatiquement les classes nécessaires :

```php
<?php
// src/Pets/Pet.php

namespace Pets;

require_once __DIR__ . '/../../utils/autoloader.php';

// Importation de la classe parent d'un différent namespace
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
// src/Pets/Cat.php

namespace Pets;

require_once __DIR__ . '/../../utils/autoloader.php';

class Cat extends Pet {
    public function __construct(string $name, float $size, string $nickname) {
        parent::__construct($name, $size, $nickname);
    }

    public function makeSound(): string {
        return "Meow!";
    }
}
```

```php
<?php
// src/Pets/Dog.php

namespace Pets;

require_once __DIR__ . '/../../utils/autoloader.php';

class Dog extends Pet {
    public function __construct(string $name, float $size, string $nickname) {
        parent::__construct($name, $size, $nickname);
    }

    public function makeSound(): string {
        return "Woof!";
    }
}
```

Ainsi, nous avons mis en place un autoloader qui permet de charger
automatiquement les classes nécessaires en fonction de leur namespace,
simplifiant ainsi la gestion des dépendances dans notre projet et ne plus avoir
besoin d'inclure manuellement chaque fichier de classe avec `require_once`. Cela
rend le code plus propre et plus facile à maintenir, surtout dans les projets
plus complexes avec de nombreuses classes et dépendances.

## Interfaces, classes abstraites et traits

PHP offre également des fonctionnalités avancées pour la programmation orientée
objet, telles que les traits, similaires aux interfaces et aux classes
abstraites, mais avec des différences importantes.

Pour rappel :

- Une interface définit un contrat que les classes doivent respecter.
- Une classe abstraite peut fournir une implémentation partielle et des méthodes
  concrètes. Les classes abstraites ne peuvent pas être instanciées directement,
  mais sont utilisées par les classes qui les étendent. Les classes qui étendent
  une classe abstraite doivent implémenter toutes les méthodes abstraites
  définies dans la classe abstraite parente. Cela permet de créer une hiérarchie
  de classes et de partager du code commun entre les classes qui partagent des
  comportements similaires.

Un trait est un mécanisme similaire à une interface ou une classe abstraite,
mais avec des différences importantes : un trait est un mécanisme de
réutilisation de code qui permet d'inclure des méthodes dans plusieurs classes
sans avoir à utiliser l'héritage.

Les traits sont utilisés pour partager du code entre des classes qui ne sont pas
liées par une relation d'héritage. Les traits peuvent contenir des méthodes
concrètes et des propriétés, et peuvent être utilisés pour ajouter des
fonctionnalités à des classes existantes sans avoir à créer une hiérarchie de
classes complexe. Les traits sont particulièrement utiles pour éviter la
duplication de code et pour créer des classes plus modulaires et réutilisables.

Illustrons cela avec un exemple simple. Imaginons que nous souhaitons
représenter deux classes PHP :

1. Une classe `Dog` qui représente un chien.
2. Une classe `Basilic` qui représente un plant de basilic.

Le code est structuré de la manière suivante :

```text
./
├── public/
│   └── index.php
├── src/
│   ├── Animals/
│   │   └── Dog.php
│   └── Plants/
│       └── Basilic.php
└── utils/
    └── autoloader.php
```

Ici, à première vue, ces deux classes n'ont rien en commun. Cependant, nous
pouvons imaginer qu'elles partagent une fonctionnalité commune : une méthode
pour boire de l'eau. Nous pouvons créer un trait `DrinkTrait` qui contient cette
méthode, et l'utiliser dans les deux classes sans devoir utiliser l'héritage ou
créer une hiérarchie de classes complexe.

La structure du code pourrait ressembler à ceci :

```text
./
├── public/
│   └── index.php
├── src/
│   ├── Animals/
│   │   └── Dog.php
│   ├── Plants/
│   │   └── Basilic.php
│   └── Traits/
│       └── DrinkTrait.php
└── utils/
    └── autoloader.php
```

Commençons par créer le trait `DrinkTrait` :

```php
<?php
// src/Traits/DrinkTrait.php
namespace Traits;

trait DrinkTrait {
    public int $waterLevel = 100;

    public function drink(): string {
        $this->waterLevel -= 10;
        return "Drinking water!";
    }

    public function giveWater(): string {
        $this->waterLevel += 10;
        return "Giving water!";
    }
}
```

Ce trait contient une propriété `$waterLevel` qui représente le niveau d'eau,
ainsi que deux méthodes : `drink()` pour boire de l'eau et `giveWater()` pour
donner de l'eau.

Ensuite, nous pouvons utiliser ce trait dans les classes `Dog` et `Basilic` :

```php
<?php
// src/Animals/Dog.php

namespace Animals;

require_once __DIR__ . '/../../utils/autoloader.php';

use Traits\DrinkTrait;

class Dog {
    use DrinkTrait;

    public function bark(): string {
        return "Woof!";
    }
}
```

```php
<?php
// src/Plants/Basilic.php

namespace Plants;

require_once __DIR__ . '/../../utils/autoloader.php';

use Traits\DrinkTrait;

class Basilic {
    use DrinkTrait;

    public function grow(): string {
        return "Growing!";
    }
}
```

Utiliser le trait `DrinkTrait` dans les deux classes permet de partager la
fonctionnalité de boire de l'eau sans avoir à créer une hiérarchie de classes
complexe. Les deux classes peuvent maintenant utiliser les méthodes `drink()` et
`giveWater()` définies dans le trait :

```php
<?php
// public/index.php
require_once __DIR__ . '/../utils/autoloader.php';

use Animals\Dog;
use Plants\Basilic;

$dog = new Dog();
echo $dog->bark() . "<br>";
echo $dog->drink() . "<br>";
echo "Dog's water level: " . $dog->waterLevel . "<br>";

$basilic = new Basilic();
echo $basilic->grow() . "<br>";
echo $basilic->drink() . "<br>";
echo "Basilic's water level: " . $basilic->waterLevel . "<br>";
```

Les traits sont donc un mécanisme puissant pour partager du code entre des
classes qui ne sont pas liées par une relation d'héritage, ce qui permet de
créer des classes plus modulaires et réutilisables sans devoir utiliser
d'interfaces ou de classes abstraites.

Il est important de noter que les traits ne sont pas des classes et ne peuvent
pas être instanciés directement. Ils sont utilisés uniquement pour partager du
code entre des classes. De plus, les traits ne peuvent pas contenir de
constructeurs, mais ils peuvent contenir des méthodes et des propriétés. Les
classes qui utilisent un trait peuvent également définir leurs propres méthodes
et propriétés, en plus de celles définies dans le trait.

## Conclusion

Les espaces de noms (namespaces) et l'autoloader sont des fonctionnalités
avancées de PHP qui permettent d'organiser le code et de gérer les dépendances
de manière efficace. Les namespaces permettent de regrouper les classes, les
fonctions et les constantes sous un même nom, tandis que l'autoloader permet de
charger automatiquement les classes lorsqu'elles sont utilisées, sans avoir à
inclure manuellement chaque fichier.

Les traits sont un mécanisme puissant associé à la programmation orientée objet
qui permet de partager du code entre des classes qui ne sont pas liées par une
relation d'héritage. Les traits permettent de créer des classes plus modulaires
et réutilisables sans devoir utiliser d'interfaces ou de classes abstraites.

## Exemples de code

Nous vous invitons maintenant à consulter les exemples de code de la séance afin
de mieux comprendre les concepts abordés.

Vous trouverez les exemples de code ici :
[Exemples de code](./01-exemples-de-code/README.md).

## Exercices

Nous vous invitons maintenant à réaliser les exercices de la séance afin de
mettre en pratique les concepts abordés.

Vous trouverez les exercices et leur corrigé ici :
[Exercices](./02-exercices/README.md).

## À faire pour la semaine suivante

Chaque personne est libre de gérer son temps comme elle le souhaite. Cependant,
il est recommandé pour la séance suivante de :

- Relire les supports de cours si nécessaire.
- Finaliser l'appropriation des exemples de code qui n'ont pas été vus en
  classe.
- Finaliser les exercices qui n'ont pas été terminés en classe.

[licence]:
	https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/LICENSE.md
