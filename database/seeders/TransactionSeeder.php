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
            'date' => '2019-08-27',
            'qty' => 52,
            'total' => 20000
        ]);

        Transaction::create([
            'product_id' => 2,
            'date' => '2020-08-27',
            'qty' => 46,
            'total' => 10000
        ]);

        Transaction::create([
            'product_id' => 3,
            'date' => '2021-08-27',
            'qty' => 60,
            'total' => 30000
        ]);
        Transaction::create([
            'product_id' => 3,
            'date' => '2022-08-27',
            'qty' => 64,
            'total' => 30000
        ]);
        Transaction::create([
            'product_id' => 3,
            'date' => '2023-08-27',
            'qty' => 72,
            'total' => 30000
        ]);
        Transaction::create([
            'product_id' => 3,
            'date' => '2018-08-27',
            'qty' => 64,
            'total' => 30000
        ]);
    }
}