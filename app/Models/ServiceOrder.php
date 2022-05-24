<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceOrder extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'vehicle_name',
        'chassi',
        'year',
        'license_plate',
        'mechanic_id',
        'status',
        'description',
        'total_value',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function mechanic(): BelongsTo
    {
        return $this->belongsTo(Mechanic::class);
    }

    public function parts(): HasMany
    {
        return $this->hasMany(Part::class);
    }
}
