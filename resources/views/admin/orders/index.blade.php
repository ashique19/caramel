@extends('admin.layout')

@section('title')Order - {{ settings()->application_name }} @stop

@section('main')

<h1 class="page-title">Orders @if( $orders ) : {{ $orders->total() }} @endif</h1>


<section class="col-sm-10 col-sm-offset-1 col-xs-12">
    
    {!! Form::open(['class'=>'form form-inline', 'method' =>'post', 'url'=> action('Orders@searchIndex')]) !!} 
        <div class="form-group col-sm-3 col-xs-6 padding-5">
            {!! Form::label('id', 'Id: ') !!}
            {!! Form::text('id', old('id') , ['class'=>'form-control']) !!}
        </div>
            
        <div class="form-group col-sm-3 col-xs-6 padding-5">
            {!! Form::label('name', 'Name: ') !!}
            {!! Form::text('name', old('name') , ['class'=>'form-control']) !!}
        </div>
            
        <div class="form-group col-sm-3 col-xs-6 padding-5">
            {!! Form::label('address', 'Address: ') !!}
            {!! Form::text('address', old('address') , ['class'=>'form-control']) !!}
        </div>
            
        <div class="form-group col-sm-3 col-xs-6 padding-5">
            {!! Form::label('area', 'Area: ') !!}
            {!! Form::text('area', old('area') , ['class'=>'form-control']) !!}
        </div>
            
        <div class="form-group col-sm-3 col-xs-6 padding-5">
            {!! Form::label('city', 'City: ') !!}
            {!! Form::text('city', old('city') , ['class'=>'form-control']) !!}
        </div>
            
        <div class="form-group col-sm-3 col-xs-6 padding-5">
            {!! Form::label('state', 'State: ') !!}
            {!! Form::text('state', old('state') , ['class'=>'form-control']) !!}
        </div>
            
        <div class="form-group col-sm-3 col-xs-6 padding-5">
            {!! Form::label('postcode', 'Postcode: ') !!}
            {!! Form::text('postcode', old('postcode') , ['class'=>'form-control']) !!}
        </div>
            
        <div class="form-group col-sm-3 col-xs-6 padding-5">
            {!! Form::label('phone', 'Phone: ') !!}
            {!! Form::text('phone', old('phone') , ['class'=>'form-control']) !!}
        </div>
            
        <div class="form-group col-sm-3 col-xs-6 padding-5">
            {!! Form::label('email', 'Email: ') !!}
            {!! Form::text('email', old('email') , ['class'=>'form-control']) !!}
        </div>
            
        <div class="form-group col-sm-3 col-xs-6 padding-5">
            {!! Form::label('subtotal', 'Subtotal: ') !!}
            {!! Form::text('subtotal', old('subtotal') , ['class'=>'form-control']) !!}
        </div>
            
        <div class="form-group col-sm-3 col-xs-6 padding-5">
            {!! Form::label('charge', 'Charge: ') !!}
            {!! Form::text('charge', old('charge') , ['class'=>'form-control']) !!}
        </div>
            
        <div class="form-group col-sm-3 col-xs-6 padding-5">
            {!! Form::label('discount', 'Discount: ') !!}
            {!! Form::text('discount', old('discount') , ['class'=>'form-control']) !!}
        </div>
            
        <div class="form-group col-sm-3 col-xs-6 padding-5">
            {!! Form::label('total', 'Total: ') !!}
            {!! Form::text('total', old('total') , ['class'=>'form-control']) !!}
        </div>
            
        <div class="form-group col-sm-3 col-xs-6 padding-5">
            {!! Form::label('order_date', 'Order date: ') !!}
            {!! Form::text('order_date', old('order_date') , ['class'=>'form-control datepicker']) !!}
        </div>
            
        <div class="form-group col-sm-3 col-xs-6 padding-5">
            {!! Form::label('dispatch_date', 'Dispatch date: ') !!}
            {!! Form::text('dispatch_date', old('dispatch_date') , ['class'=>'form-control datepicker']) !!}
        </div>
            
        <div class="form-group col-sm-3 col-xs-6 padding-5">
            {!! Form::label('expected_delivery_date', 'Expected delivery date: ') !!}
            {!! Form::text('expected_delivery_date', old('expected_delivery_date') , ['class'=>'form-control datepicker']) !!}
        </div>
            
        <div class="form-group col-sm-3 col-xs-6 padding-5">
            {!! Form::label('actual_delivery_date', 'Actual delivery date: ') !!}
            {!! Form::text('actual_delivery_date', old('actual_delivery_date') , ['class'=>'form-control datepicker']) !!}
        </div>
            
        <div class="form-group col-sm-3 col-xs-6 padding-5">
            {!! Form::label('note', 'Note: ') !!}
            {!! Form::text('note', old('note') , ['class'=>'form-control']) !!}
        </div>
            
        <div class="form-group col-sm-3 col-xs-6">
            {!! Form::label('from', 'From: ') !!}
            {!! Form::text('from', old('from') , ['class'=>'form-control datepicker']) !!}
        </div>
        
        <div class="form-group col-sm-3 col-xs-6">
            {!! Form::label('to', 'To: ') !!}
            {!! Form::text('to', old('to') , ['class'=>'form-control datepicker']) !!}
        </div>
        
        <div class="form-group col-xs-12 text-center">
            {!! Form::submit('search', ['class'=>'btn btn-info']) !!}
        </div>
        
    {!! Form::close() !!}
    
    <hr>
</section>


<div class="col-sm-10 col-sm-offset-1 col-xs-12">
    
    {!! errors($errors) !!}
    
</div>

<section class="col-sm-10 col-sm-offset-1 col-xs-12">
    
    <a href="{{action('Orders@create')}}" class="btn btn-default pull-right btn-lg blue-border blue-text">Add new</a>

</section>
        
<section class="col-sm-10 col-sm-offset-1 col-xs-12">
    
    <table class="table table-responsive">
        <thead>
            <tr>
				<th class="blue-bg white-text">Id</th>
				<th class="blue-bg white-text">Name</th>
				<th class="blue-bg white-text">Address</th>
				<th class="blue-bg white-text">Area</th>
				<th class="blue-bg white-text">City</th>
				<th class="blue-bg white-text">State</th>
				<th class="blue-bg white-text">Postcode</th>
				<th class="blue-bg white-text">Phone</th>
				<th class="blue-bg white-text">Email</th>
				<th class="blue-bg white-text">Subtotal</th>
				<th class="blue-bg white-text">Charge</th>
				<th class="blue-bg white-text">Discount</th>
				<th class="blue-bg white-text">Total</th>
				<th class="blue-bg white-text">Order date</th>
				<th class="blue-bg white-text">Dispatch date</th>
				<th class="blue-bg white-text">Expected delivery date</th>
				<th class="blue-bg white-text">Actual delivery date</th>
				<th class="blue-bg white-text">Note</th>
				<th class="blue-bg white-text">Last Modified</th>
                <th class="blue-bg white-text" width="50">More</th>
                <th class="blue-bg white-text" width="50"><i class="fa fa-trash-o fa-2x"></i></th>
            </tr>
        </thead>
        <tbody>
            @if($orders)
                @foreach($orders as $order)
                    <tr>
						<td>{{$order->id}}</td>
						<td>{{$order->name}}</td>
						<td>{{$order->address}}</td>
						<td>{{$order->area}}</td>
						<td>{{$order->city}}</td>
						<td>{{$order->state}}</td>
						<td>{{$order->postcode}}</td>
						<td>{{$order->phone}}</td>
						<td>{{$order->email}}</td>
						<td>{{$order->subtotal}}</td>
						<td>{{$order->charge}}</td>
						<td>{{$order->discount}}</td>
						<td>{{$order->total}}</td>
						<td>{{$order->order_date->format('Y-M-d')}}</td>
						<td>{{$order->dispatch_date->format('Y-M-d')}}</td>
						<td>{{$order->expected_delivery_date->format('Y-M-d')}}</td>
						<td>{{$order->actual_delivery_date->format('Y-M-d')}}</td>
						<td>{{$order->note}}</td>
						<td>{{$order->updated_at->format('Y-M-d')}}</td>
                        <td>
                            <button type="button" 
                                    class="btn btn-default" 
                                    data-container="body" 
                                    data-toggle="popover" 
                                    data-placement="bottom"
                                    data-html="true"
                                    data-content="
                                        {!! views('Orders', $order->id, '<span class=\'fa fa-expand\'></span>', ['class'=>'btn btn-default btn-rounded btn-block']) !!}
                                        {!! edits('Orders', $order['id'], '<span class=\'fa fa-pencil\'></span>', ['class'=>'btn btn-default btn-rounded btn-block']) !!}
                                    ">
                                <i class="fa fa-gear"></i>
                            </button>
                        </td>
                        <td>
                            <a  tabindex="0" 
                                class="btn btn-lg btn-danger" 
                                role="button" 
                                data-toggle="popover" 
                                data-trigger="focus" 
                                data-html="true"
                                title="Delete" 
                                data-content="
                                <h4>Are you sure?</h4>
                                {!! deletes('Orders', $order['id'], 'YES', ['class'=>'btn btn-default btn-rounded btn-block']) !!}
                                <button class='btn btn-default btn-rounded btn-block'>NO</button>
                                ">
                                <i class='fa fa-trash-o fa-2x'></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {!! $orders->render() !!}
</section>
        

@stop