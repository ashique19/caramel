@extends('admin.layout')

@section('title')Order product - {{ settings()->application_name }} @stop

@section('main')

<h1 class="page-title">Order products @if( $order_products ) : {{ $order_products->total() }} @endif</h1>


<section class="col-sm-10 col-sm-offset-1 col-xs-12">
    
    {!! Form::open(['class'=>'form form-inline', 'method' =>'post', 'url'=> action('Order_products@searchIndex')]) !!} 
        <div class="form-group col-sm-3 col-xs-6 padding-5">
            {!! Form::label('id', 'Id: ') !!}
            {!! Form::text('id', old('id') , ['class'=>'form-control']) !!}
        </div>
            
        <div class="form-group col-sm-3 col-xs-6 padding-5">
            {!! Form::label('order_id', 'Order: ') !!}
            {!! Form::select('order_id', \App\Order::pluck('name', 'id'), old('order_id') , ['class'=>'form-control select2']) !!}
        </div>
            
        <div class="form-group col-sm-3 col-xs-6 padding-5">
            {!! Form::label('product_id', 'Product: ') !!}
            {!! Form::select('product_id', \App\Product::pluck('name', 'id'), old('product_id') , ['class'=>'form-control select2']) !!}
        </div>
            
        <div class="form-group col-sm-3 col-xs-6 padding-5">
            {!! Form::label('name', 'Name: ') !!}
            {!! Form::text('name', old('name') , ['class'=>'form-control']) !!}
        </div>
            
        <div class="form-group col-sm-3 col-xs-6 padding-5">
            {!! Form::label('quantity', 'Quantity: ') !!}
            {!! Form::text('quantity', old('quantity') , ['class'=>'form-control']) !!}
        </div>
            
        <div class="form-group col-sm-3 col-xs-6 padding-5">
            {!! Form::label('price', 'Price: ') !!}
            {!! Form::text('price', old('price') , ['class'=>'form-control']) !!}
        </div>
            
        <div class="form-group col-sm-3 col-xs-6 padding-5">
            {!! Form::label('value', 'Value: ') !!}
            {!! Form::text('value', old('value') , ['class'=>'form-control']) !!}
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
    
    <a href="{{action('Order_products@create')}}" class="btn btn-default pull-right btn-lg blue-border blue-text">Add new</a>

</section>
        
<section class="col-sm-10 col-sm-offset-1 col-xs-12">
    
    <table class="table table-responsive">
        <thead>
            <tr>
				<th class="blue-bg white-text">Id</th>
				<th class="blue-bg white-text">Order</th>
				<th class="blue-bg white-text">Product</th>
				<th class="blue-bg white-text">Name</th>
				<th class="blue-bg white-text">Product</th>
				<th class="blue-bg white-text">Quantity</th>
				<th class="blue-bg white-text">Price</th>
				<th class="blue-bg white-text">Value</th>
				<th class="blue-bg white-text">Last Modified</th>
                <th class="blue-bg white-text" width="50">More</th>
                <th class="blue-bg white-text" width="50"><i class="fa fa-trash-o fa-2x"></i></th>
            </tr>
        </thead>
        <tbody>
            @if($order_products)
                @foreach($order_products as $order_product)
                    <tr>
						<td>{{$order_product->id}}</td>
						<td>@if($order_product->order_id) {{$order_product->order_id->name}} @endif</td>
						<td>@if($order_product->product_id) {{$order_product->product_id->name}} @endif</td>
						<td>{{$order_product->name}}</td>
						<td><a href="{{$order_product->product_image}}" class="btn btn-default btn-xs">{!! thumb($order_product->product_image) !!}</a></td>
						<td>{{$order_product->quantity}}</td>
						<td>{{$order_product->price}}</td>
						<td>{{$order_product->value}}</td>
						<td>{{$order_product->updated_at->format('Y-M-d')}}</td>
                        <td>
                            <button type="button" 
                                    class="btn btn-default" 
                                    data-container="body" 
                                    data-toggle="popover" 
                                    data-placement="bottom"
                                    data-html="true"
                                    data-content="
                                        {!! views('Order_products', $order_product->id, '<span class=\'fa fa-expand\'></span>', ['class'=>'btn btn-default btn-rounded btn-block']) !!}
                                        {!! edits('Order_products', $order_product['id'], '<span class=\'fa fa-pencil\'></span>', ['class'=>'btn btn-default btn-rounded btn-block']) !!}
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
                                {!! deletes('Order_products', $order_product['id'], 'YES', ['class'=>'btn btn-default btn-rounded btn-block']) !!}
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
    {!! $order_products->render() !!}
</section>
        

@stop