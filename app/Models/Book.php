<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    private $books = [
        [
            'title' => 'pulang',
            'description' => 'petualangan seorang pemuda yang kembali ke desa kelahiranya.',
            'price' => 40000,
            'stock' => 15,
            'cover_photo' => 'pulang.jpg',
            'genre_id' => 1,
            'author_id' => 1
        ],
        [
            'title' => 'sebuah seni untuk bersikap bodo amat',
            'description' => 'Buku yang membahas tentang kehidupan dan filosofi hidup seseorang.',
            'price' => 25000,
            'stock' => 5,
            'cover_photo' => 'sebuah_seni.jpg',
            'genre_id' => 2,
            'author_id' => 2
        ],
        [
             'title' => 'Naruto',
            'description' => 'Buku yang membahas jalan ninja seseorang.',
            'price' => 30000,
            'stock' => 5,
            'cover_photo' => 'Naruto.jpg',
            'genre_id' => 3,
            'author_id' => 3
        ],
    ];

    public function getBooks() {
        return $this->books;
    }
}
