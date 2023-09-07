<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Transaction::create([
            'product_id' => 1,
            'date' => '2023-01-27',
            'qty' => 52,
            'total' => 520000
        ]);

        Transaction::create([
            'product_id' => 1,
            'date' => '2023-02-27',
            'qty' => 46,
            'total' => 460000
        ]);

        Transaction::create([
            'product_id' => 1,
            'date' => '2023-03-27',
            'qty' => 60,
            'total' => 600000
        ]);

        Transaction::create([
            'product_id' => 1,
            'date' => '2023-04-27',
            'qty' => 64,
            'total' => 640000
        ]);

        Transaction::create([
            'product_id' => 1,
            'date' => '2023-05-27',
            'qty' => 72,
            'total' => 720000
        ]);

        Transaction::create([
            'product_id' => 1,
            'date' => '2023-06-27',
            'qty' => 64,
            'total' => 640000
        ]);

        Transaction::create([
            'product_id' => 2,
            'date' => '2023-07-27',
            'qty' => 52,
            'total' => 520000
        ]);

        Transaction::create([
            'product_id' => 2,
            'date' => '2023-08-27',
            'qty' => 46,
            'total' => 460000
        ]);

        Transaction::create([
            'product_id' => 2,
            'date' => '2021-09-27',
            'qty' => 60,
            'total' => 600000
        ]);

        Transaction::create([
            'product_id' => 2,
            'date' => '2023-10-27',
            'qty' => 64,
            'total' => 640000
        ]);

        Transaction::create([
            'product_id' => 2,
            'date' => '2023-11-27',
            'qty' => 72,
            'total' => 720000
        ]);

        Transaction::create([
            'product_id' => 3,
            'date' => '2023-01-27',
            'qty' => 72,
            'total' => 720000
        ]);

        Transaction::create([
            'product_id' => 3,
            'date' => '2023-02-27',
            'qty' => 72,
            'total' => 720000
        ]);

        Transaction::create([
            'product_id' => 3,
            'date' => '2023-03-27',
            'qty' => 72,
            'total' => 720000
        ]);

        Transaction::create([
            'product_id' => 3,
            'date' => '2023-04-27',
            'qty' => 72,
            'total' => 720000
        ]);

        Transaction::create([
            'product_id' => 3,
            'date' => '2023-05-27',
            'qty' => 72,
            'total' => 720000
        ]);

        Transaction::create([
            'product_id' => 3,
            'date' => '2023-06-27',
            'qty' => 72,
            'total' => 720000
        ]);

        Transaction::create([
            'product_id' => 3,
            'date' => '2023-07-27',
            'qty' => 72,
            'total' => 720000
        ]);

        Transaction::create([
            'product_id' => 3,
            'date' => '2023-08-27',
            'qty' => 72,
            'total' => 720000
        ]);

        Transaction::create([
            'product_id' => 3,
            'date' => '2023-09-27',
            'qty' => 72,
            'total' => 720000
        ]);

        Transaction::create([
            'product_id' => 3,
            'date' => '2023-10-27',
            'qty' => 72,
            'total' => 720000
        ]);

        Transaction::create([
            'product_id' => 3,
            'date' => '2023-11-27',
            'qty' => 72,
            'total' => 720000
        ]);

        Transaction::create([
            'product_id' => 3,
            'date' => '2023-12-27',
            'qty' => 72,
            'total' => 720000
        ]);
    }
}
