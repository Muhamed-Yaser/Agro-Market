<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\WishlistItem;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(8);
        $sellers = User::where('role', 'seller')->latest()->paginate(9);

        return view('front.home', compact('products', 'sellers'));
    }

    public function favProducts()
    {
        $wishlistItems = WishlistItem::latest()->paginate(12);

        $productIds = $wishlistItems->pluck('product_id');

        $favs = Product::whereIn('id', $productIds)->latest()->get();

        return view('front.products.favProducts', compact('favs'));
    }
}
