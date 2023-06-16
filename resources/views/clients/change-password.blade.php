@extends('public.layouts.layout')
@section('title')User Dashboard - {{ settings()->application_name }} {{ settings()->application_slogan }} @stop

@section('meta')
    <meta name="title" content="User Dashboard - {{ settings()->application_name }} {{ settings()->application_slogan }}">
    <meta name="description" content="User Dashboard for {{ settings()->application_name }} {{ settings()->application_slogan }}. Buy Fashion wear, Ornaments, Cosmetics, Designs & more. Free Shipping, 7 Day Returns & Cash on Delivery countrywide.">
    <meta name="keywords" content="Online Fashion Shopping Bangladesh: Fashion, Cosmetics, Ornaments">
@stop

@section('main')

@include('clients.partials.client-nav')

<section class="column is-9">
    <h1 class="title is-size-2 has-text-centered">CHANGE PASSWORD</h1>
    {!! errors( $errors ) !!}
    
    {!! Form::open(['role'=>'form', 'class'=>'form columns is-multiline', 'url'=>action('MyProfile@updatePassword'), 'enctype'=>'multipart/form-data']) !!}
    
    <div class="column is-12-mobile is-6-desktop is-offset-3-desktop">
    
    <div class="field has-addons">
        <div class="control">
            <a class="button is-warning">
            Old Password
            </a>
        </div>
        <div class="control is-expanded">
            <input name="oldpass" class="input" type="password" placeholder="Old Password">
        </div>
    </div>
    
    <div class="field has-addons">
        <div class="control">
            <a class="button is-warning">
            New Password
            </a>
        </div>
        <div class="control is-expanded">
            <input name="newpass" class="input" type="password" placeholder="New Password">
        </div>
    </div>
    
    <div class="field has-addons">
        <div class="control">
            <a class="button is-warning">
            Repeat Password
            </a>
        </div>
        <div class="control is-expanded">
            <input name="repeatpass" class="input" type="password" placeholder="Repeat Password">
        </div>
    </div>
    
    <div class="field">
        <div class="control has-text-centered">
            {!! Form::submit('Update', ['class'=>'button yellow-bg yellow-border']) !!}
        </div>
    </div>
    
    {!! Form::close() !!}
    
    </div>
    
</section>


@stop
        