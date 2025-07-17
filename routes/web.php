<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CreateProduct;
Route::get('/', function () {
    return view('helloworld');
});

// Resource route - creates all CRUD routes automatically



// 