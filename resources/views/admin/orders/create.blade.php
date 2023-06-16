
@extends('admin.layout')

@section('title') Add new Order @stop

@section('main')

<h1 class="page-title">Add new order</h1>

<section class="col-sm-10 col-sm-offset-1 col-xs-12">

{!! errors($errors) !!}

</section>

<section class="col-sm-10 col-sm-offset-1 col-xs-12">

    {!! Form::open( ['url'=> action('Orders@store'), 'enctype'=>'multipart/form-data' ]) !!}

        
        <div class="form-group col-sm-6 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon" id="name">Name</span>
                {!! Form::text('name', old('name') , ['class'=>'form-control', 'aria-describedby'=> 'name']) !!}
            </div>
        </div>
                
        <div class="form-group col-sm-6 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon" id="address">Address</span>
                {!! Form::text('address', old('address') , ['class'=>'form-control', 'aria-describedby'=> 'address']) !!}
            </div>
        </div>
                
        <div class="form-group col-sm-6 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon" id="area">Area</span>
                {!! Form::text('area', old('area') , ['class'=>'form-control', 'aria-describedby'=> 'area']) !!}
            </div>
        </div>
                
        <div class="form-group col-sm-6 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon" id="city">City</span>
                {!! Form::text('city', old('city') , ['class'=>'form-control', 'aria-describedby'=> 'city']) !!}
            </div>
        </div>
                
        <div class="form-group col-sm-6 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon" id="state">State</span>
                {!! Form::text('state', old('state') , ['class'=>'form-control', 'aria-describedby'=> 'state']) !!}
            </div>
        </div>
                
        <div class="form-group col-sm-6 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon" id="postcode">Postcode</span>
                {!! Form::text('postcode', old('postcode') , ['class'=>'form-control', 'aria-describedby'=> 'postcode']) !!}
            </div>
        </div>
                
        <div class="form-group col-sm-6 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon" id="phone">Phone</span>
                {!! Form::text('phone', old('phone') , ['class'=>'form-control', 'aria-describedby'=> 'phone']) !!}
            </div>
        </div>
                
        <div class="form-group col-sm-6 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon" id="email">Email</span>
                {!! Form::text('email', old('email') , ['class'=>'form-control', 'aria-describedby'=> 'email']) !!}
            </div>
        </div>
                
        <div class="form-group col-sm-6 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon" id="subtotal">Subtotal</span>
                {!! Form::text('subtotal', old('subtotal') , ['class'=>'form-control', 'aria-describedby'=> 'subtotal']) !!}
            </div>
        </div>
                
        <div class="form-group col-sm-6 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon" id="charge">Charge</span>
                {!! Form::text('charge', old('charge') , ['class'=>'form-control', 'aria-describedby'=> 'charge']) !!}
            </div>
        </div>
                
        <div class="form-group col-sm-6 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon" id="discount">Discount</span>
                {!! Form::text('discount', old('discount') , ['class'=>'form-control', 'aria-describedby'=> 'discount']) !!}
            </div>
        </div>
                
        <div class="form-group col-sm-6 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon" id="total">Total</span>
                {!! Form::text('total', old('total') , ['class'=>'form-control', 'aria-describedby'=> 'total']) !!}
            </div>
        </div>
                
        <div class="form-group col-sm-6 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon" id="order_date">Order date</span>
                {!! Form::text('order_date', old('order_date') , ['class'=>'form-control datepicker', 'aria-describedby'=> 'order_date']) !!}
            </div>
        </div>
                
        <div class="form-group col-sm-6 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon" id="dispatch_date">Dispatch date</span>
                {!! Form::text('dispatch_date', old('dispatch_date') , ['class'=>'form-control datepicker', 'aria-describedby'=> 'dispatch_date']) !!}
            </div>
        </div>
                
        <div class="form-group col-sm-6 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon" id="expected_delivery_date">Expected delivery date</span>
                {!! Form::text('expected_delivery_date', old('expected_delivery_date') , ['class'=>'form-control datepicker', 'aria-describedby'=> 'expected_delivery_date']) !!}
            </div>
        </div>
                
        <div class="form-group col-sm-6 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon" id="actual_delivery_date">Actual delivery date</span>
                {!! Form::text('actual_delivery_date', old('actual_delivery_date') , ['class'=>'form-control datepicker', 'aria-describedby'=> 'actual_delivery_date']) !!}
            </div>
        </div>
                
        <div class="form-group col-sm-6 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon" id="note">Note</span>
                {!! Form::text('note', old('note') , ['class'=>'form-control', 'aria-describedby'=> 'note']) !!}
            </div>
        </div>
                
        <div class="form-group col-xs-12 text-center margin-up-20">
            {!! Form::submit('Save', ['class'=>'form-control btn btn-info']) !!}
        </div>
    
    {!! Form::close() !!}


</section>

@stop
        