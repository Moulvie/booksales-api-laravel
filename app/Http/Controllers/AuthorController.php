<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    public function index () {
        $authors = Author::all();

        if ($authors->isEmpty()) {
         return response()->json([
            "succes" => "true",
            "message" => "Resource data not found",
         ], 200);
      }

        return response()->json([
         "succes" => "true",
         "message" => "Get All Resource",
         "data" => $authors
      ], 200);
    }


    public function store(Request $request) {
    // 1. validator
    $validator = Validator::make($request->all(), [
         'name' => 'required|string|max:100',
         'bio' => 'required|string',
      ]);

    // 2. check validator error
    if ($validator->fails()) {
       return response()->json([
          "succes" => false,
          "message" => $validator -> errors(),
          
       ], 422);
    }

    // 3. insert data
    $author = Author::create([
       'name' => $request->name,
       'bio' => $request->bio,
    ]);

    // 4. response
    return response()->json([
       "succes" => "true",
       "message" => "Author created succesfully",
       "data" => $author
    ], 200);


    }
}
