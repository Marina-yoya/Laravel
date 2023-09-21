<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function showProfile()
    {
        return view('profile');
    }


    public function store(Request $request)
    {

        $request->validate([
            'part_name' => 'required|string|max:255',
            'img_url' => 'required|string|max:255',
            'part_description' => 'required|string',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        $product = new Product();
        $product->user_id = auth()->user()->id;
        $product->part_name = $request->input('part_name');
        $product->img_url = $request->input('img_url');
        $product->part_description = $request->input('part_description');
        $product->category = $request->input('category');
        $product->price = $request->input('price');
        $product->save();

        return redirect()->route('my-products')->with('success', 'Product added successfully.');
    }

}