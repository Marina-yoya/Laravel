<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ViewAllProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('view_all_products', ['products' => $products]);
    }
}