<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'model' => 'Corolla',
            'year' => '2022',
            'license_plate' => strtoupper(substr($this->faker->uuid(), -7)),
            'manufacturer' => 'Toyota',
        ];
    }
}
