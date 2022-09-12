<?php

declare(strict_types=1);

namespace App\Repositories\Number;

use App\Domain\Number\NumberRepositoryInterface;
use App\Models\Number;
use App\Models\User;

class NumberRepository implements NumberRepositoryInterface
{
    /**
     * @param int $id
     * @return Number
     */
    public function get(int $id): Number
    {
        return Number::where('id', $id)->firstOrFail();
    }

    /**
     * @param int $int
     * @param User $user
     * @return Number
     */
    public function save(int $int, User $user): Number
    {
        return Number::create(['number' => $int, 'created_by' => $user->id]);
    }

    public function getList()
    {
        return Number::all();
    }
}
