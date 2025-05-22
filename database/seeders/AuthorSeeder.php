<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::create([
            'name' => 'J.K. Rowling',
            'bio' => 'Penulis novel Harry Potter.'
        ]);

        Author::create([
            'name' => 'Andrea Hinata',
            'bio' => 'Andrea Hirata adalah seorang penulis novel asal Indonesia yang terkenal lewat novel "Laskar Pelangi".'
        ]);

        Author::create([
            'name' => 'Dee Lestari',
            'bio' => 'Dewi Lestari atau Dee Lestari adalah penulis novel populer dan penyanyi asal Indonesia.'
        ]);

        Author::create([
            'name' => 'Tere Liye',
            'bio' => 'Tere Liye adalah penulis fiksi asal Indonesia yang telah menulis berbagai novel bertema kehidupan dan cinta.'
        ]);

        Author::create([
            'name' => 'Pramoedya Ananta Toer',
            'bio' => 'Pramoedya adalah salah satu sastrawan terbesar Indonesia, dikenal lewat Tetralogi Buru.'
        ]);
    }
}
