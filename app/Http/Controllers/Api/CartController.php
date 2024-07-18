<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $cart = Cart::firstOrCreate(['user_id' => auth()->id()]);

        $cartItem = $cart->items()->where('product_id', $request->product_id)->first();
        if ($cartItem) {
            $cartItem->increment('quantity', $request->quantity);
        } else {
            $cart->items()->create([
                'product_id' => $request->product_id,
                'quantity' => $request->quantity
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Product added to cart successfully'
        ]);
    }

    public function getCart()
    {
        $cart = Cart::with('items.product')->where('user_id', auth()->id())->firstOrFail();
        $cartItems = $cart->items->map(function ($item) {
            return [
                'name' => $item->product->name,
                'price' => $item->product->price,
                'product_image' => url(Storage::url($item->product->product_image)),
                'quantity' => $item->quantity,
                'total_price' => $item->product->price * $item->quantity
            ];
        });
        $totalSum = $cartItems->sum('total_price');

        return response()->json(['cartItems' => $cartItems, 'totalSum' => $totalSum]);
    }

    public function updateCartItem(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $cart = Cart::where('user_id', auth()->id())->firstOrFail();
        $cartItem = $cart->items()->where('product_id', $request->product_id)->firstOrFail();
        $cartItem->update([
            'quantity' => $request->quantity,
            'message' => 'Product updated in cart successfully'
        ]);

        return response()->json(['success' => true, 'cartItem' => $cartItem]);
    }

    public function deleteFromCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $cart = Cart::where('user_id', auth()->id())->firstOrFail();
        $cartItem = $cart->items()->where('product_id', $request->product_id)->firstOrFail();
        $cartItem->delete();

        return response()->json([
            'success' => true,
            'message' => 'Product deleted from cart successfully'
        ]);
    }
}
