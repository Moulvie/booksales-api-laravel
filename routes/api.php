<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');




// --------------------------------------------------------------------------
// Authenticated books
Route::middleware('auth:api')->group(function () {
    
    Route::middleware(['role:admin'])->group(function () {
        Route::apiResource('/books', BookController::class)->only(['store', 'destroy']);
        Route::post('/books/{id}', [BookController::class, 'update']);
    });  
});

Route::apiResource('/books', BookController::class)->only(['index', 'show']);




// ------------------------------------------------------------------------
// Authenticated genres
Route::middleware('auth:api')->group(function () {
    
    Route::middleware(['role:admin'])->group(function () {
        Route::post('/genres/{id}', [GenreController::class, 'update']);
        Route::apiResource('/genres', GenreController::class)->only(['store', 'destroy']);
    });

});

Route::apiResource('/genres', GenreController::class)->only(['index', 'show']);




// -----------------------------------------------------------------------
// Authenticated authors
Route::middleware('auth:api')->group(function () {
   
    Route::middleware(['role:admin'])->group(function () {
        Route::post('/authors/{id}', [AuthorController::class, 'update']);
        Route::apiResource('/authors', AuthorController::class)->only(['store', 'destroy']);
    });

});

Route::apiResource('/authors', AuthorController::class)->only(['index', 'show']);
