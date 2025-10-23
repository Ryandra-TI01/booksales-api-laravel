<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('transactions')->insert([
            [
                'order_number' => 'ORD001',
                'customer_id' => 1,
                'book_id' => 1,
                'total_amount' => 150000.00,
            ],
            [
                'order_number' => 'ORD002',
                'customer_id' => 2,
                'book_id' => 2,
                'total_amount' => 100000.00,
            ],
            [
                'order_number' => 'ORD003',
                'customer_id' => 3,
                'book_id' => 3,
                'total_amount' => 80000.00,
            ],
            [
                'order_number' => 'ORD004',
                'customer_id' => 1,
                'book_id' => 4,
                'total_amount' => 200000.00,
            ],
            [
                'order_number' => 'ORD005',
                'customer_id' => 2,
                'book_id' => 5,
                'total_amount' => 120000.00,
            ],
        ]);
    }
}
