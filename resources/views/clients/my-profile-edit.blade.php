@extends('public.layouts.layout')
@section('title')User Dashboard - {{ settings()->application_name }} {{ settings()->application_slogan }} @stop

@section('meta')
    <meta name="title" content="User Dashboard - {{ settings()->application_name }} {{ settings()->application_slogan }}">
    <meta name="description" content="User Dashboard for {{ settings()->application_name }} {{ settings()->application_slogan }}. Buy Fashion wear, Ornaments, Cosmetics, Designs & more. Free Shipping, 7 Day Returns & Cash on Delivery countrywide.">
    <meta name="keywords" content="Online Fashion Shopping Bangladesh: Fashion, Cosmetics, Ornaments">
@stop

@section('main')

@include('clients.partials.client-nav')

<article class="column is-9">
    
    <h1 class="title is-size-2 has-text-centered">EDIT PROFILE</h1>
    
    {!! errors( $errors ) !!}
    
    {!! Form::open(['role'=>'form', 'class'=>'form columns is-multiline', 'url'=>action('Clients@updateProfile'), 'enctype'=>'multipart/form-data']) !!}
        <div class="field column is-4-desktop is-12-mobile">
            <div class="control">
                {!! Form::text('firstname', auth()->user()->firstname, ['class'=>'input']) !!}
            </div>
        </div>
        <div class="field column is-4-desktop is-12-mobile">
            <div class="control">
                {!! Form::text('lastname', auth()->user()->lastname, ['class'=>'input']) !!}
            </div>
        </div>
        <div class="field column is-4-desktop is-12-mobile">
            <div class="control">
                {!! Form::text('email', auth()->user()->email, ['class'=> 'input']) !!}
            </div>
        </div>
        <div class="field column is-4-desktop is-12-mobile">
            <div class="control">
                {!! Form::text('contact', auth()->user()->contact , ['class'=>'input', 'placeholder'=> 'Enter your mobile no.']) !!}
            </div>
        </div>
        <div class="field column is-4-desktop is-12-mobile">
            <div class="control">
                {!! Form::text('address', auth()->user()->address , ['class'=>'input']) !!}
            </div>
        </div>
        <div class="field column is-4-desktop is-12-mobile">
            <div class="control">
                {!! Form::text('city', auth()->user()->city , ['class'=>'input', 'placeholder'=> 'e.g. Dhaka, Khulna, Chittagong etc.']) !!}
            </div>
        </div>
        <div class="field column is-4-desktop is-12-mobile">
            <div class="control">
                {!! Form::text('state', auth()->user()->state , ['class'=>'input', 'placeholder'=> 'e.g. Dhaka, Khulna, Chittagong etc.']) !!}
            </div>
        </div>
        <div class="field column is-4-desktop is-12-mobile">
            <div class="control">
                {!! Form::select('country_id', \App\Country::pluck('name', 'id'), auth()->user()->country_id , ['class'=>'input', 'placeholder'=> '-Select-']) !!}
            </div>
        </div>
        <div class="field column is-4-desktop is-12-mobile">
            <div class="control">
                {!! Form::text('postcode', auth()->user()->postcode , ['class'=>'input']) !!}
            </div>
        </div>
        <div class="file is-boxed column">
            <label class="file-label">
                <input class="file-input" type="file" name="picture">
                <span class="file-cta">
                    <span class="file-icon">
                    <i class="fas fa-upload"></i>
                    </span>
                    <span class="file-label">
                    Profile Image
                    </span>
                </span>
            </label>
        </div>
        <div class="field column is-12">
            <div class="control has-text-centered">
                {!! Form::submit('Update', ['class'=>'button yellow-bg']) !!}
            </div>
        </div>
    {!! Form::close() !!}
    
</article>

@stop
        