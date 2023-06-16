<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\bkashTransactionCheck;
use App\Http\Controllers\Controller;

class StaticPageController extends Controller
{
    
    public function home()
    {
        
        $categories = \App\Category::orderBy('display_order')->get();
        
        return view('public.pages.home', compact('categories') );
        
    }
    
    
    public function contact()
    {
        
        return view('public.pages.contact-us');
        
    }
    
    
    public function privacy()
    {
        
        return view('public.pages.contact-us');
        
    }
    
    
    public function terms()
    {
        
        return view('public.pages.contact-us');
        
    }
    
    
    public function postContact(Request $request)
    {
        
        $data = [
            'name'      => $request->input('name'),
            'email'     => $request->input('email'),
            'phone'     => $request->input('phone'),
            'message'   => $request->input('message'),
        ];
        
        $mails = new \App\Http\Controllers\Mails;
        
        $mails->contactToAdmin($data);
        
        return back()->withErrors(['success'=> 'Message has been received successfully.']);
        
    }
    
    
    public function showCategory($id)
    {
        
        $category = \App\Category::find($id);
        
        $products = $category ? $category->products()->published()->where('stock_quantity', '>', 0)->orderBy('display_order')->paginate(24) : null;
        
        if( auth()->user() )
        {
            
            if( is_array( auth()->user()->role, [1,2] ) )
            {
                
                $products = $category ? $category->products()->orderBy('display_order')->paginate(24) : null;
                
            }
            
        }
        
        $images = $category ? $category->images : null;
        
        return view('public.pages.category', compact('category', 'products', 'images') );
        
    }
    
    
    public function showTag($id)
    {
        
        return \App\Tag::find($id);
        
    }
    
    
    public function showProduct($id)
    {
        
        return view('public.pages.product', ['product' => \App\Product::find($id), 'images' => \App\Product::find($id)->images, 'related_products' => \App\Product::find($id)->related_products ]);
        
    }
    
    
    /**
     * 
     * @table : products
     * 
     * @join : 'category_product' table if search includes categories
     * 
     * @join : 'product_tag' table if search includes tags
     * 
     * @search through : categories, tags, min price and max price
     * 
     */
    public function searchProducts(Request $request)
    {
        
        $products   = \DB::table('products');
        
        ($request->has('categories'))   ? $products = $products->join('category_product','category_product.product_id','=','products.id')->whereIn('category_product.category_id', $request->input('categories')) : false;
        ($request->has('tags'))         ? $products = $products->whereIn('product_tag.tag_id', $request->input('tags')) : false;
        ($request->has('min'))          ? $products = $products->join('product_tag','product_tag.product_id','=','products.id')->where('products.price', '>=', $request->input('min')) : false;
        ($request->has('max'))          ? $products = $products->where('products.price', '<=', $request->input('max')) : false;
        
        $products   =   $products->select('products.*')->groupBy('products.id')->paginate(2);
        
        return view('public.pages.product-search', compact('products'));
        
    }
    
    
    public function orderPreview()
    {
        
        return view('public.pages.order-preview');
        
    }
    
    
    public function orderCheckout()
    {
        
        if(! auth()->user())
        {
            
            session(['redirect_to_checkout' => '1']);
            
            return redirect()->route('login')->withErrors('Please login to Checkout.');
            
        }
        
        session(['redirect_to_checkout' => '0']);
        
        return view('public.pages.order-checkout');
        
    }
    
    
    public function page($name, \App\Page $pages)
    {
        
        $page = $pages->where('name', $name)->first();
        
        $page = ($page) ? $page : $pages->find($name);
        
        return view('public.pages.page', compact('page') );
        
    }
    
    
    public function bkash(bkashTransactionCheck $request)
    {
        
        if($request->has('trxid'))
        {
            
            $transaction = file_get_contents('http://www.bkashcluster.com:9080/dreamwave/merchant/trxcheck/sendmsg?user=MEGAMART24&pass=meeM@t0437ie&msisdn=01787661401&trxid=4203151990');
            
            $transaction = (array) json_decode($transaction, true);
            
            $transaction = $transaction['transaction'];
            
            $status      = $transaction['trxStatus'];
            
            if($status == '0000')
            {
                
                if(session()->has('order_id'))
                {
                    
                    $order = \App\Order::find(session('order_id'));
                    
                    $order->order_status_id = 3;
                    
                    $order->save();
                    
                    session()->forget('order_id');
                    
                }
                
                return redirect()->action('Orders@status')->withErrors('Success! We will contact you shortly.');
                
            } else{
                
                return redirect()->action('Orders@status')->withErrors('Opppps! Something went wrong. Please try again later.');
                
            }
            
            
        } else{
            
            return back()->withErrors('Unexpected data was received. Please check your input and try again.');
            
        }
        
        
    }
    
    
    
    public function concerns()
    {
        
        return view('public.pages.concerns');
        
    }
    
    
    public function circulars()
    {
        
        $circulars = \App\Circular::latest()->paginate(30);
        
        return view('public.pages.circulars', compact('circulars') );
        
    }
    
    
    public function showCircular($id)
    {
        
        $circular = \App\Circular::find($id);
        
        return view('public.pages.circular-show', compact('circular'));
        
    }
    
    
    public function productSearch(Request $request)
    {
        
        $q = $request->has('q') ? $request->input('q') : '';
        
        $s = substr($q, 4) * 1 > 0 ? substr($q, 4) * 1 : $q * 1;
        
        if( $s > 0 )
        {
            
            $products = \App\Product::where('id','like', $s.'%')->select('id','name','price','category_id')->take(10)->get();

            return array_map(function($item){
                
                $category = \App\Category::find( $item['category_id'] );
                
                return [
                    'name'  => $item['name'],
                    'img'   => xs_link( $item['thumb_image'] ),
                    'price' => $item['price'],
                    'url'   => $category ? action('CategoryPublic@'. strtolower($category->name) .'Item', $item['id']) : ''
                ];
                
            }, \App\Product::where('id','like', $s.'%')->select('id','name','price','thumb_image','category_id')->take(10)->get()->toArray() );
            
        }
        
        return $q;
        
    }
    
    
}

        