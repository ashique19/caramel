@extends('public.layouts.layout')
@section('title')Retrieve Password - Sundoritoma - Premium fashion items for woman @stop
@section('main')

<div class="column is-12-desktop is-12-mobile has-text-uppercase" >
    <h1 class="title is-size-4 has-text-centered">Retrive password for {{ settings()->application_name }}</h1>
    {!! Form::open(['url' => action('AccessController@postForgotPassword') ]) !!}
    
    <div class="column is-4-desktop is-12-mobile is-offset-4-desktop">
      
      {!! errors( $errors ) !!}
    
      <div class="field">
        <div class="control">
          <input name="recovery_email" class="input is-warning" type="text" placeholder="Enter your registered email address" required />
        </div>
      </div>
      
    </div>
    
    <div class="column is-4-desktop is-12-mobile is-offset-4-desktop padding-top-30 padding-bottom-50">
    
      <button type="submit" class="button is-large yellow-bg yellow-border black-text font-weight-700">
        Submit
      </button>
      
      <p class="has-text-centered white-text padding-top-30 padding-bottom-50 font-size-10">
        <a href="{{ route('signup') }}">Sign up</a> | <a href="{{ route('login') }}">Log in</a>
      </p>
    
    </div>
    
    {!! Form::close() !!}
    
</div>


@stop
        