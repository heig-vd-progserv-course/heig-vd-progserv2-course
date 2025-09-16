<?php

namespace MyApp\Controllers;

use MyApp\Services\UserService;
use MyApp\Utils\Logger;

/**
 * Contrôleur pour gérer les actions utilisateur
 */
class UserController {
    private UserService $userService;
    private Logger $logger;

    public function __construct(UserService $userService, Logger $logger) {
        $this->userService = $userService;
        $this->logger = $logger;
        $this->logger->info("UserController initialisé");
    }

    public function listUsers(): void {
        $this->logger->info("Affichage de la liste des utilisateurs");

        $users = $this->userService->getAllUsers();

        if (empty($users)) {
            echo "👥 Aucun utilisateur trouvé.\n";
            return;
        }

        echo "👥 Liste des utilisateurs (" . count($users) . "):\n";
        echo str_repeat("-", 60) . "\n";

        foreach ($users as $user) {
            echo sprintf(
                "ID: %d | %s | %s\n",
                $user->getId(),
                $user->getFullName(),
                $user->getEmail()
            );
        }
        echo str_repeat("-", 60) . "\n";
    }

    public function showUser(int $userId): void {
        $this->logger->info("Affichage détaillé utilisateur ID: {$userId}");

        $user = $this->userService->findById($userId);

        if (!$user) {
            echo "❌ Utilisateur introuvable avec l'ID: {$userId}\n";
            return;
        }

        echo "👤 Détails de l'utilisateur:\n";
        echo "  ID: " . $user->getId() . "\n";
        echo "  Nom complet: " . $user->getFullName() . "\n";
        echo "  Prénom: " . $user->getFirstName() . "\n";
        echo "  Nom: " . $user->getLastName() . "\n";
        echo "  Email: " . $user->getEmail() . "\n";
    }

    public function createUser(string $firstName, string $lastName, string $email): void {
        $this->logger->info("Tentative de création utilisateur via contrôleur");

        $user = $this->userService->createUser($firstName, $lastName, $email);

        if ($user) {
            echo "✅ Utilisateur créé avec succès!\n";
            echo "  ID: " . $user->getId() . "\n";
            echo "  Nom: " . $user->getFullName() . "\n";
            echo "  Email: " . $user->getEmail() . "\n";
        } else {
            echo "❌ Échec de la création de l'utilisateur.\n";
        }
    }

    public function updateUserEmail(int $userId, string $newEmail): void {
        $this->logger->info("Tentative de mise à jour email utilisateur ID: {$userId}");

        if ($this->userService->updateUserEmail($userId, $newEmail)) {
            echo "✅ Email mis à jour avec succès!\n";
        } else {
            echo "❌ Échec de la mise à jour de l'email.\n";
        }
    }

    public function getUserStats(): void {
        $count = $this->userService->getUserCount();
        $this->logger->info("Affichage des statistiques utilisateurs");

        echo "📊 Statistiques des utilisateurs:\n";
        echo "  Nombre total: {$count}\n";

        if ($count > 0) {
            $users = $this->userService->getAllUsers();
            $domains = [];

            foreach ($users as $user) {
                $email = $user->getEmail();
                $domain = substr($email, strpos($email, '@') + 1);
                $domains[$domain] = ($domains[$domain] ?? 0) + 1;
            }

            echo "  Domaines d'email les plus utilisés:\n";
            arsort($domains);
            $topDomains = array_slice($domains, 0, 3, true);
            foreach ($topDomains as $domain => $count) {
                echo "    - {$domain}: {$count} utilisateur(s)\n";
            }
        }
    }
}
