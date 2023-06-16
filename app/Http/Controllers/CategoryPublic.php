<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Product;

class CategoryPublic extends Controller
{
    
    public function __call($name, $arg)
    {
        
        return $this->data($name, $arg);
        
    }
    
    
    private function data($name, $arg)
    {
        
        $name       = ends_with( $name, 'Item' ) ? substr( $name, 0, -4 ) : $name;
        
        $category   = Category::where('name_slug','like', $name)->first();
        
        $product    = $category && count( $arg ) > 0 ? $category->products()->published()->where('stock_quantity', '>', 0)->where('id', $arg[0])->first() : [];
        
        $products   = $category ? $category->products()->published()->where('stock_quantity', '>', 0)->paginate(40) : [];
        
        if( auth()->user() )
        {
            
            if( in_array( auth()->user()->role, [1,2] ) )
            {
                
                $product    = $category && count( $arg ) > 0 ? $category->products()->where('id', $arg[0])->first() : [];
                
                $products   = $category ? $category->products()->paginate(40) : [];
                
            }
            
        }
        
        
        if( auth()->user() )
        {
            
            if( in_array( auth()->user()->role, [1,2,3] ) )
            {
                
                $product    = $category && count( $arg ) > 0 ? $category->products()->where('id', $arg[0])->first() : [];
                
                $products = $category ? $category->products()->paginate(100) : [];
                
            }
            
        }
        // return $product;
        return view('public.pages.category', compact('category','products', 'product') );
        
    }
    
    
    
}
