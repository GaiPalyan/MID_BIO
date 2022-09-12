<?php

namespace App\Policies;

use App\Models\Number;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NumberPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Number $number): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Number $number): bool
    {
        return $number->creator()->is($user);
    }

    public function delete(User $user, Number $number): bool
    {
        return $number->creator()->is($user);
    }

    public function restore(User $user, Number $number): bool
    {
        return $number->creator()->is($user);
    }

    public function forceDelete(User $user, Number $number): bool
    {
        return $number->creator()->is($user);
    }
}
