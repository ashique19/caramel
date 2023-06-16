@extends('public.layouts.layout')
@section('title')User Dashboard - {{ settings()->application_name }} {{ settings()->application_slogan }} @stop

@section('meta')
    <meta name="title" content="User Dashboard - {{ settings()->application_name }} {{ settings()->application_slogan }}">
    <meta name="description" content="User Dashboard for {{ settings()->application_name }} {{ settings()->application_slogan }}">
    <meta name="keywords" content="Online Fashion Shopping Bangladesh: Fashion, Cosmetics, Ornaments">
@stop

@section('main')

@include('clients.partials.client-nav')

<article class="column is-9">
    <h1 class="title is-size-2 has-text-centered">MY PROFILE</h1>
    
    {!! errors( $errors ) !!}
    
    <table class="table is-bordered">
        <thead>
            <tr>
                <th width="150"><img src="{{auth()->user()->user_photo}}" alt="auth()->user()->name" class="img-responsive img-rounded"></th>
                <th><h3>{{auth()->user()->name}}</h3></th>
            </tr>
        </thead>
        <tbody>
            <tr> <td><h5>Email</h5></td>            <td>{{auth()->user()->email}}</td> </tr>
            <tr> <td><h5>Contact</h5></td>          <td>{{auth()->user()->contact}}</td> </tr>
            <tr> <td><h5>Address</h5></td>          <td>{{auth()->user()->address}}</td> </tr>
            <tr> <td><h5>City</h5></td>             <td>{{auth()->user()->city}}</td> </tr>
            <tr> <td><h5>State</h5></td>            <td>{{auth()->user()->state}}</td> </tr>
            <tr> <td><h5>Postcode</h5></td>         <td>{{auth()->user()->postcode}}</td> </tr>
            <tr> <td><h5>Country</h5></td>          <td>{{auth()->user()->country ? auth()->user()->country->name : ""}}</td> </tr>
            <tr>
                <td></td>
                <td>
                    <a href="{{action('Clients@editProfile')}}" class="btn white-bg pink-border">Edit Profile</a>
                    <a href="{{action('Clients@changePassword')}}" class="btn white-bg green-border">Change Password</a>
                </td>
            </tr>
        </tbody>
    </table>
</article>


@stop
        