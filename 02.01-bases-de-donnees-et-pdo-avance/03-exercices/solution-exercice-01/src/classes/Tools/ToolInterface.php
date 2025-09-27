<?php

namespace Tools;

interface ToolInterface {
    public function getId(): ?int;
    public function getName(): string;
    public function getType(): string;
    public function getPurchaseDate(): \DateTime;
    public function getPrice(): float;

    public function setId(int $id): void;
    public function setName(string $name): void;
    public function setType(string $type): void;
    public function setPurchaseDate(\DateTime $purchaseDate): void;
    public function setPrice(float $price): void;
}
