<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CreateProduct extends Controller
{
    public function create(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'nullable'
        ]);

        $createProduct = Product::create($validated);

        return response()->json([
            'message' => 'Product created successfully',
            'product' => $createProduct
        ], 201);
    }

    public function getall(){
        $product = [
            [
                "name" => 'coca-cola',
                "price" => 23,
                'description'=> 'I love coca-cola'
            ]
            ];

        return $product;
    }


}
