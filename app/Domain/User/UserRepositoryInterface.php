<?php

declare(strict_types=1);

namespace App\Domain\User;

use App\Http\Requests\Auth\RegistrationData;
use App\Models\User;

interface UserRepositoryInterface
{
    public function save(RegistrationData $registrationDto): User;
    public function getByEmail(string $email): ?User;
    public function saveToken(User $user);
    public function deleteTokens(User $user): void;
}
