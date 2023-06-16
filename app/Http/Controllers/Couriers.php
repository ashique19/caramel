<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\couriersStoreRequest;
use App\Courier;

class Couriers extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('admin.couriers.index', ['couriers'=> Courier::latest()->paginate(40)]);
        
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
        
        $result	=	new Courier;
      
        ($request->input('from'))  ? $result = $result->where('created_at', '>', $request->input('from').' 00:00:00') : false;
        ($request->input('to'))    ? $result = $result->where('created_at', '<', $request->input('to').' 23:59:59') : false;
    
		($request->input('id'))	?	$result = $result->where('id', $request->input('id')) : false;
		($request->input('name'))	?	$result = $result->where('name', 'like', '%'.$request->input('name').'%') : false;
		($request->input('charge'))	?	$result = $result->where('charge', 'like', '%'.$request->input('charge').'%') : false;
		($request->input('cod_percentage'))	?	$result = $result->where('cod_percentage', 'like', '%'.$request->input('cod_percentage').'%') : false;
        
        return view('admin.couriers.index', ['couriers'=> $result->latest()->paginate(40)]);
        
    }
    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.couriers.create' );
            
    }
        
        

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(couriersStoreRequest $request)
    {
        
        
        $save_success = Courier::create($request->all());
        
        
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
    
        $courier = Courier::find($id); 
        
        return view('admin.couriers.edit', compact('courier') );
        
    }
        
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(couriersStoreRequest $request, $id)
    {
    
        $courier = Courier::find($id);
        
        
        $save_success = Courier::find($id)->update($request->all());
        
        
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
        
        $courier = Courier::find($id);
        
        
        if($courier)
        {
    
            if( $courier->delete() )
            {
            
                return redirect()->action('Couriers@index')->withErrors('Data has been deleted successfully.');
            
            } else{
                
                return back()->withErrors('Failed to delete data. Please retry later.');
                
            }
        
        } else{
            
            return back()->withErrors('No data was found to delete. Please refresh the page and retry.');
            
        }
        
        
    }
        

}