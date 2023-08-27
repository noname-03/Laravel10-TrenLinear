<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Product 1',
            'price' => 1000,
        ]);

        Product::create([
            'name' => 'Product 2',
            'price' => 2000,
        ]);

        Product::create([
            'name' => 'Product 3',
            'price' => 3000,
        ]);

        Product::create([
            'name' => 'Product 4',
            'price' => 4000,
        ]);
    }
}