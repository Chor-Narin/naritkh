<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreateProduct;
use App\Http\Controllers\AuthController;

#login
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
// API routes for products
Route::post('/products', [CreateProduct::class, 'create']);
Route::get('/products', [CreateProduct::class, 'getall']);