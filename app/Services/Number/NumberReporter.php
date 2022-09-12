<?php

declare(strict_types=1);

namespace App\Services\Number;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class NumberReporter
{
    /**
     * @param Collection $numbers
     * @return void
     */
    public static function generate(Collection $numbers): void
    {
        Storage::put(
            'report.txt',
            $numbers->toJson(
                JSON_PRETTY_PRINT
                | JSON_UNESCAPED_UNICODE
                | JSON_UNESCAPED_SLASHES
            )
        );
    }

    /**
     * @return ?string
     * @throws \Exception
     */
    public static function getReport(): ?string
    {
        if (!file_exists(storage_path('app/report.txt'))) {
            throw new \Exception('report not exist!');
        }

        return Storage::get('report.txt');
    }
}
