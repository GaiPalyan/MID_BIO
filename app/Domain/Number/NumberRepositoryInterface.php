<?php

declare(strict_types=1);

namespace App\Domain\Number;

use App\Models\Number;
use App\Models\User;

interface NumberRepositoryInterface
{
    public function save(int $int, User $user): Number;
    public function get(int $id): Number;
    public function getList();
}
