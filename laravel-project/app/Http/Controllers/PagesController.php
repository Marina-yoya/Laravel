<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Support\Facades\View;

class PagesController extends Controller
{
    // public function home()
    // {
    //     return view('home');
    // }

    public function index()
    {
        $products = Product::all();
        View::share('products', $products); 
        return view('home', ['products' => $products]);

      
    }


}


