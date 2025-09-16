<?php

namespace MyApp\Services;

use MyApp\Models\User;
use MyApp\Utils\Logger;
use MyApp\Utils\Validator;

/**
 * Service pour gérer les utilisateurs
 */
class UserService {
    private array $users = [];
    private Logger $logger;
    private Validator $validator;

    public function __construct(Logger $logger) {
        $this->logger = $logger;
        $this->validator = new Validator();
        $this->logger->info("UserService initialisé");
    }

    public function createUser(string $firstName, string $lastName, string $email): ?User {
        $this->logger->info("Tentative de création utilisateur: {$firstName} {$lastName}");

        // Validation
        $errors = $this->validator->validateUser($firstName, $lastName, $email);
        if (!empty($errors)) {
            $this->logger->error("Erreurs de validation: " . implode(", ", $errors));
            return null;
        }

        // Vérifier si l'email existe déjà
        if ($this->findByEmail($email)) {
            $this->logger->error("Email déjà existant: {$email}");
            return null;
        }

        $user = new User($firstName, $lastName, $email);
        $this->users[] = $user;

        $this->logger->info("Utilisateur créé avec ID: " . $user->getId());
        return $user;
    }

    public function findById(int $id): ?User {
        foreach ($this->users as $user) {
            if ($user->getId() === $id) {
                return $user;
            }
        }
        return null;
    }

    public function findByEmail(string $email): ?User {
        foreach ($this->users as $user) {
            if ($user->getEmail() === $email) {
                return $user;
            }
        }
        return null;
    }

    public function getAllUsers(): array {
        return $this->users;
    }

    public function getUserCount(): int {
        return count($this->users);
    }

    public function updateUserEmail(int $userId, string $newEmail): bool {
        $user = $this->findById($userId);
        if (!$user) {
            $this->logger->error("Utilisateur introuvable avec ID: {$userId}");
            return false;
        }

        if (!$this->validator->validateEmail($newEmail)) {
            $this->logger->error("Email invalide: {$newEmail}");
            return false;
        }

        if ($this->findByEmail($newEmail) && $this->findByEmail($newEmail)->getId() !== $userId) {
            $this->logger->error("Email déjà utilisé: {$newEmail}");
            return false;
        }

        $oldEmail = $user->getEmail();
        $user->setEmail($newEmail);
        $this->logger->info("Email mis à jour pour utilisateur {$userId}: {$oldEmail} -> {$newEmail}");
        return true;
    }
}
