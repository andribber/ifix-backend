<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'client',
        'vehicle_name',
        'chassi',
        'year',
        'license_plate',
        'status',
        'description',
        'parts',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];
}
