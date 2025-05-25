<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GenreController extends Controller
{
    public function index() {
        $genres = Genre::all();


        if ($genres->isEmpty()) {
         return response()->json([
            "success" => "true",
            "message" => "Resource data not found",
         ], 200);
      }


        return response()->json([
         "success" => "true",
         "message" => "Get All Resource",
         "data" => $genres
      ], 200);
    }


    public function store(Request $request) {
    // 1. validator
    $validator = Validator::make($request->all(), [
         'name' => 'required|string|max:100',
         'description' => 'required|string',
      ]);

    // 2. check validator error
    if ($validator->fails()) {
       return response()->json([
          "success" => false,
          "message" => $validator -> errors(),
          
       ], 422);
    }

    // 3. insert data
    $genres = Genre::create([
       'name' => $request->name,
       'description' => $request->description,
    ]);

    // 4. response
    return response()->json([
       "success" => "true",
       "message" => "Genre created succesfully",
       "data" => $genres
    ], 200);


    }

    public function show(string $id) {
      $genre = Genre::find($id);


      if (!$genre) {
         return response()->json([
            'success' => false,
            'message' => 'Resource not found'
         ], 404);
      }

      return response()->json([
         'success' => true,
         'message' => 'Get detail resource',
         'data' => $genre 
      ], 200);
   }


   public function update(string $id, Request $request) {
      // 1. mencari data
      $genre = Genre::find($id);  
      
      if (!$genre) {
         return response()->json([
            'success' => false,
            'message' => 'Resource not found'
         ], 422);
      }

      // 2. validator
      $validator = Validator::make($request->all(), [
         'name' => 'required|string|max:100',
         'description' => 'required|string',
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
         'description' => $request->description,
      ];

      // 4. update data
      $genre->update($data);

      // 5. response
      return response()->json([
         "success" => "true",
         "message" => "Genre updated successfully",
         "data" => $genre
      ], 200);
      
   }


   public function destroy(string $id) {
      $genre = Genre::find($id);

      if (!$genre) {
         return response()->json([
            'success' => false,
            'message' => 'Resource not found'
         ], 404);
      }

      $genre->delete();

      return response()->json([
         'success' => true,
         'message' => 'Genre deleted successfully'
      ], 200);
   }

}
