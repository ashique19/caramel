
@extends('admin.layout')

@section('title') Add new Product @stop

@section('main')

<h1 class="page-title">Add new product</h1>

<section class="col-sm-10 col-sm-offset-1 col-xs-12">

{!! errors($errors) !!}

</section>

<section class="col-sm-10 col-sm-offset-1 col-xs-12">

    {!! Form::open( ['url'=> action('Products@store'), 'enctype'=>'multipart/form-data' ]) !!}

        
        <div class="form-group col-sm-6 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon" id="name">Name</span>
                {!! Form::text('name', old('name') , ['class'=>'form-control', 'aria-describedby'=> 'name']) !!}
            </div>
        </div>
                
        <div class="form-group col-sm-6 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon" id="category_id">Category</span>
                {!! Form::select('category_id', \App\Category::orderBy('name')->take(100)->get()->pluck('name', 'id')->toArray(), old('category_id') , ['class'=>'form-control select2', 'aria-describedby'=> 'category_id' ]) !!}
            </div>
        </div>
                
        <div class="form-group col-sm-6 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon" id="thumb_image">Thumb image</span>
                {!! Form::file('thumb_images', ['class'=>'form-control file', 'aria-describedby'=> 'thumb_image']) !!}
            </div>
        </div>
                
        <div class="form-group col-sm-6 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon" id="all_image[]">All images</span>
                {!! Form::file('all_image[]', ['class'=>'form-control file', 'multiple'=>'multiple', 'aria-describedby'=> 'all_images']) !!}
            </div>
        </div>
                
        <div class="form-group col-xs-12">
            {!! Form::label('product_detail', 'Product detail: ') !!}
            {!! Form::textarea('product_detail', old('product_detail') , ['class'=>'form-control summernote']) !!}
        </div>
                
        <div class="form-group col-sm-6 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon" id="price">Price</span>
                {!! Form::text('price', old('price') , ['class'=>'form-control', 'aria-describedby'=> 'price']) !!}
            </div>
        </div>
                
        <div class="form-group col-sm-6 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon" id="display_order">Display order</span>
                {!! Form::text('display_order', old('display_order') , ['class'=>'form-control', 'aria-describedby'=> 'display_order']) !!}
            </div>
        </div>
                
        <div class="form-group col-sm-6 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon" id="is_published">Published?</span>
                {!! Form::select('is_published', [ ''=>'-Select-','1'=>'Yes', '0'=>'No'], old('is_published') , ['class'=>'form-control', 'aria-describedby'=> 'is_published' ]) !!}
            </div>
        </div>
                
        <div class="form-group col-sm-6 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon" id="stock_quantity">Stock quantity</span>
                {!! Form::text('stock_quantity', old('stock_quantity') , ['class'=>'form-control', 'aria-describedby'=> 'stock_quantity']) !!}
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
        