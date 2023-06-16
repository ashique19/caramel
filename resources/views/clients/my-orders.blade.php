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
    <h1 class="title is-size-2 has-text-centered">MY ORDERS</h1>
    
    {!! errors( $errors ) !!}
    
    <table class="table is-narrow is-bordered">
        <thead>
            <tr>
                <th class="white-bg green-border pink-text text-center" width="100">Ordered date</th>
                <th class="white-bg green-border pink-text text-center">Products</th>
                <th class="white-bg green-border pink-text text-center" width="70">Subtotal</th>
                <th class="white-bg green-border pink-text text-center" width="70">Charge / Prepaid</th>
                <th class="white-bg green-border pink-text text-center" width="70">Discount</th>
                <th class="white-bg green-border pink-text text-center" width="70">Total</th>
                <th class="white-bg green-border pink-text text-center" width="70">Status</th>
            </tr>
        </thead>
        <tbody>
            @if( count($orders) > 0 )
            @foreach($orders as $order)
            <tr>
                <td>{{$order->order_date->format('M d, Y')}}</td>
                <td>
                    @if( $order->products()->count() > 0 )
                        @foreach( $order->products as $product )
                        <p class="inline-block margin-5">
                            <img src="{{ $product->product_image }}" alt="Image" class="image is-thumbnail is-pulled-left margin-right-10" width="70">
                            <span class="">BDT {{ $product->price }} x {{ $product->quantity }} piece(s)</span>
                            <span class="">= BDT{{ $product->value }}</span>
                        </p>
                        @endforeach
                    @endif
                </td>
                <td>{{$order->subtotal}}</td>
                <td>{{$order->charge}}</td>
                <td>{{$order->discount}}</td>
                <td>{{$order->total}}</td>
                <td>{{ $order->status }}</td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
    {!! $orders->render() !!}
    
</article>

@stop
        