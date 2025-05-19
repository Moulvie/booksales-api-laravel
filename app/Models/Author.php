<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
     private $authors = [
            'George Orwell' => 'George Orwell',
            'Jane Austen' => 'Jane Austen',
            'Haruki Murakami' => 'Haruki Murakami',
            'Michelle Obama' => 'Michelle Obama',
            'Stephen Hawking' => 'Stephen Hawking'
        ];
        
        public function getAuthors() {
            return $this->authors;
        }
}
