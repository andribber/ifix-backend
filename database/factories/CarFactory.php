<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CarFactory extends Factory
{
    protected $table = 'cars';

    public function definition()
    {
        return [
            'model' => 'Marea',
            'manufacturer' => 'FIAT',
            'license_plate' => 'AAA7777',
            'chassi' => Str::random(16),
        ];
    }
}
