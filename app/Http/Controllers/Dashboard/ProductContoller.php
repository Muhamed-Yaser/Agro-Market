<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $products = auth()->user()->products()->latest()->paginate(7);
    return view('dashboard.products.index', compact('products'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.products.create');
    }

    public function store(Request $request)
{
    $request->validate(Product::rules());

    $data = $request->except('product_image');
    $data['product_image'] = $this->uploadImage($request);
    $data['user_id'] = auth()->id();
    $storeProduct = Product::create($data);

    if ($storeProduct) {
        return redirect()->route('products.index')->with('success', 'Product created!');
    }
}

    public function edit(Product $product)
    {
       
        if (auth()->id() !== $product->user_id) {
            abort(403);
        }

        return view('dashboard.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate(Product::rules($product->id));

        $data = $request->except('product_image');
        $newImage = $this->uploadImage($request);

        if ($newImage) {
            $data['product_image'] = $newImage;
            if ($product->product_image) {
                Storage::disk('public')->delete($product->product_image);
            }
        }

        // Update product
        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Product updated!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
{
    // Check ownership
    if (auth()->id() !== $product->user_id) {
        abort(403);
    }

    // Delete product image if exists
    if ($product->product_image) {
        Storage::disk('public')->delete($product->product_image);
    }

    // Delete the product
    if ($product->delete()) {
        return redirect()->route('products.index')->with('success', 'Product deleted!');
    }
}

    protected function uploadImage(Request $request)
    {
        if (!$request->hasFile('product_image')) return null;

        $file = $request->file('product_image');
        $path = $file->store('product_image', 'public');
        return $path;
    }

}
