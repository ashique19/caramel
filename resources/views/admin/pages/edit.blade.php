@extends('admin.layout')

@section('title') Edit Pages @stop

@section('main')

<section class="hero is-fullheight is-primary is-bold">
    <div class="hero-body">
        <div class="container">
            
            <nav class="level">
                <div class="level-item level-left">
                    <div>
                        <h1 class="title is-1">Edit {{ $page ? $page->name : "" }}</h1>
                    </div>
                </div>
            </nav>
            
            <section class="columns is-multiline">
                
                <div class="column is-12">
                    
                    {!! errors( $errors ) !!}
                    
                </div>
                
                <div class="column is-12">
                    {!! Form::open( ['method'=>'patch', 'url'=> action('Pages@update', $page->id), 'enctype'=>'multipart/form-data', 'class'=> 'columns is-multiline' ]) !!}
                        
                        <div class="field column is-6-desktop is-12-mobile">
                            <label class="label has-text-left padding-left-0">Name:</label>
                            <div class="control">
                                {!! Form::text('name', $page->name , ['class'=>'input']) !!}
                            </div>
                        </div>
                        
                        <div class="field column is-6-desktop is-12-mobile">
                            <label class="label has-text-left padding-left-0">Meta tag title:</label>
                            <div class="control">
                                {!! Form::text('meta_tag_title', $page->meta_tag_title , ['class'=>'input']) !!}
                            </div>
                        </div>
                        
                        <div class="field column is-6-desktop is-12-mobile">
                            <label class="label has-text-left padding-left-0">Meta tag description:</label>
                            <div class="control">
                                {!! Form::text('meta_tag_description', $page->meta_tag_description , ['class'=>'input']) !!}
                            </div>
                        </div>
                        
                        <div class="field column is-6-desktop is-12-mobile">
                            <label class="label has-text-left padding-left-0">Meta tag keywords:</label>
                            <div class="control">
                                {!! Form::text('meta_tag_keywords', $page->meta_tag_keywords , ['class'=>'input']) !!}
                            </div>
                        </div>
                        
                        <div class="field column is-12-mobile">
                            <label class="label has-text-left padding-left-0">Details:</label>
                            <div class="control">
                                {!! Form::textarea('details', $page->details , ['class'=>'textarea summernote']) !!}
                            </div>
                        </div>
                            
                        <div class="column is-12">
                            {!! Form::submit('Update Page', ['class'=>'button is-primary']) !!}
                        </div>
                    
                    {!! Form::close() !!}
                </div>
                
            </section>
        
        </div>
    </div>
</section>

@section('css') <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" type="text/css" /> @stop
@section('js')  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.min.js"></script> @stop

<script type="text/javascript">
    
    $('.summernote').summernote({
        height: 600
    });
    
</script>

@stop
        