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
            'status' => Status::EXECUTING,
            'mechanic_name' => $this->faker->name(),
            'mechanic_hours' => 2,
            'description' => $this->faker->text(20),
        ];
    }
}
