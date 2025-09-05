# Programmation orientée objet (avancé)

L. Delafontaine, avec l'aide de
[GitHub Copilot](https://github.com/features/copilot).

Ce travail est sous licence [CC BY-SA 4.0][licence].

## Ressources

- Objectifs, méthodes d'enseignement et d'apprentissage, et méthodes
  d'évaluation : [Lien vers le contenu](..)
- Supports de cours : [Lien vers le contenu](../01-supports-de-cours/README.md)
  ·
  [Presentation (web)](https://heig-vd-progserv-course.github.io/heig-vd-progserv2-course/01.01-modalites-de-lunite-denseignement/01-supports-de-cours/index.html)
  ·
  [Presentation (PDF)](https://heig-vd-progserv-course.github.io/heig-vd-progserv2-course/01.01-modalites-de-lunite-denseignement/01-supports-de-cours/01.01-modalites-de-lunite-denseignement-presentation.pdf)
- Exemples de code : [Lien vers le contenu](../02-exemples-de-code/)
- Exercices : [Lien vers le contenu](../03-exercices/README.md)

## Table des matières

- [Ressources](#ressources)
- [Table des matières](#table-des-matières)
- [Objectifs](#objectifs)
- [PHP, un rappel](#php-un-rappel)
  - [Variables](#variables)
  - [Fonctions](#fonctions)
  - [Boucles et structures conditionnelles](#boucles-et-structures-conditionnelles)
  - [Formulaires HTML](#formulaires-html)
  - [Importation de fichiers](#importation-de-fichiers)
- [Programmation orientée objet (base)](#programmation-orientée-objet-base)
  - [Classes et objets](#classes-et-objets)
  - [Attributs et méthodes](#attributs-et-méthodes)
- [Programmation orientée objet (avancé)](#programmation-orientée-objet-avancé-1)
  - [Interfaces](#interfaces)
  - [Héritage](#héritage)
  - [Abstraction](#abstraction)
  - [Visibilité](#visibilité)

## Objectifs

- Rappeler les concepts de base de la programmation orientée objet.
- Appliquer les notions d'interface, d'héritage et d'abstraction avec la
  programmation orientée objet.

## PHP, un rappel

### Variables

PHP est un langage à typage dynamique, ce qui signifie que les types de
variables sont déterminés automatiquement au moment de l'exécution. Voici les
types de base en PHP :

```php
<?php
$variable = "Hello";                        // string
$variable = 42;                             // int
$variable = 3.14;                           // float
$variable = true;                           // bool
$variable = [true, 2, "3", 4 => [5, 6, 7]]; // array
$variable = null;                           // null
```

### Fonctions

Les fonctions permettent de structurer le code en blocs réutilisables. Elles
facilitent la réutilisation du code.

Une fonction est définie à l'aide du mot-clé `function`, suivi du nom de la
fonction et de ses paramètres.

**Fonctions avec paramètres par défaut :**

```php
function createUser(string $name, int $age = 18, bool $active = true): User {
    return new User($name, $age, $active);
}
```

**Fonctions variadiques :**

```php
function sum(int ...$numbers): int {
    return array_sum($numbers);
}

$total = sum(1, 2, 3, 4, 5); // 15
```

**Fonctions anonymes et closures :**

```php
$multiplier = function(int $factor) {
    return function(int $value) use ($factor) {
        return $value * $factor;
    };
};

$double = $multiplier(2);
echo $double(5); // 10
```

**Arrow functions (PHP 7.4+) :**

```php
$numbers = [1, 2, 3, 4, 5];
$doubled = array_map(fn($n) => $n * 2, $numbers);
```

### Boucles et structures conditionnelles

PHP propose plusieurs structures de contrôle pour gérer les flux de données et
les conditions.

**Structures conditionnelles :**

```php
// if/elseif/else
if ($user->isAdmin()) {
    $permissions = 'full';
} elseif ($user->isModerator()) {
    $permissions = 'moderate';
} else {
    $permissions = 'limited';
}

// switch/case
switch ($user->getRole()) {
    case 'admin':
        $permissions = 'full';
        break;
    case 'moderator':
        $permissions = 'moderate';
        break;
    default:
        $permissions = 'limited';
}

// match expression (PHP 8.0+)
$permissions = match($user->getRole()) {
    'admin' => 'full',
    'moderator' => 'moderate',
    default => 'limited'
};
```

**Boucles :**

```php
// foreach pour les tableaux et objets itérables
foreach ($users as $user) {
    echo $user->getName();
}

foreach ($users as $id => $user) {
    echo "User {$id}: {$user->getName()}";
}

// for traditionnel
for ($i = 0; $i < count($items); $i++) {
    processItem($items[$i]);
}

// while et do-while
while ($data = fetchNextData()) {
    processData($data);
}
```

### Formulaires HTML

La gestion des formulaires HTML est cruciale en développement web PHP. Voici les
bonnes pratiques pour traiter les données de formulaires de manière sécurisée.

**Traitement des données POST/GET :**

```php
// Validation et nettoyage des données
function validateAndSanitize(array $data): array {
    $clean = [];

    $clean['name'] = filter_var($data['name'] ?? '', FILTER_SANITIZE_STRING);
    $clean['email'] = filter_var($data['email'] ?? '', FILTER_VALIDATE_EMAIL);
    $clean['age'] = filter_var($data['age'] ?? 0, FILTER_VALIDATE_INT, [
        'options' => ['min_range' => 1, 'max_range' => 120]
    ]);

    return $clean;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = validateAndSanitize($_POST);

    if ($data['email'] && $data['name'] && $data['age']) {
        // Traitement sécurisé des données
        $user = new User($data['name'], $data['email'], $data['age']);
        $userRepository->save($user);
    }
}
```

**Protection CSRF :**

```php
session_start();

// Génération du token CSRF
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Validation du token
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'] ?? '')) {
        throw new SecurityException('Invalid CSRF token');
    }
}
```

### Importation de fichiers

## Programmation orientée objet (base)

### Classes et objets

Les classes sont les modèles (blueprints) qui définissent la structure et le
comportement des objets. Un objet est une instance d'une classe.

**Définition d'une classe simple :**

```php
class User {
    // Propriétés (attributs)
    private string $name;
    private string $email;
    private int $age;

    // Constructeur
    public function __construct(string $name, string $email, int $age) {
        $this->name = $name;
        $this->email = $email;
        $this->age = $age;
    }

    // Méthodes
    public function getName(): string {
        return $this->name;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getAge(): int {
        return $this->age;
    }

    public function isAdult(): bool {
        return $this->age >= 18;
    }
}
```

**Création et utilisation d'objets :**

```php
// Création d'objets (instanciation)
$user1 = new User("Alice", "alice@example.com", 25);
$user2 = new User("Bob", "bob@example.com", 17);

// Utilisation des méthodes
echo $user1->getName(); // "Alice"
echo $user1->isAdult() ? "Adulte" : "Mineur"; // "Adulte"
echo $user2->isAdult() ? "Adulte" : "Mineur"; // "Mineur"
```

### Attributs et méthodes

Les attributs stockent l'état de l'objet, tandis que les méthodes définissent
son comportement.

**Types d'attributs :**

```php
class Product {
    // Attributs d'instance
    private string $name;
    private float $price;
    private int $stock;

    // Attribut de classe (partagé par toutes les instances)
    private static int $totalProducts = 0;

    // Constantes de classe
    public const TAX_RATE = 0.20;

    public function __construct(string $name, float $price, int $stock) {
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
        self::$totalProducts++;
    }

    // Méthode d'instance
    public function getPriceWithTax(): float {
        return $this->price * (1 + self::TAX_RATE);
    }

    // Méthode statique
    public static function getTotalProducts(): int {
        return self::$totalProducts;
    }

    // Méthodes magiques
    public function __toString(): string {
        return "{$this->name} - {$this->price}€";
    }
}
```

**Utilisation avancée :**

```php
$product1 = new Product("Laptop", 1000.0, 5);
$product2 = new Product("Mouse", 25.0, 10);

echo $product1->getPriceWithTax(); // 1200.0
echo Product::getTotalProducts(); // 2
echo Product::TAX_RATE; // 0.20
echo $product1; // "Laptop - 1000€" (grâce à __toString)
```

## Programmation orientée objet (avancé)

### Interfaces

Les interfaces définissent un contrat que les classes doivent respecter. Elles
spécifient quelles méthodes une classe doit implémenter sans définir leur
implémentation.

**Définition et utilisation d'interfaces :**

```php
interface PaymentProcessorInterface {
    public function processPayment(float $amount): bool;
    public function refund(string $transactionId): bool;
    public function getTransactionFee(): float;
}

interface LoggerInterface {
    public function log(string $message, string $level = 'info'): void;
}

// Une classe peut implémenter plusieurs interfaces
class CreditCardProcessor implements PaymentProcessorInterface, LoggerInterface {
    private string $logFile;

    public function __construct(string $logFile) {
        $this->logFile = $logFile;
    }

    public function processPayment(float $amount): bool {
        $this->log("Processing payment of {$amount}€");
        // Logique de traitement
        return true;
    }

    public function refund(string $transactionId): bool {
        $this->log("Refunding transaction {$transactionId}");
        // Logique de remboursement
        return true;
    }

    public function getTransactionFee(): float {
        return 0.025; // 2.5%
    }

    public function log(string $message, string $level = 'info'): void {
        file_put_contents($this->logFile, "[{$level}] {$message}\n", FILE_APPEND);
    }
}
```

**Utilisation polymorphique :**

```php
function processPayments(PaymentProcessorInterface $processor, array $payments): void {
    foreach ($payments as $amount) {
        if ($processor->processPayment($amount)) {
            echo "Payment of {$amount}€ processed successfully\n";
        }
    }
}

$creditCard = new CreditCardProcessor('payments.log');
$paypal = new PayPalProcessor(); // Autre implémentation

processPayments($creditCard, [100, 250, 75]);
processPayments($paypal, [150, 300]);
```

### Héritage

L'héritage permet à une classe (classe fille) d'hériter des propriétés et
méthodes d'une autre classe (classe parent), favorisant la réutilisation du
code.

**Héritage simple :**

```php
class Animal {
    protected string $name;
    protected int $age;

    public function __construct(string $name, int $age) {
        $this->name = $name;
        $this->age = $age;
    }

    public function getName(): string {
        return $this->name;
    }

    public function makeSound(): string {
        return "Some generic animal sound";
    }

    protected function sleep(): string {
        return "{$this->name} is sleeping";
    }
}

class Dog extends Animal {
    private string $breed;

    public function __construct(string $name, int $age, string $breed) {
        parent::__construct($name, $age); // Appel du constructeur parent
        $this->breed = $breed;
    }

    // Redéfinition (override) de méthode
    public function makeSound(): string {
        return "Woof! Woof!";
    }

    // Nouvelle méthode spécifique
    public function fetch(): string {
        return "{$this->name} is fetching the ball";
    }

    public function getBreed(): string {
        return $this->breed;
    }

    // Utilisation d'une méthode protégée du parent
    public function rest(): string {
        return $this->sleep();
    }
}
```

**Utilisation :**

```php
$animal = new Animal("Generic", 5);
$dog = new Dog("Buddy", 3, "Golden Retriever");

echo $animal->makeSound(); // "Some generic animal sound"
echo $dog->makeSound(); // "Woof! Woof!"
echo $dog->fetch(); // "Buddy is fetching the ball"
echo $dog->rest(); // "Buddy is sleeping"

// Polymorphisme
function introduceAnimal(Animal $animal): void {
    echo "This is {$animal->getName()}, and it says: {$animal->makeSound()}";
}

introduceAnimal($animal); // Generic animal sound
introduceAnimal($dog); // Woof! Woof!
```

### Abstraction

Les classes abstraites permettent de définir une base commune avec des méthodes
partiellement implémentées. Elles ne peuvent pas être instanciées directement.

**Classes et méthodes abstraites :**

```php
abstract class Shape {
    protected string $color;

    public function __construct(string $color) {
        $this->color = $color;
    }

    // Méthode concrète (implémentée)
    public function getColor(): string {
        return $this->color;
    }

    // Méthodes abstraites (doivent être implémentées par les classes filles)
    abstract public function calculateArea(): float;
    abstract public function calculatePerimeter(): float;

    // Méthode concrète utilisant les méthodes abstraites
    public function getShapeInfo(): string {
        return sprintf(
            "Shape: %s, Color: %s, Area: %.2f, Perimeter: %.2f",
            static::class,
            $this->color,
            $this->calculateArea(),
            $this->calculatePerimeter()
        );
    }
}

class Rectangle extends Shape {
    private float $width;
    private float $height;

    public function __construct(string $color, float $width, float $height) {
        parent::__construct($color);
        $this->width = $width;
        $this->height = $height;
    }

    public function calculateArea(): float {
        return $this->width * $this->height;
    }

    public function calculatePerimeter(): float {
        return 2 * ($this->width + $this->height);
    }
}

class Circle extends Shape {
    private float $radius;

    public function __construct(string $color, float $radius) {
        parent::__construct($color);
        $this->radius = $radius;
    }

    public function calculateArea(): float {
        return pi() * pow($this->radius, 2);
    }

    public function calculatePerimeter(): float {
        return 2 * pi() * $this->radius;
    }
}
```

**Utilisation :**

```php
$rectangle = new Rectangle("blue", 10, 5);
$circle = new Circle("red", 7);

echo $rectangle->getShapeInfo();
// Shape: Rectangle, Color: blue, Area: 50.00, Perimeter: 30.00

echo $circle->getShapeInfo();
// Shape: Circle, Color: red, Area: 153.94, Perimeter: 43.98

// Polymorphisme avec classe abstraite
function displayShapes(array $shapes): void {
    foreach ($shapes as $shape) {
        if ($shape instanceof Shape) {
            echo $shape->getShapeInfo() . "\n";
        }
    }
}

displayShapes([$rectangle, $circle]);
```

### Visibilité

La visibilité détermine l'accessibilité des propriétés et méthodes d'une classe.
PHP propose trois niveaux de visibilité.

**Les trois niveaux de visibilité :**

```php
class BankAccount {
    // public: accessible partout
    public string $accountNumber;

    // protected: accessible dans la classe et ses sous-classes
    protected float $balance;

    // private: accessible uniquement dans la classe actuelle
    private string $pin;

    public function __construct(string $accountNumber, string $pin) {
        $this->accountNumber = $accountNumber;
        $this->pin = $pin;
        $this->balance = 0.0;
    }

    // Méthode publique pour accéder au solde
    public function getBalance(): float {
        return $this->balance;
    }

    // Méthode publique pour déposer de l'argent
    public function deposit(float $amount): bool {
        if ($amount > 0) {
            $this->balance += $amount;
            $this->logTransaction("Deposit", $amount);
            return true;
        }
        return false;
    }

    // Méthode publique pour retirer de l'argent
    public function withdraw(float $amount, string $pin): bool {
        if ($this->validatePin($pin) && $this->canWithdraw($amount)) {
            $this->balance -= $amount;
            $this->logTransaction("Withdrawal", $amount);
            return true;
        }
        return false;
    }

    // Méthode protégée - accessible dans les sous-classes
    protected function canWithdraw(float $amount): bool {
        return $this->balance >= $amount;
    }

    // Méthode privée - accessible uniquement dans cette classe
    private function validatePin(string $pin): bool {
        return $this->pin === $pin;
    }

    private function logTransaction(string $type, float $amount): void {
        echo "[LOG] {$type}: {$amount}€ - New balance: {$this->balance}€\n";
    }
}

class SavingsAccount extends BankAccount {
    private float $interestRate;

    public function __construct(string $accountNumber, string $pin, float $interestRate) {
        parent::__construct($accountNumber, $pin);
        $this->interestRate = $interestRate;
    }

    public function addInterest(): void {
        $interest = $this->balance * $this->interestRate;
        $this->balance += $interest; // OK: balance est protected
        echo "Interest added: {$interest}€\n";
    }

    // Redéfinition pour ajouter des restrictions
    protected function canWithdraw(float $amount): bool {
        // Frais de retrait pour compte épargne
        $totalAmount = $amount + 5.0; // 5€ de frais
        return $this->balance >= $totalAmount;
    }

    // Cette méthode ne peut pas accéder à $pin (private dans la classe parent)
    public function changePin(string $oldPin, string $newPin): bool {
        // return $this->pin === $oldPin; // ERREUR: $pin est private
        // Il faudrait une méthode publique/protégée dans la classe parent
        return false;
    }
}
```

**Démonstration de l'encapsulation :**

```php
$account = new BankAccount("12345", "1234");

// OK: propriété publique
echo $account->accountNumber; // "12345"

// OK: méthode publique
$account->deposit(100);
echo $account->getBalance(); // 100

// ERREUR: propriété protégée
// echo $account->balance; // Fatal error

// ERREUR: propriété privée
// echo $account->pin; // Fatal error

// ERREUR: méthode privée
// $account->validatePin("1234"); // Fatal error

$savings = new SavingsAccount("67890", "5678", 0.03);
$savings->deposit(1000);
$savings->addInterest(); // Utilise la propriété protégée balance
```

**Propriétés et méthodes statiques avec visibilité :**

```php
class DatabaseConnection {
    private static ?self $instance = null;
    private static int $connectionCount = 0;

    // Constructeur privé (pattern Singleton)
    private function __construct() {
        self::$connectionCount++;
    }

    public static function getInstance(): self {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public static function getConnectionCount(): int {
        return self::$connectionCount;
    }

    // Empêche le clonage
    private function __clone() {}

    // Empêche la désérialisation
    private function __wakeup() {}
}

// Utilisation
$db1 = DatabaseConnection::getInstance();
$db2 = DatabaseConnection::getInstance();
echo DatabaseConnection::getConnectionCount(); // 1 (même instance)
```

[licence]:
	https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/LICENSE.md
