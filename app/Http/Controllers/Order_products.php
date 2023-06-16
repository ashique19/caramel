<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\order_productsStoreRequest;
use App\Order_product;

class Order_products extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('admin.order_products.index', ['order_products'=> Order_product::latest()->paginate(40)]);
        
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
        
        $result	=	new Order_product;
      
        ($request->input('from'))  ? $result = $result->where('created_at', '>', $request->input('from').' 00:00:00') : false;
        ($request->input('to'))    ? $result = $result->where('created_at', '<', $request->input('to').' 23:59:59') : false;
    
		($request->input('id'))	?	$result = $result->where('id', $request->input('id')) : false;
		($request->input('order_id'))	?	$result = $result->where('order_id', $request->input('order_id')) : false;
		($request->input('product_id'))	?	$result = $result->where('product_id', $request->input('product_id')) : false;
		($request->input('name'))	?	$result = $result->where('name', 'like', '%'.$request->input('name').'%') : false;
		($request->input('quantity'))	?	$result = $result->where('quantity', 'like', '%'.$request->input('quantity').'%') : false;
		($request->input('price'))	?	$result = $result->where('price', 'like', '%'.$request->input('price').'%') : false;
		($request->input('value'))	?	$result = $result->where('value', 'like', '%'.$request->input('value').'%') : false;
        
        return view('admin.order_products.index', ['order_products'=> $result->latest()->paginate(40)]);
        
    }
    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.order_products.create' );
            
    }
        
        

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(order_productsStoreRequest $request)
    {
        
                
        $request['product_image'] = $this->storeImage($request, 'product_images', 'product');

        
        $save_success = Order_product::create($request->all());
        
        
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
    
        $order_product = Order_product::find($id); 
        
        return view('admin.order_products.edit', compact('order_product') );
        
    }
        
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(order_productsStoreRequest $request, $id)
    {
    
        $order_product = Order_product::find($id);
        
            
        $request['product_image'] = $this->updateImage($request, $order_product, 'product_images', 'product_image', 'product', 'product_image_delete');
        
        
        $save_success = Order_product::find($id)->update($request->all());
        
        
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
        
        $order_product = Order_product::find($id);
        
        
        if($order_product)
        {
            
            $this->deleteImage($order_product, 'product_image' );
            
    
            if( $order_product->delete() )
            {
            
                return redirect()->action('Order_products@index')->withErrors('Data has been deleted successfully.');
            
            } else{
                
                return back()->withErrors('Failed to delete data. Please retry later.');
                
            }
        
        } else{
            
            return back()->withErrors('No data was found to delete. Please refresh the page and retry.');
            
        }
        
        
    }
        

}