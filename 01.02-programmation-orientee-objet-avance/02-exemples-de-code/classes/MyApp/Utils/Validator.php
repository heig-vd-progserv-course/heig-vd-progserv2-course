<?php

namespace MyApp\Utils;

/**
 * Classe Validator pour valider les données
 */
class Validator {

    public function validateEmail(string $email): bool {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public function validateRequired(string $value): bool {
        return !empty(trim($value));
    }

    public function validateMinLength(string $value, int $minLength): bool {
        return strlen($value) >= $minLength;
    }

    public function validateMaxLength(string $value, int $maxLength): bool {
        return strlen($value) <= $maxLength;
    }

    public function validateNumeric(string $value): bool {
        return is_numeric($value);
    }

    public function validatePositive(float $value): bool {
        return $value > 0;
    }

    public function validateRange(float $value, float $min, float $max): bool {
        return $value >= $min && $value <= $max;
    }

    /**
     * Validation complète d'un utilisateur
     */
    public function validateUser(string $firstName, string $lastName, string $email): array {
        $errors = [];

        if (!$this->validateRequired($firstName)) {
            $errors[] = "Le prénom est requis";
        } elseif (!$this->validateMinLength($firstName, 2)) {
            $errors[] = "Le prénom doit faire au moins 2 caractères";
        }

        if (!$this->validateRequired($lastName)) {
            $errors[] = "Le nom est requis";
        } elseif (!$this->validateMinLength($lastName, 2)) {
            $errors[] = "Le nom doit faire au moins 2 caractères";
        }

        if (!$this->validateRequired($email)) {
            $errors[] = "L'email est requis";
        } elseif (!$this->validateEmail($email)) {
            $errors[] = "L'email n'est pas valide";
        }

        return $errors;
    }

    /**
     * Validation complète d'un produit
     */
    public function validateProduct(string $name, float $price, int $stock): array {
        $errors = [];

        if (!$this->validateRequired($name)) {
            $errors[] = "Le nom du produit est requis";
        } elseif (!$this->validateMinLength($name, 3)) {
            $errors[] = "Le nom du produit doit faire au moins 3 caractères";
        }

        if (!$this->validatePositive($price)) {
            $errors[] = "Le prix doit être positif";
        }

        if ($stock < 0) {
            $errors[] = "Le stock ne peut pas être négatif";
        }

        return $errors;
    }
}
