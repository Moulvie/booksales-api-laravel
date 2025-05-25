<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');




Route::post('/books/{id}', [BookController::class, 'update']);
Route::apiResource('/books', BookController::class);


Route::post('/genres/{id}', [GenreController::class, 'update']);
Route::apiResource('/genres', GenreController::class);


Route::post('/authors/{id}', [AuthorController::class, 'update']);
Route::apiResource('/authors', AuthorController::class);
