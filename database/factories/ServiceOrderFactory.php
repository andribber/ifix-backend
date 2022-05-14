<?php

namespace Database\Factories;

use App\Enums\ServiceOrders\Status;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;


class ServiceOrderFactory extends Factory
{
    public function definition()
    {
        return [
            'client' => $this->faker->name(),
            'vehicle_name' => $this->faker->userName(),
            'chassi' => substr($this->faker->uuid(), -16),
            'year' => Carbon::now()->format('Y'),
            'license_plate' => strtoupper(substr($this->faker->uuid(), -7)),
            'status' => Status::EXECUTING,
            'description' => $this->faker->text(20),
        ];
    }
}
