<?php

/**
 * Exemple 1 : Classe simple avec propriétés et méthodes
 * 
 * Cet exemple illustre la création d'une classe simple avec :
 * - Des propriétés privées pour l'encapsulation
 * - Un constructeur pour initialiser l'objet
 * - Des méthodes getters et setters pour accéder aux propriétés
 * - Une méthode métier qui utilise les propriétés
 */

class User {
    // Propriétés privées pour assurer l'encapsulation
    private string $firstName;
    private string $lastName;
    private string $email;
    private int $age;

    // Constructeur pour initialiser l'objet
    public function __construct(string $firstName, string $lastName, string $email, int $age) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->age = $age;
    }

    // Getters pour accéder aux propriétés
    public function getFirstName(): string {
        return $this->firstName;
    }

    public function getLastName(): string {
        return $this->lastName;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getAge(): int {
        return $this->age;
    }

    // Setters pour modifier les propriétés
    public function setFirstName(string $firstName): void {
        $this->firstName = $firstName;
    }

    public function setLastName(string $lastName): void {
        $this->lastName = $lastName;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function setAge(int $age): void {
        if ($age >= 0) {
            $this->age = $age;
        }
    }

    // Méthode métier qui combine plusieurs propriétés
    public function getFullName(): string {
        return $this->firstName . ' ' . $this->lastName;
    }

    // Méthode pour afficher les informations de l'utilisateur
    public function displayInfo(): string {
        return sprintf(
            "Nom complet: %s\nEmail: %s\nÂge: %d ans",
            $this->getFullName(),
            $this->email,
            $this->age
        );
    }

    // Méthode pour vérifier si l'utilisateur est majeur
    public function isAdult(): bool {
        return $this->age >= 18;
    }
}

// Démonstration d'utilisation
echo "=== Exemple 1 : Classe User simple ===\n\n";

// Création d'objets
$user1 = new User("Alice", "Martin", "alice.martin@email.com", 25);
$user2 = new User("Bob", "Dupont", "bob.dupont@email.com", 17);

// Utilisation des méthodes
echo "Utilisateur 1:\n";
echo $user1->displayInfo() . "\n";
echo "Est majeur: " . ($user1->isAdult() ? "Oui" : "Non") . "\n\n";

echo "Utilisateur 2:\n";
echo $user2->displayInfo() . "\n";
echo "Est majeur: " . ($user2->isAdult() ? "Oui" : "Non") . "\n\n";

// Modification des propriétés via les setters
$user2->setAge(18);
echo "Après modification de l'âge de " . $user2->getFullName() . ":\n";
echo "Est majeur: " . ($user2->isAdult() ? "Oui" : "Non") . "\n";
