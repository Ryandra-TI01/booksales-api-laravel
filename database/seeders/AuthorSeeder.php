<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('authors')->insert([
            [
                'name' => 'Tere Liye',
                'photo' => 'tere.jpg',
                'bio' => 'Penulis produktif asal Indonesia dengan karya fantasi populer.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Andrea Hirata',
                'photo' => 'andrea.jpg',
                'bio' => 'Penulis novel Laskar Pelangi yang menginspirasi banyak orang.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dewi Lestari',
                'photo' => 'dee.jpg',
                'bio' => 'Penulis sekaligus musisi, terkenal lewat karya Filosofi Kopi.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'J.K. Rowling',
                'photo' => 'jk.jpg',
                'bio' => 'Penulis seri Harry Potter yang melegenda di seluruh dunia.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Stephen King',
                'photo' => 'king.jpg',
                'bio' => 'Penulis bergenre horror dan thriller asal Amerika Serikat.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
