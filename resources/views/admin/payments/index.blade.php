@extends('admin.layout')

@section('title')Payment - {{ settings()->application_name }} @stop

@section('main')

<main class="column is-12-desktop is-12-mobile padding-top-10 padding-bottom-20 columns is-multiline" >

    <section class="column is-12-desktop is-12-mobile padding-0 margin-bottom-20">
        <h1 class="title is-3">
            Payments 
            <button type="button" class="button is-info is-small is-pulled-right" data-toggle="collapse" data-target="#search" >
                <i class="fas fa-search"></i>
            </button>
            <span class="button is-small is-white is-pulled-right">@if( $payments ) {{ $payments->total() }} Payments found @endif</span>
        </h1>
    </section>
    

    <section class="column is-12-desktop is-12-mobile padding-0 collapse fade" id="search">
    
    {!! Form::open(['method' =>'post', 'url'=> action('Payments@searchIndex'), 'class'=>'columns is-multiline']) !!} 
        <div class="field has-addons column is-3-desktop is-12-mobile">
            <div class="control">
                <a class="button is-info">
                Id
                </a>
            </div>
            <div class="control">
                {!! Form::text('id', old('id') , ['class'=>'input']) !!}
            </div>
        </div>
            
        <div class="field has-addons column is-3-desktop is-12-mobile">
            <div class="control">
                <a class="button is-info">
                Name
                </a>
            </div>
            <div class="control">
                {!! Form::text('name', old('name') , ['class'=>'input']) !!}
            </div>
        </div>
            
        <div class="field has-addons column is-3-desktop is-12-mobile">
            <div class="control">
                <a class="button is-info">
                Due date
                </a>
            </div>
            <div class="control">
                {!! Form::text('due_date', old('due_date') , ['class'=>'input datepicker']) !!}
            </div>
        </div>
        
            
        <div class="field has-addons column is-3-desktop is-12-mobile">
            <div class="control">
                <a class="button is-info">
                Payment date
                </a>
            </div>
            <div class="control">
                {!! Form::text('payment_date', old('payment_date') , ['class'=>'input datepicker']) !!}
            </div>
        </div>
        
            
        <div class="field has-addons column is-3-desktop is-12-mobile">
            <div class="control">
                <button type="button" class="button is-info">Is paid</button>
            </div>
            <div class="control is-expanded">
                <div class="select is-fullwidth">
                    {!! Form::select('is_paid', [ ''=>'-Select-','1'=>'Yes', '0'=>'No'], old('is_paid')) !!}
                </div>
            </div>
        </div>
            
        <div class="field has-addons column is-3-desktop is-12-mobile">
            <div class="control">
                <a class="button is-info">From</a>
            </div>
            <div class="control">
                {!! Form::text('from', old('from') , ['class'=>'input datepicker']) !!}
            </div>
        </div>
        
        <div class="field has-addons column is-3-desktop is-12-mobile">
            <div class="control">
                <a class="button is-info">To</a>
            </div>
            <div class="control">
                {!! Form::text('to', old('to') , ['class'=>'input datepicker']) !!}
            </div>
        </div>

        <div class="field is-horizontal column is-12-desktop is-12-mobile">
            <div class="field-body">
                <div class="field">
                    <div class="control has-text-centered">
                        <button class="button is-info" type="submit">Search</button>
                    </div>
                </div>
            </div>
        </div>
        
    {!! Form::close() !!}
    
    </section>


    <section class="column is-12-desktop is-12-mobile padding-0">{!! errors($errors) !!}</section>

    <section class="column is-12-desktop is-12-mobile padding-0">
        
        <a href="{{action('Payments@create')}}" class="is-white is-small has-text-dark is-pulled-right padding-top-5 padding-bottom-5 font-size-12">
            <i class="fas fa-plus margin-right-5"></i> add new
        </a>
    
    </section>
        
    <section class="column is-12-desktop is-12-mobile padding-0 scrollable">
        
        <table class="table is-bordered is-striped">
            <thead>
                <tr>
    				<th class="offwhite-bg font-weight-700">Id</th>
    				<th class="offwhite-bg font-weight-700">Name</th>
    				<th class="offwhite-bg font-weight-700">Due date</th>
    				<th class="offwhite-bg font-weight-700">Payment date</th>
    				<th class="offwhite-bg font-weight-700">Paid</th>
    				<th class="offwhite-bg font-weight-700">Last Modified</th>
                    <th class="offwhite-bg font-weight-700" width="50">More</th>
                    <th class="offwhite-bg font-weight-700" width="50"></th>
                </tr>
            </thead>
            <tbody>
                @if($payments)
                    @foreach($payments as $payment)
                        <tr>
    						<td>{{$payment->id}}</td>
    						<td>{{$payment->name}}</td>
    						<td>{{$payment->due_date->format('Y-M-d')}}</td>
    						<td>{{$payment->payment_date->format('Y-M-d')}}</td>
    						<td>{{ yn($payment->is_paid) }}</td>
    						<td>{{$payment->updated_at->format('Y-M-d')}}</td>
                            <td>
                                <button type="button" 
                                        class="button is-small is-warning" 
                                        data-container="body" 
                                        data-toggle="popover" 
                                        data-placement="top"
                                        data-trigger="focus"
                                        data-html="true"
                                        data-content='
                                            {!! views("Payments", $payment->id, 'Show', ["class"=>"button is-small is-dark"]) !!}
                                            {!! edits("Payments", $payment["id"], 'Modify', ["class"=>"button is-small is-info"]) !!}
                                        '>
                                    <i class="fas fa-cogs"></i>
                                </button>
                            </td>
                            <td>
                                <a  tabindex="0" 
                                    class="button is-small is-danger" 
                                    role="button" 
                                    data-toggle="popover" 
                                    data-trigger="focus" 
                                    data-html="true"
                                    data-placement="left"
                                    data-content='
                                        <div class="box">
                                            <h4>Remove permanently?</h4>
                                            <span class="buttons">
                                                {!! deletes("Payments", $payment["id"], "YES", ["class"=>"button is-small is-danger"]) !!}
                                                <button class="button is-small is-success">NO</button>
                                            </span>
                                        </div>
                                    '>
                                    <i class='fas fa-trash'></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {!! $payments->render() !!}
        
    </section>

</main>

@stop