<?php
class Person {
    private string $name; // Attribut privé
    private int $age; // Attribut privé

    public function setName(string $name): ?string {
        if (strlen($name) < 3) {
            return "Name must be at least 3 characters long.";
        }

        $this->name = $name;

        return null;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setAge(int $age): ?string {
        if ($age < 0) {
            return "Age cannot be negative.";
        }

        $this->age = $age;

        return null;
    }

    public function getAge(): int {
        return $this->age;
    }
}

$person = new Person();

$error = $person->setName("Alice");

if (!empty($error)) {
    echo $error . "<br>";
}

$error = $person->setAge(30);

if (!empty($error)) {
    echo $error . "<br>";
}

echo $person->getName() . "<br>"; // Affiche "Alice"
echo $person->getAge() . "<br>";  // Affiche 30

$error = $person->setName("AS");

if (!empty($error)) {
    echo $error . "<br>";
}

$error = $person->setAge(-1);

if (!empty($error)) {
    echo $error . "<br>";
}

$person->name = "Bob"; // Erreur : l'attribut est privé
