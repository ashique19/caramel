@extends('public.layouts.layout')
@section('title'){{ $category ? $category->name : "Products" }} by {{ settings()->application_name }} - {{ settings()->application_slogan }} @stop
@section('main')

<div class="column is-12-desktop is-12-mobile slick margin-top-10 xs-margin-top-40 padding-bottom-10 has-text-uppercase" data-slick='{"infinite":true, "slidesToShow":1, "slidesToScroll":1, "speed":1500, "fade": true, "cssEase": "linear", "autoplay": true, "autoplaySpeed": 5000, "dots": false, "arrows": false }' >
      <h1 class="title font-size-22 xs-font-size-14 has-text-centered">{{ $products ? ( $products->total() > 0 ? $products->total() : "" ) : "" }} {{ str_plural( $category ? $category->name : "Product" ) }} in STOCK</h1>
      @if( strlen( $category->summary ) > 5 )
      @foreach( explode( '|', $category->summary ) as $summary )
      <h2 class="title is-size-4 has-text-centered">{{ trim( $summary ) }}</h2>
      @endforeach
      @endif
</div>

{!! errors($errors) !!}

@include('public.partials.category-sidebar')

<section class="column is-10-desktop is-12-mobile columns is-multiline">
  
  @if( $category )
  
  @include('public.partials.category-edit-button')
  
  @if( $product )
  <main class="column is-12-desktop is-12-mobile columns is-multiline">
    
    <article class="column is-4-desktop is-12-mobile has-text-left">
      <h2 class="title has-text-uppercase">{{ $product->name }}</h2>
      <h3 class="subtitle has-text-uppercase">
        <span class="yellow-text">Price: {{ $product->price }} BDT</span>
      </h3>
      
      @if( auth()->user() )
      @if( in_array( auth()->user()->role, [1,2] ) )
        
        @if( $product->stock_quantity > 0 )
        <button class="tag is-success font-weight-700 has-text-uppercase is-pulled-right">BUY NOW</button>
        <span class="tag is-success font-weight-700 has-text-uppercase is-pulled-right">AVAILABLE</span>
        @else
        <span class="tag is-danger font-weight-700 has-text-uppercase is-pulled-right">STOCK OUT</span>
        @endif
        
      @endif
      @endif
      
      @include('public.partials.product-edit-button')
      <div class="box transparent-bg white-text padding-left-0 padding-right-0 content">
        {!! $product->product_detail !!}
      </div>
      
    </article>
    
    <aside class="column is-8-desktop is-12-mobile slick" data-slick='{"infinite":true, "arrows": false, "slidesToShow":1, "slidesToScroll":1, "speed":1500, "fade": true, "cssEase": "linear", "autoplay": true, "autoplaySpeed": 2000, "lazyLoad": "ondemand", "centerMode": true, "arrows": false }'>
      <img src="{{ $product->thumb_image }}" alt="{{ $product->name }} image" class="image">
      @if( count( $product->all_images ) > 0 )
      @foreach( $product->all_images as $img )
      <img src="{{ $img }}" alt="{{ $product->name }} image" class="image"> 
      @endforeach
      @endif
    </aside>
    
    @if( $category && count( $products ) > 0  )
    <aside class="column is-12">
      <h2 class="subtitle is-1">
        <span class="yellow-text font-weight-700 has-text-uppercase xs-font-size-16">MORE {{ $category->name }}</span>
      </h2>
    </aside>
    @endif
    
  </main>
  @endif
  
  @if( $products->count() > 0 )
  @foreach( $products as $product )
  
  @include('public.partials.product-thumb')
  
  @endforeach
  
  <div class="column is-12 black-text">
  
  {!! $products->render() !!}
  
  </div>
  
  @endif
  
  @endif
  

</section>

@stop
        