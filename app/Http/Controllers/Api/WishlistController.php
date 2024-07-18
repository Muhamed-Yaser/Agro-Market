<?php

namespace App\Http\Controllers\Api;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Wishlist;
use App\Models\WishlistItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class WishlistController extends Controller
{
    public function addToWishlist(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id'
        ]);

        $wishlist = Wishlist::firstOrCreate(['user_id' => auth()->id()]);

        $wishlistItem = $wishlist->items()->where('product_id', $request->product_id)->first();
        if ($wishlistItem) {
            return response()->json([
                'success' => false,
                'message' => 'Product is already in the wishlist'
            ], 400);
        } else {
            $wishlist->items()->create([
                'product_id' => $request->product_id
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Product added to wishlist successfully'
        ]);
    }

    public function getWishlist()
    {
        $wishlist = Wishlist::with('items.product')->where('user_id', auth()->id())->firstOrFail();

        $wishlistItems = $wishlist->items->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->product->name,
                'price' => $item->product->price,
                'image_url' => $item->product->product_image ? URL::to(Storage::url($item->product->product_image)) : null,
            ];
        });

        if ($wishlistItems->isEmpty()) {
            return response()->json([
                'message' => 'wishlist is empty'
            ], 200); // Wishlist is empty
        }

        return $wishlistItems;
    }

    public function removeWishlistItem($id)
    {
        $wishlistItem = Wishlist::where('id', $id)->whereHas('wishlist', function ($query) {
            $query->where('user_id', auth()->id());
        })->firstOrFail();

        $wishlistItem->delete();

        return response()->json([
            'success' => true,
            'message' => 'Wishlist item removed successfully'
        ]);
    }

    public function addAllToCart()
    {
        $userId = Auth::id();

        // Retrieve all favorite products for the user
        $wishlist = Wishlist::where('user_id', $userId)->first();

        if (!$wishlist) {
            return response()->json([
                'success' => false,
                'message' => 'No favorite products found'
            ], 404);
        }

        foreach ($wishlist->items as $favorite) {
            $cartItem = Cart::firstOrNew([
                'user_id' => $userId,
                'product_id' => $favorite->product_id,
            ]);

            $cartItem->quantity += 1;
            $cartItem->save();

            // Remove from wishlist after adding to cart
            $favorite->delete();
        }

        return response()->json([
            'success' => true,
            'message' => 'All favorite products added to cart successfully.'
        ]);
    }
}
