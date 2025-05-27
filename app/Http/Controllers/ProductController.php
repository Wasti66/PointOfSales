<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //create products
    function createProduct(Request $request){
        try{
            $user_id = $request->header('id');

            $img = $request->file('img');

            $t=time();
            $file_name = $img->getClientOriginalName();
            $img_name = "{$user_id}-{$t}-{$file_name}";
            $img_url = "images/products/{$img_name}";

            //upload file
            $img->move(public_path('images/products'),$img_name);
            Product::create([
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'unit' => $request->input('unit'),
                'category_id' => $request->input('category_id'),
                'img_url' => $img_url,
                'user_id' => $user_id
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'Product add successfully'
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'status' => 'failed',
                //'message' => 'Request failed'
                'message' => $e->getMessage()
            ], 200);
        }
        
    }
}
