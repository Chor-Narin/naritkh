<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreateProduct;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;


#login
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
// API routes for products
Route::post('/products', [CreateProduct::class, 'create']);
Route::get('/products', [CreateProduct::class, 'getall']);

// API routes for Post
Route::post('/post', [PostController::class, 'create']);
Route::get('/post', [PostController::class, 'get']);

//API routes for Comment

Route::get('/comments', [CommentController::class, 'index']);
Route::post('/comments', [CommentController::class, 'create']);
Route::get('/comments/{id}', [CommentController::class, 'show']);
Route::put('/comments/{id}', [CommentController::class, 'update']);
Route::delete('/comments/{id}', [CommentController::class, 'delete']);
