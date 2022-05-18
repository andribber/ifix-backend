<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PartFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'value' => 52.99,
        ];
    }
}
