<?php

/**
 * Exemple 2 : Encapsulation et validation
 * 
 * Cet exemple montre comment utiliser l'encapsulation pour :
 * - Protéger les données avec des propriétés privées
 * - Valider les données dans les setters
 * - Contrôler l'accès aux propriétés sensibles
 */

class BankAccount {
    private string $accountNumber;
    private string $ownerName;
    private float $balance;
    private array $transactionHistory;

    public function __construct(string $accountNumber, string $ownerName, float $initialBalance = 0.0) {
        $this->accountNumber = $accountNumber;
        $this->ownerName = $ownerName;
        $this->balance = max(0, $initialBalance); // Solde minimum de 0
        $this->transactionHistory = [];

        if ($initialBalance > 0) {
            $this->addTransaction("Dépôt initial", $initialBalance);
        }
    }

    // Getters
    public function getAccountNumber(): string {
        return $this->accountNumber;
    }

    public function getOwnerName(): string {
        return $this->ownerName;
    }

    public function getBalance(): float {
        return $this->balance;
    }

    // Pas de setter direct pour le solde - seulement via deposit/withdraw
    // Cela assure l'intégrité des données

    public function setOwnerName(string $ownerName): void {
        if (strlen(trim($ownerName)) > 0) {
            $this->ownerName = $ownerName;
        }
    }

    // Méthodes métier avec validation
    public function deposit(float $amount): bool {
        if ($amount <= 0) {
            echo "Erreur: Le montant doit être positif.\n";
            return false;
        }

        $this->balance += $amount;
        $this->addTransaction("Dépôt", $amount);
        echo "Dépôt de {$amount}€ effectué. Nouveau solde: {$this->balance}€\n";
        return true;
    }

    public function withdraw(float $amount): bool {
        if ($amount <= 0) {
            echo "Erreur: Le montant doit être positif.\n";
            return false;
        }

        if ($amount > $this->balance) {
            echo "Erreur: Solde insuffisant. Solde actuel: {$this->balance}€\n";
            return false;
        }

        $this->balance -= $amount;
        $this->addTransaction("Retrait", -$amount);
        echo "Retrait de {$amount}€ effectué. Nouveau solde: {$this->balance}€\n";
        return true;
    }

    public function transfer(BankAccount $targetAccount, float $amount): bool {
        if ($this->withdraw($amount)) {
            $targetAccount->deposit($amount);
            echo "Transfert de {$amount}€ vers le compte {$targetAccount->getAccountNumber()} effectué.\n";
            return true;
        }
        return false;
    }

    // Méthode privée pour la gestion interne
    private function addTransaction(string $type, float $amount): void {
        $this->transactionHistory[] = [
            'date' => date('Y-m-d H:i:s'),
            'type' => $type,
            'amount' => $amount,
            'balance' => $this->balance
        ];
    }

    // Méthode pour afficher l'historique (accès contrôlé)
    public function getTransactionHistory(): array {
        return $this->transactionHistory;
    }

    public function displayAccountInfo(): void {
        echo "=== Informations du compte ===\n";
        echo "Numéro: {$this->accountNumber}\n";
        echo "Propriétaire: {$this->ownerName}\n";
        echo "Solde: {$this->balance}€\n";
        echo "Nombre de transactions: " . count($this->transactionHistory) . "\n\n";
    }

    public function displayTransactionHistory(): void {
        echo "=== Historique des transactions ===\n";
        foreach ($this->transactionHistory as $transaction) {
            echo sprintf(
                "[%s] %s: %+.2f€ (Solde: %.2f€)\n",
                $transaction['date'],
                $transaction['type'],
                $transaction['amount'],
                $transaction['balance']
            );
        }
        echo "\n";
    }
}

// Démonstration
echo "=== Exemple 2 : Encapsulation et validation ===\n\n";

// Création de comptes
$account1 = new BankAccount("FR001", "Alice Martin", 1000.0);
$account2 = new BankAccount("FR002", "Bob Dupont", 500.0);

// Affichage des informations initiales
$account1->displayAccountInfo();
$account2->displayAccountInfo();

// Opérations valides
$account1->deposit(200.0);
$account1->withdraw(150.0);

// Tentatives d'opérations invalides
$account1->withdraw(-50.0);  // Montant négatif
$account1->withdraw(2000.0); // Solde insuffisant

// Transfert entre comptes
echo "\n--- Transfert ---\n";
$account1->transfer($account2, 300.0);

// Affichage final
echo "\n--- État final ---\n";
$account1->displayAccountInfo();
$account2->displayAccountInfo();

// Historique détaillé
$account1->displayTransactionHistory();
