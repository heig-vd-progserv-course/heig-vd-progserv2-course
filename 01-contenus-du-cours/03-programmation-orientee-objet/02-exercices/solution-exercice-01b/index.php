<?php

class Person {
    private string $firstName;
    private string $lastName;
    private int $age;
    private string $email;

    public function __construct(string $firstName, string $lastName, int $age, string $email) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->age = $age;
        $this->email = $email;
    }

    public function getFirstName(): string {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void {
        $this->firstName = $firstName;
    }

    public function getLastName(): string {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void {
        $this->lastName = $lastName;
    }

    public function getAge(): int {
        return $this->age;
    }

    public function setAge(int $age): void {
        $this->age = $age;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email): void {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->email = $email;
        }
    }

    public function getFullName(): string {
        return "{$this->firstName} {$this->lastName}";
    }

    public function isAdult(): bool {
        return $this->age >= 18;
    }

    public function getEmailDomain(): string {
        $parts = explode('@', $this->email);

        if (count($parts) == 2) {
            return $parts[1];
        }

        return '';
    }
}

$janeDoe = new Person('Jane', 'Doe', 25, 'jane.doe@example.com');
$johnSmith = new Person('John', 'Smith', 17, 'john.smith');

echo "Full Name: " . $janeDoe->getFullName() . "<br>";
echo "Is Adult: " . ($janeDoe->isAdult() ? 'Yes' : 'No') . "<br>";
echo "Email: " . $janeDoe->getEmail() . "<br>";

$janeDoeEmailDomain = $janeDoe->getEmailDomain();

if (empty($janeDoeEmailDomain)) {
    $janeDoeEmailDomain = 'Invalid';
}
echo "Email Domain: " . $janeDoeEmailDomain . "<br>";

echo "Full Name: " . $johnSmith->getFullName() . "<br>";
echo "Is Adult: " . ($johnSmith->isAdult() ? 'Yes' : 'No') . "<br>";
echo "Email: " . $johnSmith->getEmail() . "<br>";

$johnSmithEmailDomain = $johnSmith->getEmailDomain();

if (empty($johnSmithEmailDomain)) {
    $johnSmithEmailDomain = 'Invalid';
}
echo "Email Domain: " . $johnSmithEmailDomain . "<br>";
