<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\table;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('genres')->insert([
            [
                'name' => 'Fantasy',
                'description' => 'Novel fantasi karya Tere Liye',
            ],
            [
                'name' => 'Inspirational',
                'description' => 'Novel inspiratif karya Andrea Hirata',
            ],
            [
                'name' => 'Short Stories',
                'description' => 'Kumpulan cerita karya Dewi Lestari',
            ],
            [
                'name' => 'Fiction',
                'description' => 'Novel fantasi terkenal karya J.K. Rowling',
            ],
            [
                'name' => 'Horror',
                'description' => 'Novel horror karya Stephen King',
            ],
        ]);
    }
}
