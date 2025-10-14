<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public static function getAllGenres()
    {
        return [
            ['id' => 1, 'name' => 'Action', 'description' => 'Cerita yang penuh aksi dan pertarungan.'],
            ['id' => 2, 'name' => 'Romance', 'description' => 'Cerita bertema cinta dan hubungan emosional.'],
            ['id' => 3, 'name' => 'Fantasy', 'description' => 'Cerita yang melibatkan dunia sihir dan makhluk ajaib.'],
            ['id' => 4, 'name' => 'Horror', 'description' => 'Cerita menyeramkan dan penuh ketegangan.'],
            ['id' => 5, 'name' => 'Drama', 'description' => 'Cerita dengan konflik kehidupan dan perasaan.'],
        ];
    }
}
