
@extends('admin.layout')

@section('css') <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" type="text/css" /> @stop
@section('js')  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.min.js"></script> @stop

@section('title') New Job Circular @stop

@section('main')

<section class="hero is-fullheight is-primary is-bold">
    <div class="hero-body">
        <div class="container">
            
            <a href="{{ action('Circulars@index') }}" class="tag is-primary is-pulled-right">Back to Circulars</a>
            <nav class="level">
                <div class="level-item level-left">
                    <div>
                        <h1 class="title is-1">Add Circular</h1>
                    </div>
                </div>
            </nav>
            
            <section class="columns is-multiline">
                {!! errors($errors) !!}
            </section>
            
            <div class="column is-12">
                
                {!! Form::open( ['url'=> action('Circulars@update', $circular->id), 'method'=> 'PATCH', 'enctype'=>'multipart/form-data', 'class'=>'columns is-multiline' ]) !!}

        
                    <div class="column form-group is-6-desktop is-12-mobile">
                        <div class="input-group">
                            <span class="input-group-addon" id="name">NAME</span>
                            {!! Form::text('name', $circular->name , ['class'=>'form-control', 'aria-describedby'=> 'name']) !!}
                        </div>
                    </div>
                            
                    <div class="column form-group is-6-desktop is-12-mobile">
                        <div class="input-group">
                            <span class="input-group-addon" id="deadline_date">DEADLINE</span>
                            {!! Form::text('deadline_date', $circular->deadline_date->format('Y-m-d') , ['class'=>'form-control datepicker', 'aria-describedby'=> 'deadline_date']) !!}
                        </div>
                    </div>
                            
                    <div class="column form-group is-12">
                        {!! Form::label('circular_detail', 'CIRCULAR DETAIL: ') !!}
                        {!! Form::textarea('circular_detail', $circular->circular_detail , ['class'=>'form-control summernote']) !!}
                    </div>
                            
                    <div class="column form-group is-12 has-text-right">
                        {!! Form::submit('Save', ['class'=>'button is-default']) !!}
                    </div>
                
                {!! Form::close() !!}
                
            </div>
            
        </div>
    </div>
</section>

<script type="text/javascript">
    
    $('.summernote').summernote({
        height: 600
    });
    
</script>

@stop
        