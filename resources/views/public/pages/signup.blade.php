@extends('public.layouts.layout')
@section('title')Sign up - Sundoritoma - Premium fashion items for woman @stop
@section('main')



<div class="column is-12-desktop is-12-mobile has-text-uppercase" >
    <h1 class="title is-size-4 has-text-centered">Sign up to {{ settings()->application_name }} with facebook</h1>
    
    {!! errors( $errors ) !!}
    
    <a href="{{ action('AccessController@social', 'facebook') }}" class="button is-large yellow-bg yellow-border black-text font-weight-700">
      Continue
    </a>
    
    <p class="has-text-centered white-text padding-top-30 padding-bottom-50 font-size-10">
      <a href="{{ route('login') }}">Log in</a> | <a href="{{ action('AccessController@forgotPassword') }}">Forgot Password</a>
    </p>
    
</div>
        

@stop
        