
@extends('admin.layout')

@section('title') Add new Order product @stop

@section('main')

<h1 class="page-title">Add new order product</h1>

<section class="col-sm-10 col-sm-offset-1 col-xs-12">

{!! errors($errors) !!}

</section>

<section class="col-sm-10 col-sm-offset-1 col-xs-12">

    {!! Form::open( ['url'=> action('Order_products@store'), 'enctype'=>'multipart/form-data' ]) !!}

        
        <div class="form-group col-sm-6 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon" id="order_id">Order</span>
                {!! Form::select('order_id', \App\Order::orderBy('name')->take(100)->get()->pluck('name', 'id')->toArray(), old('order_id') , ['class'=>'form-control select2', 'aria-describedby'=> 'order_id' ]) !!}
            </div>
        </div>
                
        <div class="form-group col-sm-6 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon" id="product_id">Product</span>
                {!! Form::select('product_id', \App\Product::orderBy('name')->take(100)->get()->pluck('name', 'id')->toArray(), old('product_id') , ['class'=>'form-control product-search', 'aria-describedby'=> 'product_id' ]) !!}
            </div>
        </div>
                
        <div class="form-group col-sm-6 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon" id="name">Name</span>
                {!! Form::text('name', old('name') , ['class'=>'form-control', 'aria-describedby'=> 'name']) !!}
            </div>
        </div>
                
        <div class="form-group col-sm-6 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon" id="product_image">Product image</span>
                {!! Form::file('product_images', ['class'=>'form-control file', 'aria-describedby'=> 'product_image']) !!}
            </div>
        </div>
                
        <div class="form-group col-sm-6 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon" id="quantity">Quantity</span>
                {!! Form::text('quantity', old('quantity') , ['class'=>'form-control', 'aria-describedby'=> 'quantity']) !!}
            </div>
        </div>
                
        <div class="form-group col-sm-6 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon" id="price">Price</span>
                {!! Form::text('price', old('price') , ['class'=>'form-control', 'aria-describedby'=> 'price']) !!}
            </div>
        </div>
                
        <div class="form-group col-sm-6 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon" id="value">Value</span>
                {!! Form::text('value', old('value') , ['class'=>'form-control', 'aria-describedby'=> 'value']) !!}
            </div>
        </div>
                
        <div class="form-group col-xs-12 text-center margin-up-20">
            {!! Form::submit('Save', ['class'=>'form-control btn btn-info']) !!}
        </div>
    
    {!! Form::close() !!}


</section>

@stop
        