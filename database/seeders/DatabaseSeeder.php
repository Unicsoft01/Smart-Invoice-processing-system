<?php

namespace Database\Seeders;

use App\Models\Customers;
use App\Models\InvoiceItems;
use App\Models\Invoices;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Invoices::factory(24)->state(new Sequence(
            ['status' => 'paid'],
            ['status' => 'unpaid'],
        ))->create();

        User::factory()->create([
            'name' => 'Amma Admin',
            'email' => 'yakubmuhammed51@gmail.com',
        ]);

        Customers::factory()
            ->count(20)
            ->sequence(
                ['bank_name' => 'UBA'],
                ['bank_name' => 'Zenith'],
                ['bank_name' => 'Polaris'],
            )
            ->sequence(
                ['address' => 'St. Thomas small street, Anigba'],
                ['address' => 'Behind Unity house, Garage'],
                ['address' => 'opposite police statation'],
            )
            ->create();

            // invoices on the invoice

            InvoiceItems::factory(84)->state(new Sequence(
                ['inStock' => 1],
                ['inStock' => 0],
            ))->create();
    }
}
