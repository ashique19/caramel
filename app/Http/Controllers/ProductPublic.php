<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductPublic extends Controller
{
    
    public function index()
    {
        
        $products = Product::paginate(40);
        
        return view('public.pages.products', compact('products') );
        
    }
    
}
