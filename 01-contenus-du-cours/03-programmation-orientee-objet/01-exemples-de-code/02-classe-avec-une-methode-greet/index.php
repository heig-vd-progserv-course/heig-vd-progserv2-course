<?php
class Person {
    public string $name;
    public int $age;

    public function greet(): string {
        return "Hi, my name is " . $this->name . " and I am " . $this->age . " years old.";
    }
}

$person = new Person();

$person->name = "Alice";
$person->age = 30;

echo $person->greet(); // Affiche "Hi, my name is Alice and I am 30 years old."
