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
            "success" => "true",
            "message" => "Resource data not found",
         ], 200);
      }

        return response()->json([
         "success" => "true",
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
          "success" => false,
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
       "success" => "true",
       "message" => "Author created succesfully",
       "data" => $author
    ], 200);


    }


    public function update(string $id, Request $request ) {
      // 1. mencari data
      $author = Author::find($id);

      if (!$author) {
         return response()->json([
            'success' => false,
            'message' => 'Resource not found'
         ], 422);
      }

      // 2. validator
      $validator = Validator::make($request->all(), [
         'name' => 'required|string|max:100',
         'bio' => 'required|string',
      ]);

      if ($validator->fails()) {
         return response()->json([
            "success" => false,
            "message" => $validator -> errors(),
            
         ], 422);
      } 

      // 3. siapkan data yang ingin di update
      $data = [
         'name' => $request->name,
         'bio' => $request->bio,
      ];

      // 4. update data
      $author->update($data);

      // 5. response
      return response()->json([
         "success" => "true",
         "message" => "Author updated successfully",
         "data" => $author
      ], 200);
      
    }

    public function show(string $id) {
      $author = Author::find($id);


      if (!$author) {
         return response()->json([
            'success' => false,
            'message' => 'Resource not found'
         ], 404);
      }

      return response()->json([
         'success' => true,
         'message' => 'Get detail resource',
         'data' => $author 
      ], 200);
   }

   public function destroy(string $id) {
      $author = Author::find($id);

      if (!$author) {
         return response()->json([
            'success' => false,
            'message' => 'Resource not found'
         ], 404);
      }

      $author->delete();

      return response()->json([
         'success' => true,
         'message' => 'Author deleted successfully'
      ], 200);
   }

}
