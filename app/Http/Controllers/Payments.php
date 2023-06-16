<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\paymentsStoreRequest;
use App\Payment;

class Payments extends Controller
{
    
    use \App\Http\Traits\SingleFile,
        \App\Http\Traits\MultiFiles,
        \App\Http\Traits\SingleImage,
        \App\Http\Traits\MultiImages;
    
    


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('admin.payments.index', ['payments'=> Payment::latest()->paginate(40)]);
        
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
        
        $result	=	new Payment;
      
        ($request->input('from'))  ? $result = $result->where('created_at', '>', $request->input('from').' 00:00:00') : false;
        ($request->input('to'))    ? $result = $result->where('created_at', '<', $request->input('to').' 23:59:59') : false;
    
		($request->input('id'))	?	$result = $result->where('id', $request->input('id')) : false;
		($request->input('name'))	?	$result = $result->where('name', 'like', '%'.$request->input('name').'%') : false;
		($request->input('due_date'))	?	$result = $result->where('due_date', 'like', '%'.$request->input('due_date').'%') : false;
		($request->input('payment_date'))	?	$result = $result->where('payment_date', 'like', '%'.$request->input('payment_date').'%') : false;
		($request->input('is_paid'))	?	$result = $result->where('is_paid', $request->input('is_paid')) : false;
        
        return view('admin.payments.index', ['payments'=> $result->latest()->paginate(40)]);
        
    }
    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.payments.create' );
            
    }
        
        

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
        $payment = Payment::find($id);
        
        return view('admin.payments.show', compact('payment') );
            
    }
        
        

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(paymentsStoreRequest $request)
    {
        
                
        $request['attachment_file'] = $this->storeFile($request, 'attachment_files', 'attachment');

        
        $save_success = Payment::create($request->all());
        
        
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
    
        $payment = Payment::find($id); 
        
        return view('admin.payments.edit', compact('payment') );
        
    }
        
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(paymentsStoreRequest $request, $id)
    {
    
        $payment = Payment::find($id);
        
            
        $request['attachment_file'] = $this->updateFile($request, $payment, 'attachment_files', 'attachment_file', 'attachment', 'attachment_file_delete' );
                
        
        $save_success = Payment::find($id)->update($request->all());
        
        
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
        
        $payment = Payment::find($id);
        
        
        if($payment)
        {
            
            $this->deleteFile($payment, 'attachment_file');
        
    
            if( $payment->delete() )
            {
            
                return redirect()->action('Payments@index')->withErrors('Data has been deleted successfully.');
            
            } else{
                
                return back()->withErrors('Failed to delete data. Please retry later.');
                
            }
        
        } else{
            
            return back()->withErrors('No data was found to delete. Please refresh the page and retry.');
            
        }
        
        
    }
        

}