<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Domain\Number\NumberManager;
use App\Models\Number;
use App\Services\Number\NumberCreator;
use Illuminate\Http\JsonResponse;

class NumberController extends Controller
{
    /**
     * @var NumberManager
     */
    private NumberManager $numberManager;

    public function __construct(NumberManager $numberManager)
    {
        $this->numberManager = $numberManager;
    }

    /**
     * @return JsonResponse
     * @throws \Exception
     */
    public function store(): JsonResponse
    {
        $number = NumberCreator::generate();
        $number = $this->numberManager->storeNumber($number, auth()->user());

        return response()->json([
            'number_id' => $number->id,
            'number_value' => $number->number,
            'created_by_id' => $number->created_by,
            'messages' => ['success'],
        ], 201);
    }

    /**
     * @param Number $number
     * @return JsonResponse
     */
    public function show(Number $number): JsonResponse
    {
        $number = $this->numberManager->getNumber($number->id);
        return response()->json([
            'number_id' => $number->id,
            'number_value' => $number->number,
            'created_at' => $number->created_at,
        ]);
    }
}
