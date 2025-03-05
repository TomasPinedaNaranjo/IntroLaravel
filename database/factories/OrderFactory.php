<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    public function definition(): array
    {
        return [
            'item' => $this->faker->name,
            'total' => $this->faker->randomFloat(2, 0, 1000),
            'address' => $this->faker->address,
            'payment_method' => $this->faker->creditCardType,
        ];
    }
}
