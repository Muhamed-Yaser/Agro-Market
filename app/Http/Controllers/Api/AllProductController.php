<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AllProductController extends Controller
{
    public function getAllProducts()
    {
        $products = Product::paginate(8);

        $products->getCollection()->transform(function ($product) {
            $product->product_image = URL::to(Storage::url($product->product_image));
            return $product;
        });

        return $products;
    }

    public function getProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->product_image = URL::to(Storage::url($product->product_image));

        return response()->json([
            'success' => true,
            'data' => $product
        ]);
    }
}
