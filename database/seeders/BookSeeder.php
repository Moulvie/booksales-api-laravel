<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title' => 'Pulang',
            'description' => 'petualangan seorang pemuda yang kembali ke desa kelahiranya.',
            'price' => 200000,
            'stock' => 10
        ]);
        Book::create([
            'title' => 'Naruto',
            'description' => 'petualangan seorang ninja dari desa konoha.',
            'price' => 250000,
            'stock' => 10
        ]);
        Book::create([
            'title' => 'Islam Future',
            'description' => 'menjelaskan Masa depan tentang islam.',
            'price' => 300000,
            'stock' => 10
        ]);
        Book::create([
            'title' => 'Islam Nusantara',
            'description' => 'Menjelaskan peradaban islam di nusantara.',
            'price' => 230000,
            'stock' => 10
        ]);
        Book::create([
            'title' => 'Bang Toyib',
            'description' => 'petualangan seorang pemuda yang sudah lama tidak pulang.',
            'price' => 150000,
            'stock' => 10
        ]);
    }
}
