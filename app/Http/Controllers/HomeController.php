<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProduct = Product::with('primaryImage')->where('is_active', true)->first();
        $products = Product::with('primaryImage')->where('is_active', true)->take(6)->get();
        
        return view('home', compact('featuredProduct', 'products'));
    }
}
