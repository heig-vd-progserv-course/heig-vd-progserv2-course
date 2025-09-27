<?php

namespace Users;

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

    // Méthode pour valider les données de l'utilisateur
    public function validate(): array {
        $errors = [];

        if (empty($this->firstName)) {
            $errors[] = "Le prénom est requis.";

            if (strlen($this->firstName) < 2) {
                $errors[] = "Le prénom doit contenir au moins 2 caractères.";
            }
        }

        if (empty($this->lastName)) {
            $errors[] = "Le nom est requis.";

            if (strlen($this->lastName) < 2) {
                $errors[] = "Le nom doit contenir au moins 2 caractères.";
            }
        }

        if (empty($this->email) || !filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Un email valide est requis.";
        }

        if ($this->age < 0) {
            $errors[] = "L'âge doit être un nombre positif.";
        }

        return $errors;
    }
}
