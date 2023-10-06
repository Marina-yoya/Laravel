<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\View;

class ViewAllProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        View::share('products', $products); 
        return view('view_all_products', ['products' => $products]);
      
    }
}