<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class MyProductsController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        $products = Product::where('user_id', $user->id)->get();
        return view('my_products', ['products' => $products]);
    }

    public function edit($product_id)
    {
        $product = Product::findOrFail($product_id);
        return view('edit_product', compact('product'));
    }

    public function update(Request $request, $product_id)
    {
        $request->validate([
            'part_name' => 'required|string|max:255',
            'img_url' => 'required|string|max:255',
            'part_description' => 'required|string',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        $product = Product::findOrFail($product_id);
        $product->part_name = $request->input('part_name');
        $product->img_url = $request->input('img_url');
        $product->part_description = $request->input('part_description');
        $product->category = $request->input('category');
        $product->price = $request->input('price');
        $product->save();

        return redirect()->route('my-products')->with('success', 'Product updated successfully.');
    }

    public function delete($product_id)
    {
        $product = Product::findOrFail($product_id);
        $product->delete();
        return redirect()->route('my-products')->with('success', 'Product deleted successfully.');
    }


}