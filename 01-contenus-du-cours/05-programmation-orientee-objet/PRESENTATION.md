---
marp: true
---

<!--
theme: custom-marp-theme
size: 16:9
paginate: true
author: L. Delafontaine, avec l'aide de GitHub Copilot
title: HEIG-VD ProgServ2 Course - Programmation orientée objet
description: Programmation orientée objet pour le cours ProgServ2 enseigné à la HEIG-VD, Suisse
url: https://heig-vd-progserv-course.github.io/heig-vd-progserv2-course/01-contenus-du-cours/05-programmation-orientee-objet/presentation.html
header: "[**Programmation orientée objet**](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/01-contenus-du-cours/05-programmation-orientee-objet/README.md)"
footer: '[**HEIG-VD**](https://heig-vd.ch) - [ProgServ2 2025-2026](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course) - [CC BY-SA 4.0](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/LICENSE.md)'
headingDivider: 6
math: mathjax
-->

# Programmation orientée objet

<!--
_class: lead
_paginate: false
-->

[<img src="https://raw.githubusercontent.com/primer/octicons/refs/heads/main/icons/mark-github-24.svg" style="vertical-align: middle; width: 32px;" alt="GitHub logo"> `github.com/heig-vd-progserv-course/heig-vd-progserv2-course`](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course)

[Visualiser le contenu complet sur GitHub][contenu-complet].

<small>L. Delafontaine, avec l'aide de
[GitHub Copilot](https://github.com/features/copilot).</small>

<small>Ce travail est sous licence [CC BY-SA 4.0][license].</small>

![bg opacity:0.1][illustration-principale]

## Retrouvez le contenu complet de cette présentation sur GitHub

<!-- _class: lead -->

_Cette présentation est un résumé du contenu complet disponible sur GitHub._

_Pour plus de détails, retrouvez le contenu complet [ici][contenu-complet] ou en
cliquant sur l'en-tête de ce document._

## Objectifs (1/2)

- Lister les concepts clés de la POO.
- Expliquer les avantages et les désavantages de la POO.
- Créer des classes et des objets en PHP.
- Définir des attributs et des méthodes dans une classe.
- Utiliser l'encapsulation pour protéger les données des objets.

![bg right:40%][illustration-objectifs]

## Objectifs (2/2)

- Définir des constructeurs et des destructeurs pour initialiser et nettoyer les
  objets.
- Utiliser des constantes dans les classes.

![bg right:40%][illustration-objectifs]

## Buts de la programmation orientée objet (POO)

- Paradigme de programmation basé sur des objets (= façon de penser/représenter
  l'information).
- Permet de créer des programmes modulaires et réutilisables.
- Permet de modéliser des entités du monde réel plus faciles à maintenir.

![bg right:40%][illustration-buts-de-la-programmation-orientee-objet]

## Concepts clés de la POO (1/2)

<div class="two-columns">
<div>

- **Classes** : modèles qui définissent les propriétés et les comportements des
  objets.
- **Objets** : instances (= création en mémoire) des classes qui représentent
  des entités concrètes.
- **Attributs** : variables qui stockent l'état des objets.

</div>
<div>

- **Méthodes** : fonctions qui définissent les comportements des objets.
- **Encapsulation** : protection des données des objets en limitant l'accès
  direct.
- **Constructeurs et destructeurs** : méthodes spéciales pour initialiser et
  nettoyer les objets.

</div>
</div>

## Concepts clés de la POO (2/2)

Il existe d'autres concepts, mais ils ne seront pas abordés dans ce cours :

- Héritage/polymorphisme
- Interfaces
- Namespaces
- Exceptions
- Etc.

</div>
</div>

![bg right:40%][illustration-buts-de-la-programmation-orientee-objet]

## Avantages de la POO

- **Lisibilité** : le code est organisé en classes et objets, ce qui le rend
  plus facile à comprendre.
- **Réutilisabilité** : les classes peuvent être réutilisées, ce qui réduit la
  duplication de code.
- **Maintenabilité** : les modifications apportées à une classe n'affectent pas
  les autres classes, ce qui facilite la maintenance du code.

![bg right:40%][illustration-avantages-de-la-poo]

## Désavantages de la POO

- **Complexité** : la POO peut être plus complexe que la programmation
  procédurale, ce qui peut rendre le code plus difficile à comprendre pour les
  débutants.
- **Performance** : la POO peut être moins performante que la programmation
  procédurale, car elle nécessite plus de ressources pour créer et gérer des
  objets.

![bg right:40% ][illustration-desavantages-de-la-poo]

## La POO en PHP

- La POO est prise en charge par PHP depuis la version 5.
- PHP propose toutes les fonctionnalités de la POO (classes, objets, attributs,
  méthodes, encapsulation, constructeurs et les destructeurs).
- Explorons certains de ces concepts en PHP.

![bg right:40%][illustration-principale]

### Classes (1/2)

- Une classe est un modèle qui définit les propriétés et les comportements des
  objets.
- Dans PHP, une classe est définie à l'aide du mot-clé `class`.
- Par convention, les noms de classes commencent sont en Pascal case (par
  exemple, `JeSuisUneClasse`).

![bg right:40%][illustration-classes]

### Classes (2/2)

```php
<?php
class Person {
    public $name;
    public $age;
}
```

```java
// Équivalent en Java
public class Person {
    public String name;
    public int age;
}
```

### Instanciation d'objets (1/2)

- Un objet est une instance d'une classe.
- On crée un objet en utilisant le mot-clé `new` suivi du nom de la classe suivi
  de parenthèses (`()`).
- Par convention, les noms d'objets sont écrits en Camel case (par exemple,
  `$jeSuisUnObjet`).

![bg right:40%][illustration-instanciation-dobjets]

### Instanciation d'objets (2/2)

```php
$person1 = new Person();
$person2 = new Person();
```

```java
// Équivalent en Java
Person person1 = new Person();
Person person2 = new Person();
```

### Attributs (1/2)

- Les attributs sont des variables qui stockent l'état des objets.
- Accédées selon leur visibilité :
  - `public` : accessibles de partout.
  - `protected` : accessibles dans la classe et ses sous-classes.
  - `private` : accessibles uniquement dans la classe.
- Accessible via l'opérateur `->`.

![bg right:40%][illustration-attributs]

### Attributs (2/2)

<div class="two-columns">
<div>

```php
<?php
class Person {
    public $name;
    public $age;
}

$person = new Person();

$person->name = "Alice";
$person->age = 30;

echo $person->name . "<br>";
echo $person->age;
```

</div>
<div>

```java
// Équivalent en Java
public class Person {
    public String name;
    public int age;
}

Person person = new Person();

person.name = "Alice";
person.age = 30;

System.out.println(person.name);
System.out.println(person.age);
```

</div>
</div>

### Méthodes (1/3)

- Fonctions qui définissent les comportements des objets.
- Définies dans la classe avec leur visibilité (`public`, `protected`,
  `private`).
- Accédées via l'opérateur `->`.
- Le mot-clé `$this` permet de faire référence à l'objet courant.

![bg right:40%][illustration-methodes]

### Méthodes (2/3)

```php
<?php
class Person {
    public $name;
    public $age;

    public function greet() {
        return "Hi, my name is " .$this->name . " and I am " . $this->age . " years old.";
    }
}

$person = new Person();

$person->name = "Alice";
$person->age = 30;

echo $person->greet();
```

### Méthodes (3/3)

```java
// Équivalent en Java
public class Person {
    public String name;
    public int age;

    public String greet() {
        return "Hi, my name is " + this.name + " and I am " + this.age + " years old.";
    }
}

Person person = new Person();

person.name = "Alice";
person.age = 30;

System.out.println(person.greet());
```

### Encapsulation (1/3)

- Protection des données des objets en limitant l'accès direct (avec `public`,
  `protected` et `private`).
- Permet de contrôler l'accès aux données et de garantir l'intégrité des objets.
- Utilisation de méthodes pour accéder (appelées _"getters"_) et modifier les
  attributs (appelées _"setters"_ en anglais).

![bg right:40%][illustration-encapsulation]

### Encapsulation (2/3)

```php
<?php
class Person {
    private $name; // Attribut privé
    private $age; // Attribut privé

    public function setName($name) {
        if (strlen($name) < 3) {
            return "Name must be at least 3 characters long.";
        }

        $this->name = $name;
    }
```

---

```php
    public function getName() {
        return $this->name;
    }

    public function setAge($age) {
        if ($age < 0) {
            return "Age cannot be negative.";
        }

        $this->age = $age;
    }

    public function getAge() {
        return $this->age;
    }
}
```

---

```php
$person = new Person();

$error = $person->setName("Alice");

if (!empty($error)) {
	echo $error . "<br>";
}

$error = $person->setAge(30);

if (!empty($error)) {
	echo $error . "<br>";
}

echo $person->getName() . "<br>"; // Affiche "Alice"
echo $person->getAge() . "<br>";  // Affiche 30
```

---

```php
$error = $person->setName("AS");

if (!empty($error)) {
    echo $error . "<br>";
}

$error = $person->setAge(-1);

if (!empty($error)) {
    echo $error . "<br>";
}

$person->name = "Bob"; // Erreur : l'attribut est privé
```

### Encapsulation (3/3)

```java
// Équivalent en Java
public class Person {
    private String name; // Attribut privé
    private int age; // Attribut privé

    public String setName(String name) {
        if (name.length() < 3) {
            return "Name must be at least 3 characters long.";
        }

        this.name = name;

        return null;
    }
```

---

```java
    public String getName() {
        return this.name;
    }

    public String setAge(int age) {
        if (age < 0) {
            return "Age cannot be negative.";
        }

        this.age = age;

        return null;
    }

    public int getAge() {
        return this.age;
    }
}
```

---

```java
    public String getName() {
        return this.name;
    }

    public String setAge(int age) {
        if (age < 0) {
            return "Age cannot be negative.";
        }

        this.age = age;

        return null;
    }

    public int getAge() {
        return this.age;
    }
}
```

---

```java
Person person = new Person();

String error = person.setName("Alice");

if (error != null) {
    System.out.println(error);
}

error = person.setAge(30);

if (error != null) {
    System.out.println(error);
}

System.out.println(person.getName()); // Affiche "Alice"
System.out.println(person.getAge());  // Affiche 30
```

---

```java
error = person.setName("AS");

if (error != null) {
    System.out.println(error);
}

error = person.setAge(-1);

if (error != null) {
    System.out.println(error);
}

person.name = "Bob"; // Erreur : l'attribut est privé
```

### Constructeurs et destructeurs (1/3)

- **Constructeur** : méthode spéciale appelée lors de la création d'un objet.
  Permet d'initialiser les attributs de l'objet.
- **Destructeur** : méthode spéciale appelée lors de la destruction d'un objet
  pour libérer les ressources (rarement utilisé en PHP).

![bg right:40%][illustration-constructeurs-et-destructeurs]

### Constructeurs et destructeurs (2/3)

```php
<?php
class Person {
    private $name;
    private $age;

    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }

    public function __destruct() {
        echo $this->name . " is being destroyed.<br>";
    }

    public function greet() {
        return "Hi, my name is " . $this->name . " and I am " . $this->age . " years old.";
    }
}
```

---

```php
$alice = new Person("Alice", 30);
$bob = new Person("Bob", 25);
$evelyn = new Person("Evelyn", 40);

echo $alice->greet() . "<br>";
echo $bob->greet() . "<br>";
echo $evelyn->greet() . "<br>";

// L'objet `$bob` a maintenant la valeur `null`.
// L'objet est donc détruit et le destructeur est appelé.
$bob = null;

// L'objet `$evelyn` référence maintenant le même objet que `$alice`.
// L'objet `$evelyn` n'est plus utilisé et est donc détruit.
$evelyn = $alice;

// L'objet `$alice` sera automatiquement détruit à la fin du script.
// Son destructeur sera appelé.
```

### Constructeurs et destructeurs (3/3)

_Pas de destructeur explicite comme en PHP._

```java
// Équivalent en Java
public class Person {
    private String name;
    private int age;

    public Person(String name, int age) {
        this.name = name;
        this.age = age;
    }

    public String greet() {
        return "Hi, my name is " + this.name + " and I am " + this.age + " years old.";
    }
}
```

---

```java
Person alice = new Person("Alice", 30);
Person bob = new Person("Bob", 25);
Person evelyn = new Person("Evelyn", 40);

System.out.println(alice.greet());
System.out.println(bob.greet());
System.out.println(evelyn.greet());

// En Java, il n'y a pas de destructeur explicite.
// Mais tout objet avec une valeur `null` est éligible pour le garbage collector.
bob = null;

// L'objet `evelyn` référence maintenant le même objet que `alice`.
// L'objet `evelyn` n'est plus utilisé et sera éligible pour le garbage collector.
evelyn = alice;

// L'objet `alice` sera éligible pour le garbage collector à la fin du programme.
```

### Constantes (1/3)

- Les constantes sont des valeurs qui ne changent pas pendant l'exécution du
  programme.
- Elles peuvent être définies dans une classe.
- Accessibles via l'opérateur `::` (opérateur de résolution de portée).
- En majuscules par convention (par exemple, `MA_CONSTANTE`).

![bg right:40%][illustration-constantes]

### Constantes (2/3)

```php
<?php
class Person {
    const ROLE_MANAGER = 'Manager';
    const ROLE_DEVELOPER = 'Developer';
    const ROLE_DESIGNER = 'Designer';
    const ROLE_EMPLOYEE = 'Employee';

    private $name;
    private $role;

    public function __construct($name, $role) {
        $this->name = $name;
        $this->role = $role;
    }

    public function greet() {
        return "Hi, my name is " . $this->name . ". I work as a " . $this->role . " at my company.";
    }
}
```

---

```php
$alice = new Person("Alice", Person::ROLE_DEVELOPER);
$bob = new Person("Bob", Person::ROLE_MANAGER);
$evelyn = new Person("Evelyn", Person::ROLE_DESIGNER);

// Affiche "Hi, my name is Alice. I work as a Developer at my company."
echo $alice->greet() . "<br>";

// Affiche "Hi, my name is Bob. I work as a Manager at my company."
echo $bob->greet() . "<br>";

// Affiche "Hi, my name is Evelyn. I work as a Designer at my company."
echo $evelyn->greet();
```

### Constantes (3/3)

```java
// Équivalent en Java
public class Person {
    public static final String ROLE_MANAGER = "Manager";
    public static final String ROLE_DEVELOPER = "Developer";
    public static final String ROLE_DESIGNER = "Designer";
    public static final String ROLE_EMPLOYEE = "Employee";

    private String name;
    private String role;

    public Person(String name, String role) {
        this.name = name;
        this.role = role;
    }

    public String greet() {
        return "Hi, my name is " + this.name + ". I work as a " + this.role + " at my company.";
    }
}
```

---

```java
Person alice = new Person("Alice", Person.ROLE_DEVELOPER);
Person bob = new Person("Bob", Person.ROLE_MANAGER);
Person evelyn = new Person("Evelyn", Person.ROLE_DESIGNER);

// Affiche "Hi, my name is Alice. I work as a Developer at my company."
System.out.println(alice.greet());

// Affiche "Hi, my name is Bob. I work as a Manager at my company."
System.out.println(bob.greet());

// Affiche "Hi, my name is Evelyn. I work as a Designer at my company."
System.out.println(evelyn.greet());
```

## Conclusion

- La POO permet de créer des programmes modulaires et réutilisables.
- Améliore la lisibilité, la réutilisabilité et la maintenabilité du code.
- PHP prend en charge la POO et propose toutes les fonctionnalités nécessaires
  pour créer des classes et des objets.

![bg right:40%][illustration-principale]

## Questions

<!-- _class: lead -->

Est-ce que vous avez des questions ?

## Feedback

Le [formulaire de feedback][feedback] vous **permet de partager votre retour**
sur l'unité d'enseignement _"ProgServ1"_.

Il ne prend **que quelques minutes** et est **anonyme**. Vous pouvez aussi y
**demander un/des cours d'appui**.

Les résultats seront discutés au prochain cours. **Merci beaucoup !**

[![bg right:40% w:85%][feedback-qr-code]][feedback]

## À vous de jouer !

- (Re)lire le [support de cours][course-material].
- Réaliser le [mini-projet][mini-project].
- Faire les [exercices][exercices].
- Poser des questions si nécessaire.
- Partager vos retours à l'aide du [formulaire de feedback][feedback].

**Entraidez-vous si vous avez des difficultés !**

![bg right:40%][illustration-a-vous-de-jouer]

## Sources (1/2)

- [Illustration principale][illustration-principale] par
  [Richard Jacobs](https://unsplash.com/@rj2747) sur
  [Unsplash](https://unsplash.com/photos/grayscale-photo-of-elephants-drinking-water-8oenpCXktqQ)
- [Illustration][illustration-objectifs] par
  [Aline de Nadai](https://unsplash.com/@alinedenadai) sur
  [Unsplash](https://unsplash.com/photos/j6brni7fpvs)
- [Illustration][illustration-buts-de-la-programmation-orientee-objet] par
  [Eric Prouzet](https://unsplash.com/@eprouzet) sur
  [Unsplash](https://unsplash.com/photos/assorted-color-mugs-on-rack-5lUMTeo7-bE)
- [Illustration][illustration-avantages-de-la-poo] par
  [Thomas Le](https://unsplash.com/@thomasble) sur
  [Unsplash](https://unsplash.com/photos/white-arrow-up-yoPOtxc0s6c)
- [Illustration][illustration-desavantages-de-la-poo] par
  [Ussama Azam](https://unsplash.com/@ussamaazam) sur
  [Unsplash](https://unsplash.com/photos/pink-arrow-neon-sign-26h317_UMYM)
- [Illustration][illustration-classes] par
  [Feliphe Schiarolli](https://unsplash.com/@flpschi) sur
  [Unsplash](https://unsplash.com/photos/photography-of-school-room-hes6nUC1MVc)
- [Illustration][illustration-instanciation-dobjets] par
  [Kenny Eliason](https://unsplash.com/@neonbrand) sur
  [Unsplash](https://unsplash.com/photos/a-group-of-people-in-a-room-with-a-projector-screen-1-aA2Fadydc)
- [Illustration][illustration-attributs] par
  [Pearse O'Halloran](https://unsplash.com/@pearseoh) sur
  [Unsplash](https://unsplash.com/photos/black-and-white-wooden-wall-decor-t0N-LwOu0hg)

## Sources (2/2)

- [Illustration][illustration-methodes] par
  [Birmingham Museums Trust](https://unsplash.com/@birminghammuseumstrust) sur
  [Unsplash](https://unsplash.com/photos/grayscale-photo-of-people-in-a-street-y3TC9H0261s)
- [Illustration][illustration-encapsulation] par
  [Erol Ahmed](https://unsplash.com/@erol) sur
  [Unsplash](https://unsplash.com/photos/close-up-photography-of-brown-wooden-card-catalog-Y3KEBQlB1Zk)
- [Illustration][illustration-constructeurs-et-destructeurs] par
  [Scott Blake](https://unsplash.com/@sunburned_surveyor) sur
  [Unsplash](https://unsplash.com/photos/seven-construction-workers-standing-on-white-field-x-ghf9LjrVg)
- [Illustration][illustration-constantes] par
  [Lluvia Morales](https://unsplash.com/@hi_lluvia) sur
  [Unsplash](https://unsplash.com/photos/brown-concrete-blocks-in-close-up-photography-tO2FyAcS03s)
- [Illustration][illustration-a-vous-de-jouer] par
  [Nikita Kachanovsky](https://unsplash.com/@nkachanovskyyy) sur
  [Unsplash](https://unsplash.com/photos/white-sony-ps4-dualshock-controller-over-persons-palm-FJFPuE1MAOM)

<!-- URLs -->

[presentation-web]:
	https://heig-vd-progserv-course.github.io/heig-vd-progserv1-course/07-programmation-orientee-objet/01-theorie/index.html
[presentation-pdf]:
	https://heig-vd-progserv-course.github.io/heig-vd-progserv1-course/07-programmation-orientee-objet/01-theorie/07-programmation-orientee-objet-presentation.pdf
[course-material]:
	https://github.com/heig-vd-progserv-course/heig-vd-progserv1-course/blob/main/07-programmation-orientee-objet/01-theorie/README.md
[license]:
	https://github.com/heig-vd-progserv-course/heig-vd-progserv1-course/blob/main/LICENSE.md
[mini-project]:
	https://github.com/heig-vd-progserv-course/heig-vd-progserv1-course/blob/main/07-programmation-orientee-objet/02-mini-project/README.md
[exercices]:
	https://github.com/heig-vd-progserv-course/heig-vd-progserv1-course/blob/main/07-programmation-orientee-objet/03-exercices/README.md
[feedback]: https://framaforms.org/progserv1-2024-2025-feedback-1745321495
[feedback-qr-code]:
	https://quickchart.io/qr?format=png&ecLevel=Q&size=400&margin=1&text=https://framaforms.org/progserv1-2024-2025-feedback-1745321495

<!-- Illustrations -->

[illustration-principale]:
	https://images.unsplash.com/photo-1517486430290-35657bdcef51?fit=crop&h=720
[illustration-objectifs]:
	https://images.unsplash.com/photo-1516389573391-5620a0263801?fit=crop&h=720
[illustration-buts-de-la-programmation-orientee-objet]:
	https://images.unsplash.com/photo-1563696629964-8c3ce077cf3e?fit=crop&h=720
[illustration-avantages-de-la-poo]:
	https://images.unsplash.com/photo-1551657531-a303c5f54203?fit=crop&h=720
[illustration-desavantages-de-la-poo]:
	https://images.unsplash.com/photo-1572314961011-aece24e1cc48?fit=crop&h=720
[illustration-classes]:
	https://images.unsplash.com/photo-1510531704581-5b2870972060?fit=crop&h=720
[illustration-instanciation-dobjets]:
	https://images.unsplash.com/photo-1524178232363-1fb2b075b655?fit=crop&h=720
[illustration-attributs]:
	https://images.unsplash.com/photo-1510913415497-e34c432bd039?fit=crop&h=720
[illustration-methodes]:
	https://images.unsplash.com/photo-1583737097406-5a4b42b37b97?fit=crop&h=720
[illustration-encapsulation]:
	https://images.unsplash.com/photo-1511721285502-9f81e79be874?fit=crop&h=720
[illustration-constructeurs-et-destructeurs]:
	https://images.unsplash.com/photo-1541888946425-d81bb19240f5?fit=crop&h=720
[illustration-constantes]:
	https://images.unsplash.com/photo-1629608444154-6d052691632f?fit=crop&h=720
[illustration-a-vous-de-jouer]:
	https://images.unsplash.com/photo-1509198397868-475647b2a1e5?fit=crop&h=720

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

## Programmation orientée objet

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
  individuellement avec `require_once` ou `include_once`.
- Cela peut devenir fastidieux dans les projets avec de nombreuses classes.
- Il est préférable d'utiliser `require_once` ou `include_once` pour éviter les
  inclusions multiples.
- Illustrons les problèmes potentiels avec un exemple simple.

---

![bg h:85%](./images/animal-hierarchy-example.png)

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
require_once 'Animal.php';

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
require_once 'Pet.php';

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
require_once 'Pet.php';

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
require_once 'Dog.php';
require_once 'Cat.php';

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
require_once 'autoloader.php'; // Plus besoin d'inclure chaque fichier de classe manuellement

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

![bg h:85%](./images/animal-hierarchy-example-over-engineered.png)

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

➡️ [Visualiser le contenu complet sur GitHub][contenu-complet].

**N'hésitez pas à vous entraider si vous avez des difficultés !**

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

[contenu-complet]:
	https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/tree/main/01-contenus-du-cours/05-programmation-orientee-objet/README.md
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
