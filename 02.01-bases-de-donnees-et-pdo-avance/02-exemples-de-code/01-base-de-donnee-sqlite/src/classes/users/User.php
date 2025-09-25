<?php

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

    // Méthode pour vérifier si l'utilisateur est majeur
    public function isAdult(): bool {
        return $this->age >= 18;
    }
}
