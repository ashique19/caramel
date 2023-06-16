@extends('admin.layout')

@section('title')Cost type - {{ settings()->application_name }} @stop

@section('main')

<main class="column is-12 padding-0 columns is-multiline">

    <section class="column is-12-desktop is-12-mobile">
        
        <h1 class="title is-2">Cost types</h1>
        
    </section>

    <section class="column is-12-desktop is-12-mobile">
        
        {!! errors($errors) !!}
        
    </section>

    <section class="column is-12-desktop is-12-mobile has-text-centered">
        
        {!! Form::open([ 'url'=> action('Cost_types@store'), 'class'=> 'form' ]) !!}
        
        <div class="field has-addons">
            <p class="control">
                <span class="button yellow-bg has-text-uppercase font-weight-700">
                    <span>Add New :</span>
                </span>
            </p>
            <p class="control">
                <input class="input" type="text" placeholder="name" name="name">
            </p>
            <p class="control">
                <button type="submit" class="button yellow-bg has-text-uppercase font-weight-700">
                    <span>Save</span>
                </button>
            </p>
        </div>
        
        {!! Form::close() !!}
    
    </section>
    
    <section class="column is-12-desktop is-12-mobile">
        
        <h2 class="subtitle is-4">Existing Cost Types</h2>
        
        
        <ul>
            
            @if( count( $cost_types ) > 0 )
            @foreach( $cost_types as $cost_type )
            <li class="margin-bottom-5">
                {!! Form::open([ 'url'=> action('Cost_types@update', $cost_type->id), 'method'=>'PATCH', 'class'=> 'form' ]) !!}

                <div class="field has-addons">
                    <p class="control">
                        <input class="input" type="text" placeholder="name" name="name" value="{{ $cost_type->name }}" required />
                    </p>
                    <p class="control">
                        <button type="submit" class="button yellow-bg has-text-uppercase font-weight-700">
                            <span>Save Changes</span>
                        </button>
                    </p>
                </div>
                
                {!! Form::close() !!}
            </li>
            @endforeach
            @endif
            
        </ul>
        
        
</main>        

@stop