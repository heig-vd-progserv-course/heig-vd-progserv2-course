# Exercice 2 : Système de gestion d'animaux

**Niveau :** Intermédiaire  
**Durée estimée :** 45 minutes

## Objectif

Créer un système de gestion d'animaux pour un zoo utilisant l'héritage et les
interfaces.

## Consignes

### Étape 1 : Interface AnimalInterface

Créez une interface `AnimalInterface` avec les méthodes :

- `makeSound()` : retourne le son que fait l'animal
- `getSpecies()` : retourne l'espèce de l'animal
- `getHabitat()` : retourne l'habitat naturel

### Étape 2 : Classe abstraite Animal

Créez une classe abstraite `Animal` qui implémente `AnimalInterface` avec :

Propriétés protégées :

- `name` (string)
- `age` (int)
- `weight` (float)

Méthodes concrètes :

- Constructeur
- Getters et setters
- `getInfo()` : retourne les informations de base

Méthode abstraite :

- `getMaintenanceCost()` : coût d'entretien par mois

### Étape 3 : Classes d'animaux spécifiques

#### Classe Mammal extends Animal

- Propriété : `furColor` (string)
- Implémente toutes les méthodes abstraites
- Méthode spécifique : `shed()` (mue)

#### Classe Bird extends Animal

- Propriété : `wingSpan` (float)
- Implémente toutes les méthodes abstraites
- Méthode spécifique : `fly()` (voler)

#### Classes concrètes

Créez au moins 3 classes concrètes :

- `Lion extends Mammal`
- `Elephant extends Mammal`
- `Eagle extends Bird`

### Étape 4 : Classe Zoo

Créez une classe `Zoo` qui :

- Stocke une collection d'animaux
- Permet d'ajouter/retirer des animaux
- Calcule le coût total d'entretien
- Fait un inventaire par espèce
- Fait un concert (tous les animaux font leur cri)

## Structure attendue

```text
exercice-02-animals/
├── interfaces/
│   └── AnimalInterface.php
├── abstract/
│   └── Animal.php
├── mammals/
│   ├── Mammal.php
│   ├── Lion.php
│   └── Elephant.php
├── birds/
│   ├── Bird.php
│   └── Eagle.php
├── Zoo.php
└── test.php
```

## Exemple d'utilisation

```php
$zoo = new Zoo("Zoo de la Palmyre");

$lion = new Lion("Simba", 5, 190.0, "doré");
$elephant = new Elephant("Dumbo", 25, 4500.0, "gris");
$eagle = new Eagle("Aigle Royal", 8, 6.5, 2.3);

$zoo->addAnimal($lion);
$zoo->addAnimal($elephant);
$zoo->addAnimal($eagle);

echo $zoo->getTotalMaintenanceCost();
$zoo->makeAllAnimalsSound();
```

## Points à vérifier

- ✅ Interface correctement définie et implémentée
- ✅ Classe abstraite avec mélange méthodes concrètes/abstraites
- ✅ Héritage à plusieurs niveaux (Animal -> Mammal -> Lion)
- ✅ Polymorphisme dans la classe Zoo
- ✅ Encapsulation respectée

## Bonus (optionnel)

- Ajouter une interface `Feedable` avec des méthodes d'alimentation
- Implémenter un système de santé pour les animaux
- Ajouter des catégories (carnivore, herbivore, omnivore)
