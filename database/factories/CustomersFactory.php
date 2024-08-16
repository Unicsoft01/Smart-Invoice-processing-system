<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customers>
 */
class CustomersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customerName' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'vendor_contact' => '070'.rand(11111111, 99999999),
            'account_number' => rand(11111111, 99999999),
        ];
    }
}
