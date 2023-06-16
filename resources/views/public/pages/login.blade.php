@extends('public.layouts.layout')
@section('title')Log in to Sundoritoma.com - Premium fashion items for woman @stop
@section('main')



<div class="column is-12-desktop is-12-mobile has-text-uppercase" >
    <!--<h1 class="title is-size-4 has-text-centered margin-top-50">Log in to {{ settings()->application_name }}</h1>-->
    
    {!! errors( $errors ) !!}
    
    <a href="{{ action('AccessController@social', 'facebook') }}" class="button yellow-bg yellow-border black-text font-weight-700 xs-font-size-12 is-radiusless xs-margin-bottom-10 margin-top-100 xs-margin-top-50">
      Log in with Facebook
    </a>
    
    {!! Form::open(['url'=> action('AccessController@postLogin'), 'class'=> 'columns is-multiline']) !!}
    
    <section class="margin-top-40 column is-12-mobile is-4-desktop is-offset-4-desktop columns is-multiline padding-40 xs-margin-0">
    
      <div class="field column is-12-desktop is-12-mobile padding-bottom-0">
        <label class="label has-text-left padding-left-0 yellow-text">Phone no. or Email</label>
        <div class="control">
          <input name="username_or_email" class="input" type="text" placeholder="Phone no. or Email">
        </div>
      </div>
      
      <div class="field column is-12-desktop is-12-mobile padding-bottom-0">
        <label class="label has-text-left padding-left-0 yellow-text">Password</label>
        <div class="control">
          <input name="password" class="input" type="password" placeholder="Password">
        </div>
      </div>
      
      <div class="field column is-12-desktop is-12-mobile padding-bottom-0">
        {!! Form::submit('Log in', ['class'=> 'button padding-left-20 padding-right-20 yellow-bg yellow-border black-text font-weight-700']) !!}
      </div>
    
    </section>
    
    {!! Form::close() !!}
    
    <p class="has-text-centered white-text padding-top-30 padding-bottom-50 font-size-10">
      <a href="{{ route('signup') }}">Sign up</a> | <a href="{{ action('AccessController@forgotPassword') }}">Forgot Password</a>
    </p>
</div>

  

@stop
        