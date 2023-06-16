
@extends('admin.layout')

@section('title') Add new Category @stop

@section('main')

<h1 class="page-title">Add new category</h1>

<section class="col-sm-10 col-sm-offset-1 col-xs-12">

{!! errors($errors) !!}

</section>

<section class="col-sm-10 col-sm-offset-1 col-xs-12">

    {!! Form::open( ['url'=> action('Categories@store'), 'enctype'=>'multipart/form-data' ]) !!}

        
        <div class="form-group col-sm-6 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon" id="name">Name</span>
                {!! Form::text('name', old('name') , ['class'=>'form-control', 'aria-describedby'=> 'name']) !!}
            </div>
        </div>
                
        <div class="form-group col-sm-6 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon" id="name_slug">Name slug</span>
                {!! Form::text('name_slug', old('name_slug') , ['class'=>'form-control', 'aria-describedby'=> 'name_slug']) !!}
            </div>
        </div>
                
        <div class="form-group col-xs-12 text-center margin-up-20">
            {!! Form::submit('Save', ['class'=>'form-control btn btn-info']) !!}
        </div>
    
    {!! Form::close() !!}


</section>

@stop
        