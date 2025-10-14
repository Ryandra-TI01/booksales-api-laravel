<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public static function getAllAuthors()
    {
        return [
            [
                'id' => 1,
                'name' => 'Tere Liye',
                'photo' => 'tere.jpg',
                'bio' => 'Penulis produktif asal Indonesia dengan karya fantasi populer.'
            ],
            [
                'id' => 2,
                'name' => 'Andrea Hirata',
                'photo' => 'andrea.jpg',
                'bio' => 'Penulis novel Laskar Pelangi yang menginspirasi banyak orang.'
            ],
            [
                'id' => 3,
                'name' => 'Dewi Lestari',
                'photo' => 'dee.jpg',
                'bio' => 'Penulis sekaligus musisi, terkenal lewat karya Filosofi Kopi.'
            ],
            [
                'id' => 4,
                'name' => 'J.K. Rowling',
                'photo' => 'jk.jpg',
                'bio' => 'Penulis seri Harry Potter yang melegenda di seluruh dunia.'
            ],
            [
                'id' => 5,
                'name' => 'Stephen King',
                'photo' => 'king.jpg',
                'bio' => 'Penulis bergenre horror dan thriller asal Amerika Serikat.'
            ],
        ];
    }
}
