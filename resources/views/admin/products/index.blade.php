@extends('admin.layout')

@section('title')Product - {{ settings()->application_name }} @stop

@section('main')

<h1 class="page-title">Products @if( $products ) : {{ $products->total() }} @endif</h1>


<section class="col-sm-10 col-sm-offset-1 col-xs-12">
    
    {!! Form::open(['class'=>'form form-inline', 'method' =>'post', 'url'=> action('Products@searchIndex')]) !!} 
        <div class="form-group col-sm-3 col-xs-6 padding-5">
            {!! Form::label('id', 'Id: ') !!}
            {!! Form::text('id', old('id') , ['class'=>'form-control']) !!}
        </div>
            
        <div class="form-group col-sm-3 col-xs-6 padding-5">
            {!! Form::label('name', 'Name: ') !!}
            {!! Form::text('name', old('name') , ['class'=>'form-control']) !!}
        </div>
            
        <div class="form-group col-sm-3 col-xs-6 padding-5">
            {!! Form::label('category_id', 'Category: ') !!}
            {!! Form::select('category_id', \App\Category::pluck('name', 'id'), old('category_id') , ['class'=>'form-control select2']) !!}
        </div>
            
        <div class="form-group col-sm-3 col-xs-6 padding-5">
            {!! Form::label('price', 'Price: ') !!}
            {!! Form::text('price', old('price') , ['class'=>'form-control']) !!}
        </div>
            
        <div class="form-group col-sm-3 col-xs-6 padding-5">
            {!! Form::label('display_order', 'Display order: ') !!}
            {!! Form::text('display_order', old('display_order') , ['class'=>'form-control']) !!}
        </div>
            
        <div class="form-group col-sm-3 col-xs-6 padding-5">
            {!! Form::label('is_published', 'Is published: ') !!}
            {!! Form::select('is_published', [ ''=>'-Select-','1'=>'Yes', '0'=>'No'], old('is_published') , ['class'=>'form-control']) !!}
        </div>
            
        <div class="form-group col-sm-3 col-xs-6 padding-5">
            {!! Form::label('stock_quantity', 'Stock quantity: ') !!}
            {!! Form::text('stock_quantity', old('stock_quantity') , ['class'=>'form-control']) !!}
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
    
    <a href="{{action('Products@create')}}" class="btn btn-default pull-right btn-lg blue-border blue-text">Add new</a>

</section>
        
<section class="col-sm-10 col-sm-offset-1 col-xs-12">
    
    <table class="table table-responsive">
        <thead>
            <tr>
				<th class="blue-bg white-text">Id</th>
				<th class="blue-bg white-text">Name</th>
				<th class="blue-bg white-text">Category</th>
				<th class="blue-bg white-text">Thumb</th>
				<th class="blue-bg white-text">Price</th>
				<th class="blue-bg white-text">Display order</th>
				<th class="blue-bg white-text">Published</th>
				<th class="blue-bg white-text">Stock quantity</th>
				<th class="blue-bg white-text">Note</th>
				<th class="blue-bg white-text">Last Modified</th>
                <th class="blue-bg white-text" width="50">More</th>
                <th class="blue-bg white-text" width="50"><i class="fa fa-trash-o fa-2x"></i></th>
            </tr>
        </thead>
        <tbody>
            @if($products)
                @foreach($products as $product)
                    <tr>
						<td>{{$product->id}}</td>
						<td>{{$product->name}}</td>
						<td>@if($product->category_id) {{$product->category_id->name}} @endif</td>
						<td><a href="{{$product->thumb_image}}" class="btn btn-default btn-xs">{!! thumb($product->thumb_image) !!}</a></td>
						<td>{{$product->price}}</td>
						<td>{{$product->display_order}}</td>
						<td>{{ yn($product->is_published) }}</td>
						<td>{{$product->stock_quantity}}</td>
						<td>{{$product->note}}</td>
						<td>{{$product->updated_at->format('Y-M-d')}}</td>
                        <td>
                            <button type="button" 
                                    class="btn btn-default" 
                                    data-container="body" 
                                    data-toggle="popover" 
                                    data-placement="bottom"
                                    data-html="true"
                                    data-content="
                                        {!! views('Products', $product->id, '<span class=\'fa fa-expand\'></span>', ['class'=>'btn btn-default btn-rounded btn-block']) !!}
                                        {!! edits('Products', $product['id'], '<span class=\'fa fa-pencil\'></span>', ['class'=>'btn btn-default btn-rounded btn-block']) !!}
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
                                {!! deletes('Products', $product['id'], 'YES', ['class'=>'btn btn-default btn-rounded btn-block']) !!}
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
    {!! $products->render() !!}
</section>
        

@stop