<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function findByEmail(string $email): ?User
    {
        return User::query()->where('email', $email)->get()->first();
    }

    /**
     * @return User[]
     */
    public function findAll(): array
    {
        return User::query()->get()->all();
    }
}
