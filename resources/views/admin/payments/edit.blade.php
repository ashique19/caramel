@extends('admin.layout')

@section('title')Modify Payment @stop

@section('main')

<main class="column is-12-desktop is-12-mobile padding-top-10 padding-bottom-20 columns is-multiline" >

    <!--Generated by Functions-->
    <section class="column is-12 padding-0">{!! breadcrumb('Payments', $payment->id) !!}</section>
    
    <section class="column is-12 padding-0">
    
        <h1 class="title is-3">Edit payment</h1>
    
    </section>
    
    <section class="column is-12 padding-0">{!! errors($errors) !!}</section>
    
    <section class="column is-12 padding-0 margin-top-30">
    
        {!! Form::open( ['url'=> action('Payments@update', $payment->id), 'method'=>'PATCH', 'enctype'=>'multipart/form-data' ]) !!}

        
                <div class="field is-horizontal has-addons">

                    <div class="field-label is-normal">
                        <label class="label has-text-left">Name</label>
                    </div>
                    
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                {!! Form::text('name', $payment->name , ['class'=>'input']) !!}
                            </div>
                        </div>
                    </div>
                    
                </div>  
                    
                <div class="field is-horizontal has-addons">
                
                    <div class="field-label is-normal">
                        <label class="label has-text-left">Due date</label>
                    </div>
                    
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                {!! Form::text('due_date', $payment->due_date , ['class'=>'input datepicker']) !!}
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                    
                <div class="field is-horizontal has-addons">
                
                    <div class="field-label is-normal">
                        <label class="label has-text-left">Payment date</label>
                    </div>
                    
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                {!! Form::text('payment_date', $payment->payment_date , ['class'=>'input datepicker']) !!}
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                    
                
                <div class="field is-horizontal has-addons">
                
                    <div class="field-label is-normal">
                        <label class="label has-text-left">Is paid</label>
                    </div>
                    
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <span class="select">
                                    {!! Form::select('is_paid', [ ''=>'-Select-','1'=>'Yes', '0'=>'No'], $payment->is_paid) !!}
                                </span>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label has-text-left">Payment details</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                {!! Form::textarea('payment_details', $payment->payment_details , ['class'=>'textarea summernote']) !!}
                            </div>
                        </div>
                    </div>
                </div> 
                    
                <div class="field is-horizontal has-addons">
                
                    <div class="field-label is-normal">
                        <label class="label has-text-left">Attachment file: </label>
                        <label class="label has-text-left">
                            <span class="badge badge-primary"><input type="checkbox" value="1" name="attachment_file_delete" /> remove old file</span>
                        </label>
                    </div>
                    
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                {!! Form::file('attachment_files' , ['class'=>'file']) !!}
                            </div>
                        </div>
                    </div>
                    
                </div>  
                    
        <div class="field is-grouped">
            <div class="control is-expanded">
                <button class="button is-success is-fullwidth" type="submit">Save</button>
            </div>
        </div>
    
    {!! Form::close() !!}


    </section>

</main>

@stop
        