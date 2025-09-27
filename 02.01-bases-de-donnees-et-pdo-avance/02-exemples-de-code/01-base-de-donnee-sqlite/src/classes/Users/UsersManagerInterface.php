<?php

namespace Users;

interface UsersManagerInterface {
    public function getUsers(): array;
    public function addUser(User $user): int;
    public function removeUser(int $id): bool;
}
