<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mechanic extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cpf',
        'expertise',

    ];

}
