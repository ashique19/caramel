@extends('public.layouts.layout')
@section('title'){{ settings()->application_name }} - {{ settings()->application_slogan }} @stop
@section('main')

<div class="column is-12-desktop is-12-mobile slick margin-top-10 xs-margin-top-30 padding-bottom-10 has-text-uppercase" data-slick='{"infinite":true, "slidesToShow":1, "slidesToScroll":1, "speed":1500, "fade": true, "cssEase": "linear", "autoplay": true, "autoplaySpeed": 5000, "dots": false, "arrows": false }' >
    <a href="#">
      <h1 class="title is-size-4 has-text-centered"><span class="xs-font-size-14">{{ settings()->application_name }} - {{ settings()->application_slogan }}</span></h1>
    </a>
    <a href="#">
      <h2 class="title is-size-4 has-text-centered"><span class="xs-font-size-14">High quality material</span></h2>
    </a>
    <a href="#">
      <h2 class="title is-size-4 has-text-centered"><span class="xs-font-size-14">Genuin German Silver, Brass metal, Exclusive Beads...</span></h2>
    </a>
    <a href="#">
      <h2 class="title is-size-4 has-text-centered"><span class="xs-font-size-14">Free delivery inside Dhaka</span></h2>
    </a>
    <a href="#">
      <h2 class="title is-size-4 has-text-centered"><span class="xs-font-size-14">We deliver all over the world</span></h2>
    </a>
</div>


@if( count( $categories ) > 0 )
@foreach( $categories as $category )

@if( $category->products()->published()->count() > 0 )

<figure class="column is-3-desktop is-6-mobile">
  <a class="card" href="{{ action('CategoryPublic@'.$category->name_slug) }}">
    <div class="card-image">
      <figure class="image is-square thumb-holder">
        <img src="/public/img/settings/loading.gif" data-lazy="/public/img/categories/{{ $category->name }}.jpg" alt="{{ $category->name }}">
        <h2 class="has-text-centered font-size-16">{{ $category->name }}</h2>
      </figure>
    </div>
  </a>
</figure>

@endif

@endforeach
@endif

@stop
        