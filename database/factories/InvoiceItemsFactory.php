<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InvoiceItems>
 */
class InvoiceItemsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'invoiceID' => rand(1, 20),
            'productName' => fake()->sentence(),
            'qty' => rand(5, 100),
            'price' => rand(50, 500),
            'total' => rand(150, 1500),
        ];
    }
}
