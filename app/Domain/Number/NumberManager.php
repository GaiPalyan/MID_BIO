<?php

declare(strict_types=1);

namespace App\Domain\Number;

use App\Models\Number;
use App\Models\User;

class NumberManager
{
    /**
     * @var NumberRepositoryInterface
     */
    private NumberRepositoryInterface $numberRepository;

    public function __construct(NumberRepositoryInterface $numberRepository)
    {
        $this->numberRepository = $numberRepository;
    }

    public function storeNumber(int $number, User $user): Number
    {
        return $this->numberRepository->save($number, $user);
    }

    public function getNumber(int $id): Number
    {
        return $this->numberRepository->get($id);
    }

    public function getAllNumbers()
    {
        return $this->numberRepository->getList();
    }
}
