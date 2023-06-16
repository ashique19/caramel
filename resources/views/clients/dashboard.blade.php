@extends('public.layouts.layout')
@section('title')Dashboard - {{ settings()->application_name }} {{ settings()->application_slogan }}@stop

@section('meta')
    <meta name="title" content="User Dashboard - {{ settings()->application_name }} {{ settings()->application_slogan }}">
    <meta name="description" content="User Dashboard for {{ settings()->application_name }} {{ settings()->application_slogan }}">
    <meta name="keywords" content="Online Fashion Shopping Bangladesh: Fashion, Cosmetics, Ornaments">
@stop

@section('main')

@include('clients.partials.client-nav')

<article class="column is-9">
        
    {!! errors($errors) !!}
    
    <h1 class="title is-1">
        {{ settings()->application_name }}
    </h1>
    <h2 class="subtitle">
        {{ settings()->application_slogan }}
    </h2>
        
</article>

@stop
        