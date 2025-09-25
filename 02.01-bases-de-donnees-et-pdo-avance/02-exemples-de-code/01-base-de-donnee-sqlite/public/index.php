<?php
require_once '../src/User.php';

echo "<h1>Exemple : Classe simple</h1>";

// Création d'objets
$user1 = new User("Alice", "Martin", "alice.martin@email.com", 25);
$user2 = new User("Bob", "Dupont", "bob.dupont@email.com", 17);

// Utilisation des méthodes
echo "<h2>Utilisateur 1:</h2>";
echo "<p>" . $user1->displayInfo() . "</p>";
echo "<p>Est majeur: " . ($user1->isAdult() ? "Oui" : "Non") . "</p>";

echo "<h2>Utilisateur 2:</h2>";
echo "<p>" . $user2->displayInfo() . "</p>";
echo "<p>Est majeur: " . ($user2->isAdult() ? "Oui" : "Non") . "</p>";

// Modification des propriétés via les setters
$user2->setAge(18);
echo "<p>Après modification de l'âge de " . $user2->getFullName() . ":</p>";
echo "<p>Est majeur: " . ($user2->isAdult() ? "Oui" : "Non") . "</p>";
