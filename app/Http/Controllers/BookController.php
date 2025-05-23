<?php

namespace App\Http\Controllers;


use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
   public function index() {
      $books = Book::all();
      
      if ($books->isEmpty()) {
         return response()->json([
            "succes" => "true",
            "message" => "Resource data not found",
         ], 200);
      }


      return response()->json([
         "succes" => "true",
         "message" => "Get All Resource",
         "data" => $books
      ], 200);
   }

   public function store(Request $request) {
      // 1. validator
      $validator = Validator::make($request->all(), [
         'title' => 'required|string|max:100',
         'description' => 'required|string',
         'price' => 'required|numeric',
         'stock' => 'required|integer',
         'genre_id' => 'required|exists:genres,id',
         'author_id' => 'required|exists:authors,id'
      ]);

      // 2. check validator error
      if ($validator->fails()) {
         return response()->json([
            "succes" => false,
            "message" => $validator -> errors(),
            
         ], 422);
      }

      // 3. insert data
      $book = Book::create([
         'title' => $request->title,
         'description' => $request->description,
         'price' => $request->price,
         'stock' => $request->stock,
         'genre_id' => $request->genre_id,
         'author_id' => $request->author_id,
      ]);

      // 4. response
      return response()->json([
         'succes' => true,
         'message' => 'Book created successfully',
         'data' => $book
      ], 201);
   }
}

