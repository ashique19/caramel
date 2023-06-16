@extends('public.layouts.layout')
@section('title')Contact Sundoritoma.com - Premium fashion items for woman @stop
@section('main')



<div class="column is-12-desktop is-12-mobile has-text-uppercase" >
    <h1 class="title is-size-4 has-text-centered margin-top-20">Contact {{ settings()->application_name }}</h1>
    
    {!! errors( $errors ) !!}
    
    {!! Form::open(['url'=> action('StaticPageController@postContact'), 'class'=> 'columns is-multiline']) !!}
    
    <section class="margin-top-40 column is-12-mobile is-4-desktop is-offset-4-desktop yellow-bg columns is-multiline padding-40 xs-margin-0">
    
      <div class="field column is-12-desktop is-12-mobile padding-bottom-0">
        <label class="label has-text-left padding-left-0">Name</label>
        <div class="control">
          <input name="name" class="input" type="text" placeholder="Name">
        </div>
      </div>
    
      <div class="field column is-12-desktop is-12-mobile padding-bottom-0">
        <label class="label has-text-left padding-left-0">Email</label>
        <div class="control">
          <input name="email" class="input" type="text" placeholder="Email">
        </div>
      </div>
    
      <div class="field column is-12-desktop is-12-mobile padding-bottom-0">
        <label class="label has-text-left padding-left-0">Phone</label>
        <div class="control">
          <input name="phone" class="input" type="text" placeholder="Phone number">
        </div>
      </div>
    
      <div class="field column is-12-desktop is-12-mobile padding-bottom-0">
        <label class="label has-text-left padding-left-0">Message</label>
        <div class="control">
          <textarea name="message" class="textarea" placeholder="Message"></textarea>
        </div>
      </div>
      
      
      <div class="field column is-12-desktop is-12-mobile padding-bottom-0">
        {!! Form::submit('Submit', ['class'=> 'button is-large yellow-bg yellow-border black-text font-weight-700']) !!}
      </div>
    
    </section>
    
    {!! Form::close() !!}
    
</div>

  

@stop
        