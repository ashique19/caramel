<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\costsStoreRequest;
use App\Cost;

class Costs extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('admin.costs.index', ['costs'=> Cost::latest()->paginate(40)]);
        
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
        
        $result	=	new Cost;
      
        ($request->input('from'))  ? $result = $result->where('incurred_date', '>', $request->input('from').' 00:00:00') : false;
        ($request->input('to'))    ? $result = $result->where('incurred_date', '<', $request->input('to').' 23:59:59') : false;
    
		($request->input('id'))	?	$result = $result->where('id', $request->input('id')) : false;
		($request->input('name'))	?	$result = $result->where('name', 'like', '%'.$request->input('name').'%') : false;
		($request->input('cost_type_id'))	?	$result = $result->where('cost_type_id', $request->input('cost_type_id')) : false;
		($request->input('amount'))	?	$result = $result->where('amount', 'like', '%'.$request->input('amount').'%') : false;
		($request->input('note'))	?	$result = $result->where('note', 'like', '%'.$request->input('note').'%') : false;
		($request->input('incurred_date'))	?	$result = $result->where('incurred_date', 'like', '%'.$request->input('incurred_date').'%') : false;
        
        return view('admin.costs.index', ['costs'=> $result->latest()->paginate(40)]);
        
    }
    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.costs.create' );
            
    }
        
        

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(costsStoreRequest $request)
    {
        
        if( $request->hasFile('database') )
        {
            
            $data = [];
            
            if( $request->file( 'database' )->isValid() )
            {
                
                $file  = date('Ymdhis_').rand(1000, 9999).'.'.$request->file('database')->getClientOriginalExtension();
            
                $saved_file = $request->file('database')->move( public_path().'/temp-file/', $file);
                
                if( \Storage::exists( '/temp-file/'. $file ) )
                {
                    
                    $filedata = [];
                
                    \Excel::load( public_path().'/temp-file/'. $file , function($reader) use(&$filedata) {
                    
                        $filedata = (array) $reader->get()->toArray();
                    
                    });
                    
                    if( count( $filedata ) == 0 ) return back()->withErrors('File is empty');
                    
                    $header = array_map( function($v){ return strlen(cleanString($v)) > 0 ? cleanString($v) : false; }, ( array_keys( (array) $filedata[0]) ) );
                    
                    for( $i = 0; $i < count($filedata); $i++ )
                    {
                        
                        $d = (array) $filedata[$i];
                        
                        $d['cost_type_id'] = $request->input('cost_type_id');
                        
                        $data[] = $d;
                        
                    }
                    
                    \Storage::delete( '/temp-file/'. $file );
                    
                    // return $data;
                    
                }
                
                
                
            }
            
            if( count( $data ) > 0 )
            {
                // return $data;
                Cost::insert($data);
                
            }
            
        } else{
            
            $name = $request->input('name');

            $save_success = Cost::create($request->all());
            
        }
        // return Cost::all();
        
        return back()->withErrors('Request has been processed successfully');
        
        
    }
    
    
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    
        $cost = Cost::find($id); 
        
        return view('admin.costs.edit', compact('cost') );
        
    }
        
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(costsStoreRequest $request, $id)
    {
    
        $cost = Cost::find($id);
        
        
        $save_success = Cost::find($id)->update($request->all());
        
        
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
        
        $cost = Cost::find($id);
        
        
        if($cost)
        {
    
            if( $cost->delete() )
            {
            
                return redirect()->action('Costs@index')->withErrors('Data has been deleted successfully.');
            
            } else{
                
                return back()->withErrors('Failed to delete data. Please retry later.');
                
            }
        
        } else{
            
            return back()->withErrors('No data was found to delete. Please refresh the page and retry.');
            
        }
        
        
    }
        

}