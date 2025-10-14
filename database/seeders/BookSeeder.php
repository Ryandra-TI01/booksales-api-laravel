<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('books')->insert([
            [
                'title' => 'Bumi',
                'description' => 'Novel fantasi karya Tere Liye',
                'price' => 75000,
                'stock' => 10,
                'cover_photo' => 'bumi.jpg',
                'author_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Laskar Pelangi',
                'description' => 'Novel inspiratif karya Andrea Hirata',
                'price' => 85000,
                'stock' => 15,
                'cover_photo' => 'laskar.jpg',
                'author_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Filosofi Kopi',
                'description' => 'Kumpulan cerita karya Dewi Lestari',
                'price' => 65000,
                'stock' => 20,
                'cover_photo' => 'filosofi.jpg',
                'author_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Harry Potter',
                'description' => 'Novel fantasi terkenal karya J.K. Rowling',
                'price' => 95000,
                'stock' => 12,
                'cover_photo' => 'hp.jpg',
                'author_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Shining',
                'description' => 'Novel horror karya Stephen King',
                'price' => 100000,
                'stock' => 8,
                'cover_photo' => 'shining.jpg',
                'author_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
