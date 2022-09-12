<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Number extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'created_by',
        ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'create_by');
    }
}
