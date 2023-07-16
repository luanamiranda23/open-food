<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return response()->json($products);
    }

    public function show($code)
    {
        $product = Product::where('code', $code)->first();

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return response()->json($product);
    }

    public function update(Request $request, $code)
    {
        $product = Product::where('code', $code)->first();
    
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
    
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        // Atualize aqui os outros campos do produto conforme necessário
    
        $product->imported_t = now(); // Defina a data e hora de importação como o momento atual
    
        $product->save();
    
        return response()->json($product);
    }
    

    public function delete($code)
    {
        $product = Product::where('code', $code)->first();

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->status = 'trash';
        $product->save();

        return response()->json(['message' => 'Product deleted']);
    }
}
