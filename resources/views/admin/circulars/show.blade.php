@extends('admin.layout')

@section('title') Job Circular @stop

@section('main')

@if( $circular )

<section class="hero is-fullheight is-primary is-bold">
    <div class="hero-body">
        <div class="container">
            
            <a href="{{ action('Circulars@index') }}" class="tag is-primary is-pulled-right">Back to Circulars</a>
            <nav class="level">
                <div class="level-item level-left">
                    <h1 class="title is-1">Title: {{ $circular->name }}</h1>
                </div>
            </nav>
            <nav class="level">
                <div class="level-item level-left">
                    <h2 class="subtitle is-3">Deadline: {{ $circular->deadline_date->format('Y-m-d') }}</h2>
                </div>
            </nav>
            
            <section class="columns is-multiline">
                {!! errors($errors) !!}
            </section>
            
            <div class="column is-12">
                
                {!! $circular->circular_detail !!}
                
            </div>
            
        </div>
    </div>
</section>

@endif

@stop
        