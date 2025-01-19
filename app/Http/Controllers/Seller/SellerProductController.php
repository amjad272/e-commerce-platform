<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerProductController extends Controller
{
    public function index()
    {
        $authUserId = Auth::id();
        $stores = Store::where("user_id", $authUserId)->get();
        return view('seller.product.create', compact('stores'));
    }

    public function manage()
    {
        $currentSeller = Auth::id();
        $products = Product::where('seller_id', $currentSeller)->get();
        return view('seller.product.manage', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sku' => 'required|unique:products,sku',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'nullable|exists:subcategories,id',
            'store_id' => 'required|exists:stores,id',
            'regular_price' => 'required|numeric|min:0',
            'discounted_price' => 'nullable|numeric|min:0',
            'tax_rate' => 'required|numeric|max:100',
            'stock_quantity' => 'required|integer|min:0',
            'slug' => 'nullable|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = Product::create([
            'product_name' => $request->product_name,
            'description' => $request->description,
            'sku' => $request->sku,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'store_id' => $request->store_id,
            'regular_price' => $request->regular_price,
            'discounted_price' => $request->discounted_price,
            'tax_rate' => $request->tax_rate,
            'stock_quantity' => $request->stock_quantity,
            'slug' => $request->slug,
            'seller_id' => Auth::id(),
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description
        ]);

        if ($request->hasFile('images'))
            foreach ($request->file('images') as $file) {
                $path = $file->store('product_images', 'public');
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $path,
                    'is_primary' => false
                ]);
            }
        return redirect()->back()->with("message", "Product Added Successfully");

    }

    public function edit($id)
    {
        $product = Product::FindOrFail($id);

        return view('seller.product.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::FindOrFail($id);

        $validate = $request->validate([
            'product_name' => 'required|string|max:255',
            'sku' => 'required|unique:products,sku',
            'regular_price' => 'required|numeric|min:0',
            'discounted_price' => 'nullable|numeric|min:0',
            'tax_rate' => 'required|numeric|max:100',
            'stock_quantity' => 'required|integer|min:0'
        ]);

        $product->update($validate);

        return redirect()->back()->with("message", "Product Updated Successfully");
    }

    public function destroy($id)
    {
        Product::FindOrFail($id)->delete();

        return redirect()->back()->with("message", "Product Removed Successfully");

    }
}
