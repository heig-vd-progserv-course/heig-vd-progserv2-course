<?php

namespace Users;

class User implements UsersInterface {
    // Propriétés privées pour assurer l'encapsulation
    private ?int $id;
    private string $firstName;
    private string $lastName;
    private string $email;
    private int $age;

    // Constructeur pour initialiser l'objet
    public function __construct(?int $id, string $firstName, string $lastName, string $email, int $age) {
        // Vérification des données
        if (empty($firstName)) {
            throw new \InvalidArgumentException("Le prénom est requis.");
        } else if (strlen($firstName) < 2) {
            throw new \InvalidArgumentException("Le prénom doit contenir au moins 2 caractères.");
        }

        if (empty($lastName)) {
            throw new \InvalidArgumentException("Le nom est requis.");
        } else if (strlen($lastName) < 2) {
            throw new \InvalidArgumentException("Le nom doit contenir au moins 2 caractères.");
        }

        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException("Un email valide est requis.");
        }

        if ($age < 0) {
            throw new \InvalidArgumentException("L'âge doit être un nombre positif.");
        }

        // Initialisation des propriétés
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->age = $age;
    }

    // Getters pour accéder aux propriétés
    public function getId(): ?int {
        return $this->id;
    }

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
    public function setId(int $id): void {
        $this->id = $id;
    }

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
}
