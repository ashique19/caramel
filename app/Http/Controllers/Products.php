<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\productsStoreRequest;
use App\Product;

class Products extends Controller
{
    
    use \App\Http\Traits\SingleImage;
    use \App\Http\Traits\MultiImages;


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('admin.products.index', ['products'=> Product::latest()->paginate(40)]);
        
    }
        
    /**
     * Searches the listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchIndex(Request $request)
    {
    
        $search = array_filter($request->all());
        unset($search['_token']);
        
        $result	=	new Product;
      
        ($request->input('from'))  ? $result = $result->where('created_at', '>', $request->input('from').' 00:00:00') : false;
        ($request->input('to'))    ? $result = $result->where('created_at', '<', $request->input('to').' 23:59:59') : false;
    
		($request->input('id'))	?	$result = $result->where('id', $request->input('id')) : false;
		($request->input('name'))	?	$result = $result->where('name', 'like', '%'.$request->input('name').'%') : false;
		($request->input('category_id'))	?	$result = $result->where('category_id', $request->input('category_id')) : false;
		($request->input('price'))	?	$result = $result->where('price', 'like', '%'.$request->input('price').'%') : false;
		($request->input('display_order'))	?	$result = $result->where('display_order', 'like', '%'.$request->input('display_order').'%') : false;
		($request->input('is_published'))	?	$result = $result->where('is_published', $request->input('is_published')) : false;
		($request->input('stock_quantity'))	?	$result = $result->where('stock_quantity', 'like', '%'.$request->input('stock_quantity').'%') : false;
		($request->input('note'))	?	$result = $result->where('note', 'like', '%'.$request->input('note').'%') : false;
        
        return view('admin.products.index', ['products'=> $result->latest()->paginate(40)]);
        
    }
    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.products.create' );
            
    }
        
        

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(productsStoreRequest $request)
    {
        
                
        $request['thumb_image'] = $this->storeImage($request, 'thumb_images', 'thumb');

                
        $request['all_images'] = $this->storeImages($request, 'all_image', 'all');

        
        $save_success = Product::create($request->all());
        
        
        if($save_success)
        {
        
            return back()->withErrors('Data has been stored successfully.');
        
        } else{
            
            return back()->withInput()->withErrors('Failed to store data. Please check data and retry.');
            
        }
    
    }
    
    
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    
        $product = Product::find($id); 
        
        return view('admin.products.edit', compact('product') );
        
    }
        
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $product = Product::find($id);
        
        $request['thumb_image'] = $this->updateImage($request, $product, 'thumb_images', 'thumb_image', 'thumb', 'thumb_image_delete');
        
            
        $request['all_images'] = $this->updateImages($request, $product, 'all_image', 'all_images', 'all', 'all_images_delete');
        
        
        $save_success = Product::find($id)->update($request->all());
        
        if($save_success)
        {
        
            return back()->withErrors('Data has been updated successfully.');
        
        } else{
            
            return back()->withInput()->withErrors('Failed to store data. Please check data and retry.');
            
        }
        
    }
        
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        
        $product = Product::find($id);
        
        
        if($product)
        {
            
            $this->deleteImage($product, 'thumb_image' );
            
        
            $this->deleteAllImages($product, 'all_images');
        
    
            if( $product->delete() )
            {
            
                return back()->withErrors('Data has been deleted successfully.');
            
            } else{
                
                return back()->withErrors('Failed to delete data. Please retry later.');
                
            }
        
        } else{
            
            return back()->withErrors('No data was found to delete. Please refresh the page and retry.');
            
        }
        
        
    }
    
    
    public function priceTag()
    {
        
        return view('admin.products.price-tag');
        
    }
    
    
    public function orderList()
    {
        
        return view('admin.products.order-list');
        
    }
    
    
    public function productList()
    {
        
        return view('admin.products.product-list', ['products' => \App\Product::orderBy('category_id')->paginate(50)]);
        
    }
    
    
    public function sync_purchase_price_to_orders()
    {
        
        if( !auth()->user()->role == 1 ) return back()->withErrors('Unauthorized operation.');
        
        foreach( \App\Product::all() as $product )
        {
            
            $product->orders()->update(['order_products.purchase_price'=> $product->purchase_price]);
            
        }
        
        return back()->withErrors('Purchase Price has been synced');
        
    }
    
    
    public function editAjax($id)
    {
        
        $product = Product::find($id);
        
        if( ! $product ) return "";
        
        return view('public.partials.edit-product-ajax', compact('product'));
        
    }
        

}