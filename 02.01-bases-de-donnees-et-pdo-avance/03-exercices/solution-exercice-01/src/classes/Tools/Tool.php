<?php

namespace Tools;

use DateTime;

class Tool implements ToolInterface {
    // Propriétés privées pour assurer l'encapsulation
    private ?int $id;
    private string $name;
    private string $type;
    private \DateTime $purchaseDate;
    private float $price;

    const TYPES = [
        'spade' => 'Bêche',
        'rake' => 'Râteau',
        'mower' => 'Tondeuse'
    ];

    // Constructeur pour initialiser l'objet
    public function __construct(?int $id, string $name, string $type, \DateTime $purchaseDate, float $price) {
        // Vérification des données
        if (empty($name)) {
            throw new \InvalidArgumentException("Le nom de l'outil est requis.");
        } else if (strlen($name) < 2) {
            throw new \InvalidArgumentException("Le nom de l'outil doit contenir au moins 2 caractères.");
        }

        if (empty($type)) {
            throw new \InvalidArgumentException("Le type de l'outil est requis.");
        } else if (!array_key_exists($type, self::TYPES)) {
            throw new \InvalidArgumentException("Le type de l'outil est invalide.");
        }

        if (empty($purchaseDate)) {
            throw new \InvalidArgumentException("La date d'achat est requise.");
        } elseif (!$purchaseDate instanceof \DateTime) {
            throw new \InvalidArgumentException("La date d'achat doit être au format AAAA-MM-JJ.");
        }

        if ($price < 0) {
            throw new \InvalidArgumentException("Le prix doit être un nombre positif.");
        }

        // Initialisation des propriétés
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->purchaseDate = $purchaseDate;
        $this->price = $price;
    }

    // Getters pour accéder aux propriétés
    public function getId(): ?int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getType(): string {
        return $this->type;
    }

    public function getPurchaseDate(): \DateTime {
        return $this->purchaseDate;
    }

    public function getPrice(): float {
        return $this->price;
    }

    // Setters pour modifier les propriétés
    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setName(string $name): void {
        if (empty($name)) {
            throw new \InvalidArgumentException("Le nom de l'outil est requis.");
        } else if (strlen($name) < 2) {
            throw new \InvalidArgumentException("Le nom de l'outil doit contenir au moins 2 caractères.");
        }

        $this->name = $name;
    }

    public function setType(string $type): void {
        if (empty($type)) {
            throw new \InvalidArgumentException("Le type de l'outil est requis.");
        } else if (!array_key_exists($type, self::TYPES)) {
            throw new \InvalidArgumentException("Le type de l'outil est invalide.");
        }

        $this->type = $type;
    }

    public function setPurchaseDate(\DateTime $purchaseDate): void {
        if (empty($purchaseDate)) {
            throw new \InvalidArgumentException("La date d'achat est requise.");
        } elseif (!$purchaseDate instanceof \DateTime) {
            throw new \InvalidArgumentException("La date d'achat doit être au format AAAA-MM-JJ.");
        }

        $this->purchaseDate = $purchaseDate;
    }

    public function setPrice(float $price): void {
        if ($price < 0) {
            throw new \InvalidArgumentException("Le prix doit être un nombre positif.");
        }

        $this->price = $price;
    }
}
