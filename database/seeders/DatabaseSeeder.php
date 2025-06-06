<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      $this->call([
        GenreSeeder::class,
      ]);

      $this->call([
        BookSeeder::class,
      ]);

      $this->call([
        AuthorSeeder::class,
      ]);
      
      $this->call([
        UserSeeder::class,
      ]);

      $this->call([
        TransactionSeeder::class,
      ]);

    }
}
