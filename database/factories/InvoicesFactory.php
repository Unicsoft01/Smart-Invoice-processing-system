<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoices>
 */
class InvoicesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => rand(1, 20),
            'vendor_contact' => rand(1111111, 5555555),
            'invoice_number' => 'inv'.rand(1111111, 5555555),
            'amount' => rand(1111, 9999),
            'date_raised' => now(),
        ];
    }
}
