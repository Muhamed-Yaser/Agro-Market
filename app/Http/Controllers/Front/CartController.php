<?php

namespace App\Http\Controllers\Front;

use App\Models\Cart;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CartController extends Controller
{

    public function allProductsAndCart()
    {
        $allProducts = Product::latest()->paginate(10);

        $cartItems = CartItem::with('product')
            ->get();

        $cartItems = $cartItems->map(function ($item) {
            return [
                'product_id' => $item->product->id,
                'name' => $item->product->name,
                'price' => $item->product->price,
                'product_image' => url(Storage::url($item->product->product_image)),
                'quantity' => $item->quantity,
                'total_price' => $item->product->price * $item->quantity
            ];
        });

        // Calculate the total sum of the cart
        $totalSum = $cartItems->sum('total_price');

        return view('front.products.allProducts', compact('allProducts', 'cartItems', 'totalSum'));
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        // Check if the product is already in the cart
        $cartItem = CartItem::where('cart_id', 1)
            ->where('product_id', $request->product_id)
            ->first();

        if ($cartItem) {
            // If the product exists in the cart, increment the quantity
            $cartItem->increment('quantity', $request->quantity);
        } else {
            $cartItem = new CartItem([
                'cart_id' => 1,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity
            ]);
            $cartItem->save();
        }

        return response()->json([
            'success' => true,
            'message' => 'Product added to cart successfully'
        ]);
    }

    public function updateCartItem(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $cartItem = CartItem::where('product_id', $request->product_id)->firstOrFail();

        $cartItem->update([
            'quantity' => $request->quantity
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Product deleted from cart successfully'
        ]);
    }

    public function deleteFromCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $cartItem = CartItem::where('product_id', $request->product_id)->firstOrFail();

        $cartItem->delete();

        return response()->json([
            'success' => true,
            'message' => 'Product deleted from cart successfully'
        ]);
    }
}
