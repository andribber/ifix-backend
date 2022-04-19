<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'hours',
        'value',
        'name',
        'description',
    ];

    protected $casts = [
        'hours' => 'int',
        'value' => 'float',
    ];

    public function mechanic(): BelongsTo
    {
        return $this->belongsTo(Mechanic::class);
    }

    public function cars(): BelongsToMany
    {
        return $this->belongsToMany(Car::class);
    }
}
