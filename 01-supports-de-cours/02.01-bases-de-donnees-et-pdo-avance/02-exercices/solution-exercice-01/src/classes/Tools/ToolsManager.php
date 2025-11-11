<?php

namespace Tools;

require_once __DIR__ . '/../../utils/autoloader.php';

use Database;

class ToolsManager implements ToolsManagerInterface {
    private $database;

    public function __construct() {
        $this->database = new Database();
    }

    public function getTools(): array {
        // Définition de la requête SQL pour récupérer tous les outils
        $sql = "SELECT * FROM tools";

        // Préparation de la requête SQL
        $stmt = $this->database->getPdo()->prepare($sql);

        // Exécution de la requête SQL
        $stmt->execute();

        // Récupération de tous les outils
        $tools = $stmt->fetchAll();

        // Transformation des tableaux associatifs en objets Tool
        $tools = array_map(function ($toolData) {
            return new Tool(
                $toolData['id'],
                $toolData['name'],
                $toolData['type'],
                new \DateTime($toolData['purchase_date']),
                $toolData['price']
            );
        }, $tools);

        // Retour de tous les outils
        return $tools;
    }

    public function addTool(Tool $tool): int {
        // Définition de la requête SQL pour ajouter un outil
        $sql = "INSERT INTO tools (name, type, purchase_date, price) VALUES (:name, :type, :purchase_date, :price)";

        // Préparation de la requête SQL
        $stmt = $this->database->getPdo()->prepare($sql);

        // Lien avec les paramètres
        $stmt->bindValue(':name', $tool->getName());
        $stmt->bindValue(':type', $tool->getType());
        $stmt->bindValue(':purchase_date', $tool->getPurchaseDate()->format('Y-m-d'));
        $stmt->bindValue(':price', $tool->getPrice());

        // Exécution de la requête SQL pour ajouter un outil
        $stmt->execute();

        // Récupération de l'identifiant de l'outil ajouté
        $toolId = $this->database->getPdo()->lastInsertId();

        // Retour de l'identifiant de l'outil ajouté.
        return $toolId;
    }

    public function removeTool(int $id): bool {
        // Définition de la requête SQL pour supprimer un outil
        $sql = "DELETE FROM tools WHERE id = :id";

        // Préparation de la requête SQL
        $stmt = $this->database->getPdo()->prepare($sql);

        // Lien avec le paramètre
        $stmt->bindValue(':id', $id);

        // Exécution de la requête SQL pour supprimer un outil
        return $stmt->execute();
    }
}
