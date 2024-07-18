<?php

namespace App\Http\Controllers\Front;

use App\Models\Product;
use App\Models\WishlistItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
     public function add(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $userId = auth()->id();
        $productId = $request->input('product_id');

        $wishlist = Wishlist::where('user_id', $userId)->firstOrCreate(['user_id' => $userId]);

        // Check if the product is already in the wishlist
        $existingItem = WishlistItem::where('wishlist_id', $wishlist->id)
                                    ->where('product_id', $productId)
                                    ->first();

        if ($existingItem) {
            // Item already exists, remove it
            $existingItem->delete();
        } else {

            $wishlistItem = new WishlistItem();
            $wishlistItem->wishlist_id = $wishlist->id;
            $wishlistItem->product_id = $productId;
            $wishlistItem->save();
        }

        return back();
    }

}
