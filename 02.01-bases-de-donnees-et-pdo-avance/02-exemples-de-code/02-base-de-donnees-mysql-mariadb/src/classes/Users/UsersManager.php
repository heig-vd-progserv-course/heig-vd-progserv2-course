<?php

namespace Users;

require_once __DIR__ . '/../../utils/autoloader.php';

use Database;

class UsersManager implements UsersManagerInterface {
    private $database;

    public function __construct() {
        $this->database = new Database();
    }

    public function getUsers(): array {
        // Définition de la requête SQL pour récupérer tous les utilisateurs
        $sql = "SELECT * FROM users";

        // Préparation de la requête SQL
        $stmt = $this->database->getPdo()->prepare($sql);

        // Exécution de la requête SQL
        $stmt->execute();

        // Récupération de tous les utilisateurs
        $users = $stmt->fetchAll();

        // Transformation des tableaux associatifs en objets User
        $users = array_map(function ($userData) {
            return new User(
                $userData['id'],
                $userData['first_name'],
                $userData['last_name'],
                $userData['email'],
                $userData['age']
            );
        }, $users);

        // Retour de tous les utilisateurs
        return $users;
    }

    public function addUser(User $user): int {
        // Définition de la requête SQL pour ajouter un utilisateur
        $sql = "INSERT INTO users (first_name, last_name, email, age) VALUES (:first_name, :last_name, :email, :age)";

        // Définition de la requête SQL pour ajouter un utilisateur
        $sql = "INSERT INTO users (
            first_name,
            last_name,
            email,
            age
        ) VALUES (
            :first_name,
            :last_name,
            :email,
            :age
        )";

        // Préparation de la requête SQL
        $stmt = $this->database->getPdo()->prepare($sql);

        // Lien avec les paramètres
        $stmt->bindValue(':first_name', $user->getFirstName());
        $stmt->bindValue(':last_name', $user->getLastName());
        $stmt->bindValue(':email', $user->getEmail());
        $stmt->bindValue(':age', $user->getAge());

        // Exécution de la requête SQL pour ajouter un utilisateur
        $stmt->execute();

        // Récupération de l'identifiant de l'utilisateur ajouté
        $userId = $this->database->getPdo()->lastInsertId();

        // Retour de l'identifiant de l'utilisateur ajouté.
        return $userId;
    }

    public function removeUser(int $id): bool {
        // Définition de la requête SQL pour supprimer un utilisateur
        $sql = "DELETE FROM users WHERE id = :id";

        // Préparation de la requête SQL
        $stmt = $this->database->getPdo()->prepare($sql);

        // Lien avec le paramètre
        $stmt->bindValue(':id', $id);

        // Exécution de la requête SQL pour supprimer un utilisateur
        return $stmt->execute();
    }
}
