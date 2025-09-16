<?php

/**
 * Exemple 4 : Interfaces et polymorphisme
 * 
 * Cet exemple illustre :
 * - La définition d'interfaces comme contrats
 * - L'implémentation d'interfaces par différentes classes
 * - Le polymorphisme avec les interfaces
 * - L'utilisation d'une même interface par des classes différentes
 */

// Interface définissant un contrat pour les animaux
interface AnimalInterface {
    public function makeSound(): string;
    public function getHabitat(): string;
    public function getSpecies(): string;
}

// Interface pour les animaux domestiques
interface PetInterface {
    public function getNickname(): string;
    public function play(): string;
    public function needsVaccination(): bool;
}

// Classe Lion implémentant AnimalInterface
class Lion implements AnimalInterface {
    private string $name;
    private int $age;

    public function __construct(string $name, int $age) {
        $this->name = $name;
        $this->age = $age;
    }

    public function makeSound(): string {
        return "Roooooar!";
    }

    public function getHabitat(): string {
        return "Savane africaine";
    }

    public function getSpecies(): string {
        return "Panthera leo";
    }

    public function getName(): string {
        return $this->name;
    }

    public function hunt(): string {
        return $this->name . " chasse dans la savane.";
    }
}

// Classe Penguin implémentant AnimalInterface
class Penguin implements AnimalInterface {
    private string $name;
    private float $height;

    public function __construct(string $name, float $height) {
        $this->name = $name;
        $this->height = $height;
    }

    public function makeSound(): string {
        return "Honk honk!";
    }

    public function getHabitat(): string {
        return "Antarctique";
    }

    public function getSpecies(): string {
        return "Spheniscidae";
    }

    public function getName(): string {
        return $this->name;
    }

    public function swim(): string {
        return $this->name . " nage gracieusement sous l'eau.";
    }
}

// Classe Dog implémentant les deux interfaces
class Dog implements AnimalInterface, PetInterface {
    private string $breed;
    private string $nickname;
    private int $age;
    private bool $isVaccinated;

    public function __construct(string $breed, string $nickname, int $age, bool $isVaccinated = false) {
        $this->breed = $breed;
        $this->nickname = $nickname;
        $this->age = $age;
        $this->isVaccinated = $isVaccinated;
    }

    // Implémentation de AnimalInterface
    public function makeSound(): string {
        return "Woof woof!";
    }

    public function getHabitat(): string {
        return "Maison familiale";
    }

    public function getSpecies(): string {
        return "Canis lupus familiaris";
    }

    // Implémentation de PetInterface
    public function getNickname(): string {
        return $this->nickname;
    }

    public function play(): string {
        return $this->nickname . " joue avec sa balle préférée!";
    }

    public function needsVaccination(): bool {
        return !$this->isVaccinated;
    }

    // Méthodes spécifiques
    public function getBreed(): string {
        return $this->breed;
    }

    public function vaccinate(): void {
        $this->isVaccinated = true;
        echo $this->nickname . " a été vacciné(e).\n";
    }
}

// Classe Cat implémentant les deux interfaces
class Cat implements AnimalInterface, PetInterface {
    private string $color;
    private string $nickname;
    private bool $isIndoor;

    public function __construct(string $color, string $nickname, bool $isIndoor = true) {
        $this->color = $color;
        $this->nickname = $nickname;
        $this->isIndoor = $isIndoor;
    }

    // Implémentation de AnimalInterface
    public function makeSound(): string {
        return "Miaou miaou!";
    }

    public function getHabitat(): string {
        return $this->isIndoor ? "Appartement" : "Maison avec jardin";
    }

    public function getSpecies(): string {
        return "Felis catus";
    }

    // Implémentation de PetInterface
    public function getNickname(): string {
        return $this->nickname;
    }

    public function play(): string {
        return $this->nickname . " joue avec une pelote de laine.";
    }

    public function needsVaccination(): bool {
        return true; // Les chats ont besoin de rappels réguliers
    }

    // Méthodes spécifiques
    public function purr(): string {
        return $this->nickname . " ronronne de satisfaction.";
    }
}

// Fonction utilisant le polymorphisme avec AnimalInterface
function presentAnimal(AnimalInterface $animal): void {
    echo "=== Présentation d'un animal ===\n";
    echo "Espèce: " . $animal->getSpecies() . "\n";
    echo "Habitat: " . $animal->getHabitat() . "\n";
    echo "Son produit: " . $animal->makeSound() . "\n";

    // Vérifier si c'est aussi un animal domestique
    if ($animal instanceof PetInterface) {
        echo "Surnom: " . $animal->getNickname() . "\n";
        echo "Activité: " . $animal->play() . "\n";
        echo "Besoin de vaccination: " . ($animal->needsVaccination() ? "Oui" : "Non") . "\n";
    }
    echo "\n";
}

// Fonction pour faire jouer tous les animaux domestiques
function playWithPets(array $pets): void {
    echo "=== Session de jeu avec les animaux domestiques ===\n";
    foreach ($pets as $pet) {
        if ($pet instanceof PetInterface) {
            echo $pet->play() . "\n";
        }
    }
    echo "\n";
}

// Démonstration
echo "=== Exemple 4 : Interfaces et polymorphisme ===\n\n";

// Création d'animaux de différents types
$lion = new Lion("Simba", 5);
$penguin = new Penguin("Pingu", 0.8);
$dog = new Dog("Golden Retriever", "Buddy", 3, true);
$cat = new Cat("Roux", "Garfield", true);

// Tableau d'animaux (polymorphisme)
$animals = [$lion, $penguin, $dog, $cat];

// Présentation de tous les animaux avec la même fonction
foreach ($animals as $animal) {
    presentAnimal($animal);
}

// Jeu avec les animaux domestiques uniquement
$pets = [$dog, $cat];
playWithPets($pets);

// Gestion des vaccinations
echo "=== Gestion des vaccinations ===\n";
foreach ($pets as $pet) {
    if ($pet instanceof PetInterface) {
        if ($pet->needsVaccination()) {
            echo $pet->getNickname() . " a besoin d'une vaccination.\n";
            if ($pet instanceof Dog) {
                $pet->vaccinate();
            }
        } else {
            echo $pet->getNickname() . " est à jour avec ses vaccinations.\n";
        }
    }
}

// Démonstration des méthodes spécifiques (casting nécessaire)
echo "\n=== Comportements spécifiques ===\n";
echo $lion->hunt() . "\n";
echo $penguin->swim() . "\n";
echo $cat->purr() . "\n";
