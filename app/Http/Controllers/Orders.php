<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ordersStoreRequest;
use App\Order;

class Orders extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('admin.orders.index', ['orders'=> Order::latest()->paginate(40)]);
        
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
        
        $result	=	new Order;
      
        ($request->input('from'))  ? $result = $result->where('created_at', '>', $request->input('from').' 00:00:00') : false;
        ($request->input('to'))    ? $result = $result->where('created_at', '<', $request->input('to').' 23:59:59') : false;
    
		($request->input('id'))	?	$result = $result->where('id', $request->input('id')) : false;
		($request->input('name'))	?	$result = $result->where('name', 'like', '%'.$request->input('name').'%') : false;
		($request->input('address'))	?	$result = $result->where('address', 'like', '%'.$request->input('address').'%') : false;
		($request->input('area'))	?	$result = $result->where('area', 'like', '%'.$request->input('area').'%') : false;
		($request->input('city'))	?	$result = $result->where('city', 'like', '%'.$request->input('city').'%') : false;
		($request->input('state'))	?	$result = $result->where('state', 'like', '%'.$request->input('state').'%') : false;
		($request->input('postcode'))	?	$result = $result->where('postcode', 'like', '%'.$request->input('postcode').'%') : false;
		($request->input('phone'))	?	$result = $result->where('phone', 'like', '%'.$request->input('phone').'%') : false;
		($request->input('email'))	?	$result = $result->where('email', 'like', '%'.$request->input('email').'%') : false;
		($request->input('subtotal'))	?	$result = $result->where('subtotal', 'like', '%'.$request->input('subtotal').'%') : false;
		($request->input('charge'))	?	$result = $result->where('charge', 'like', '%'.$request->input('charge').'%') : false;
		($request->input('discount'))	?	$result = $result->where('discount', 'like', '%'.$request->input('discount').'%') : false;
		($request->input('total'))	?	$result = $result->where('total', 'like', '%'.$request->input('total').'%') : false;
		($request->input('order_date'))	?	$result = $result->where('order_date', 'like', '%'.$request->input('order_date').'%') : false;
		($request->input('dispatch_date'))	?	$result = $result->where('dispatch_date', 'like', '%'.$request->input('dispatch_date').'%') : false;
		($request->input('expected_delivery_date'))	?	$result = $result->where('expected_delivery_date', 'like', '%'.$request->input('expected_delivery_date').'%') : false;
		($request->input('actual_delivery_date'))	?	$result = $result->where('actual_delivery_date', 'like', '%'.$request->input('actual_delivery_date').'%') : false;
		($request->input('status'))	?	$result = $result->where('status', 'like', '%'.$request->input('status').'%') : false;
		($request->input('note'))	?	$result = $result->where('note', 'like', '%'.$request->input('note').'%') : false;
        
        return view('admin.orders.index', ['orders'=> $result->latest()->paginate(40)]);
        
    }
    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.orders.create' );
            
    }
        
        

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ordersStoreRequest $request)
    {
        
        
        $save_success = Order::create($request->all());
        
        
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
    
        $order = Order::find($id); 
        
        return view('admin.orders.edit', compact('order') );
        
    }
        
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ordersStoreRequest $request, $id)
    {
    
        $order = Order::find($id);
        
        
        $save_success = Order::find($id)->update($request->all());
        
        
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
        
        $order = Order::find($id);
        
        
        if($order)
        {
    
            if( $order->delete() )
            {
            
                return back()->withErrors('Data has been deleted successfully.');
            
            } else{
                
                return back()->withErrors('Failed to delete data. Please retry later.');
                
            }
        
        } else{
            
            return back()->withErrors('No data was found to delete. Please refresh the page and retry.');
            
        }
        
        
    }
        

}