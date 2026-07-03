<?php

namespace Users;

interface UsersInterface {
    public function getId(): ?int;
    public function getFirstName(): string;
    public function getLastName(): string;
    public function getEmail(): string;
    public function getAge(): int;

    public function setId(int $id): void;
    public function setFirstName(string $firstName): void;
    public function setLastName(string $lastName): void;
    public function setEmail(string $email): void;
    public function setAge(int $age): void;
}
