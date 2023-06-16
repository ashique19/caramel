@extends('public.layouts.layout')
@section('title')Products by {{ settings()->application_name }} - {{ settings()->application_slogan }} @stop
@section('main')

<div class="column is-12-desktop is-12-mobile slick padding-top-10 padding-bottom-20 has-text-uppercase" data-slick='{"infinite":true, "slidesToShow":1, "slidesToScroll":1, "speed":1500, "fade": true, "cssEase": "linear", "autoplay": true, "autoplaySpeed": 5000, "dots": false, "arrows": false }' >
    <a href="#">
      <h1 class="title is-size-4 has-text-centered">Products by {{ settings()->application_name }}</h1>
    </a>
    <a href="#">
      <h2 class="title is-size-4 has-text-centered">Very high quality finishing</h2>
    </a>
    <a href="#">
      <h2 class="title is-size-4 has-text-centered">24x7 cordial support</h2>
    </a>
    <a href="#">
      <h2 class="title is-size-4 has-text-centered">We deliver all over the world</h2>
    </a>
</div>

<div class="column is-2-desktop is-4-mobile">
  
  <nav class="panel yellow-border black-bg is-shadowless">
    
    <h3 class="panel-heading font-weight-700 yellow-bg yellow-border padding-5 xs-font-size-10">
    FILTER
    </h3>
    
    <div class="column is-12 slick" data-slick='{"infinite":true, "slidesToShow":1, "slidesToScroll":1, "speed":1500, "fade": true, "cssEase": "linear", "autoplay": true, "autoplaySpeed": 2000, "lazyLoad": "ondemand", "centerMode": true, "arrows": false }' >
      <div class="category-thumb">
        <a href="#">
          <img data-lazy="/public/img/slides/slide1.jpg">
        </a>
        <a href="{{ action('CategoryPublic@necklace') }}" class="button is-fullwidth whitish-bg black-text show-all">SHOW ALL</a>
      </div>
      <div class="category-thumb">
        <a href="#">
          <img data-lazy="/public/img/slides/slide2.jpg">
        </a>
        <a href="{{ action('CategoryPublic@necklace') }}" class="button is-fullwidth blackish-bg white-text show-all">SHOW ALL</a>
      </div>
      <div class="category-thumb">
        <a href="#">
          <img data-lazy="/public/img/slides/slide3.jpg">
        </a>
        <a href="{{ action('CategoryPublic@necklace') }}" class="button is-fullwidth whitish-bg black-text show-all">SHOW ALL</a>
      </div>
      <div class="category-thumb">
        <a href="#">
          <img data-lazy="/public/img/slides/slide4.jpg">
        </a>
        <a href="{{ action('CategoryPublic@necklace') }}" class="button is-fullwidth whitish-bg black-text show-all">SHOW ALL</a>
      </div>
      <div class="category-thumb">
        <a href="#">
          <img data-lazy="/public/img/slides/slide5.jpg">
        </a>
        <a href="{{ action('CategoryPublic@necklace') }}" class="button is-fullwidth whitish-bg black-text show-all">SHOW ALL</a>
      </div>
      <div class="category-thumb">
        <a href="#">
          <img data-lazy="/public/img/slides/slide6.jpg">
        </a>
        <a href="{{ action('CategoryPublic@necklace') }}" class="button is-fullwidth whitish-bg black-text show-all">SHOW ALL</a>
      </div>
  </div>
    
    <div class="column is-12 slick" data-slick='{"infinite":true, "slidesToShow":1, "slidesToScroll":1, "speed":1500, "fade": true, "cssEase": "linear", "autoplay": true, "autoplaySpeed": 2000, "lazyLoad": "ondemand", "centerMode": true, "arrows": false }' >
      <div class="category-thumb">
        <a href="#">
          <img data-lazy="/public/img/slides/slide1.jpg">
        </a>
        <a href="{{ action('CategoryPublic@necklace') }}" class="button is-fullwidth whitish-bg black-text show-all">SHOW ALL</a>
      </div>
      <div class="category-thumb">
        <a href="#">
          <img data-lazy="/public/img/slides/slide2.jpg">
        </a>
        <a href="{{ action('CategoryPublic@necklace') }}" class="button is-fullwidth blackish-bg white-text show-all">SHOW ALL</a>
      </div>
      <div class="category-thumb">
        <a href="#">
          <img data-lazy="/public/img/slides/slide3.jpg">
        </a>
        <a href="{{ action('CategoryPublic@necklace') }}" class="button is-fullwidth whitish-bg black-text show-all">SHOW ALL</a>
      </div>
      <div class="category-thumb">
        <a href="#">
          <img data-lazy="/public/img/slides/slide4.jpg">
        </a>
        <a href="{{ action('CategoryPublic@necklace') }}" class="button is-fullwidth whitish-bg black-text show-all">SHOW ALL</a>
      </div>
      <div class="category-thumb">
        <a href="#">
          <img data-lazy="/public/img/slides/slide5.jpg">
        </a>
        <a href="{{ action('CategoryPublic@necklace') }}" class="button is-fullwidth whitish-bg black-text show-all">SHOW ALL</a>
      </div>
      <div class="category-thumb">
        <a href="#">
          <img data-lazy="/public/img/slides/slide6.jpg">
        </a>
        <a href="{{ action('CategoryPublic@necklace') }}" class="button is-fullwidth whitish-bg black-text show-all">SHOW ALL</a>
      </div>
  </div>
    
    <div class="column is-12 slick" data-slick='{"infinite":true, "slidesToShow":1, "slidesToScroll":1, "speed":1500, "fade": true, "cssEase": "linear", "autoplay": true, "autoplaySpeed": 2000, "lazyLoad": "ondemand", "centerMode": true, "arrows": false }' >
      <div class="category-thumb">
        <a href="#">
          <img data-lazy="/public/img/slides/slide1.jpg">
        </a>
        <a href="{{ action('CategoryPublic@necklace') }}" class="button is-fullwidth whitish-bg black-text show-all">SHOW ALL</a>
      </div>
      <div class="category-thumb">
        <a href="#">
          <img data-lazy="/public/img/slides/slide2.jpg">
        </a>
        <a href="{{ action('CategoryPublic@necklace') }}" class="button is-fullwidth blackish-bg white-text show-all">SHOW ALL</a>
      </div>
      <div class="category-thumb">
        <a href="#">
          <img data-lazy="/public/img/slides/slide3.jpg">
        </a>
        <a href="{{ action('CategoryPublic@necklace') }}" class="button is-fullwidth whitish-bg black-text show-all">SHOW ALL</a>
      </div>
      <div class="category-thumb">
        <a href="#">
          <img data-lazy="/public/img/slides/slide4.jpg">
        </a>
        <a href="{{ action('CategoryPublic@necklace') }}" class="button is-fullwidth whitish-bg black-text show-all">SHOW ALL</a>
      </div>
      <div class="category-thumb">
        <a href="#">
          <img data-lazy="/public/img/slides/slide5.jpg">
        </a>
        <a href="{{ action('CategoryPublic@necklace') }}" class="button is-fullwidth whitish-bg black-text show-all">SHOW ALL</a>
      </div>
      <div class="category-thumb">
        <a href="#">
          <img data-lazy="/public/img/slides/slide6.jpg">
        </a>
        <a href="{{ action('CategoryPublic@necklace') }}" class="button is-fullwidth whitish-bg black-text show-all">SHOW ALL</a>
      </div>
  </div>
    
    <div class="column is-12 slick" data-slick='{"infinite":true, "slidesToShow":1, "slidesToScroll":1, "speed":1500, "fade": true, "cssEase": "linear", "autoplay": true, "autoplaySpeed": 2000, "lazyLoad": "ondemand", "centerMode": true, "arrows": false }' >
      <div class="category-thumb">
        <a href="#">
          <img data-lazy="/public/img/slides/slide1.jpg">
        </a>
        <a href="{{ action('CategoryPublic@necklace') }}" class="button is-fullwidth whitish-bg black-text show-all">SHOW ALL</a>
      </div>
      <div class="category-thumb">
        <a href="#">
          <img data-lazy="/public/img/slides/slide2.jpg">
        </a>
        <a href="{{ action('CategoryPublic@necklace') }}" class="button is-fullwidth blackish-bg white-text show-all">SHOW ALL</a>
      </div>
      <div class="category-thumb">
        <a href="#">
          <img data-lazy="/public/img/slides/slide3.jpg">
        </a>
        <a href="{{ action('CategoryPublic@necklace') }}" class="button is-fullwidth whitish-bg black-text show-all">SHOW ALL</a>
      </div>
      <div class="category-thumb">
        <a href="#">
          <img data-lazy="/public/img/slides/slide4.jpg">
        </a>
        <a href="{{ action('CategoryPublic@necklace') }}" class="button is-fullwidth whitish-bg black-text show-all">SHOW ALL</a>
      </div>
      <div class="category-thumb">
        <a href="#">
          <img data-lazy="/public/img/slides/slide5.jpg">
        </a>
        <a href="{{ action('CategoryPublic@necklace') }}" class="button is-fullwidth whitish-bg black-text show-all">SHOW ALL</a>
      </div>
      <div class="category-thumb">
        <a href="#">
          <img data-lazy="/public/img/slides/slide6.jpg">
        </a>
        <a href="{{ action('CategoryPublic@necklace') }}" class="button is-fullwidth whitish-bg black-text show-all">SHOW ALL</a>
      </div>
  </div>
    
    <div class="column is-12 slick" data-slick='{"infinite":true, "slidesToShow":1, "slidesToScroll":1, "speed":1500, "fade": true, "cssEase": "linear", "autoplay": true, "autoplaySpeed": 2000, "lazyLoad": "ondemand", "centerMode": true, "arrows": false }' >
      <div class="category-thumb">
        <a href="#">
          <img data-lazy="/public/img/slides/slide1.jpg">
        </a>
        <a href="{{ action('CategoryPublic@necklace') }}" class="button is-fullwidth whitish-bg black-text show-all">SHOW ALL</a>
      </div>
      <div class="category-thumb">
        <a href="#">
          <img data-lazy="/public/img/slides/slide2.jpg">
        </a>
        <a href="{{ action('CategoryPublic@necklace') }}" class="button is-fullwidth blackish-bg white-text show-all">SHOW ALL</a>
      </div>
      <div class="category-thumb">
        <a href="#">
          <img data-lazy="/public/img/slides/slide3.jpg">
        </a>
        <a href="{{ action('CategoryPublic@necklace') }}" class="button is-fullwidth whitish-bg black-text show-all">SHOW ALL</a>
      </div>
      <div class="category-thumb">
        <a href="#">
          <img data-lazy="/public/img/slides/slide4.jpg">
        </a>
        <a href="{{ action('CategoryPublic@necklace') }}" class="button is-fullwidth whitish-bg black-text show-all">SHOW ALL</a>
      </div>
      <div class="category-thumb">
        <a href="#">
          <img data-lazy="/public/img/slides/slide5.jpg">
        </a>
        <a href="{{ action('CategoryPublic@necklace') }}" class="button is-fullwidth whitish-bg black-text show-all">SHOW ALL</a>
      </div>
      <div class="category-thumb">
        <a href="#">
          <img data-lazy="/public/img/slides/slide6.jpg">
        </a>
        <a href="{{ action('CategoryPublic@necklace') }}" class="button is-fullwidth whitish-bg black-text show-all">SHOW ALL</a>
      </div>
  </div>

  </nav>
  
</div>

<section class="column is-10-desktop is-8-mobile columns is-multiline">
  
  <div class="column is-4-desktop is-12-mobile slick" data-slick='{"infinite":true, "slidesToShow":1, "slidesToScroll":1, "speed":1500, "fade": true, "cssEase": "linear", "autoplay": true, "autoplaySpeed": 2000, "lazyLoad": "ondemand", "centerMode": true, "arrows": false }' >
      <div class="category-thumb">
        <a href="#">
          <img data-lazy="/public/img/slides/slide1.jpg">
        </a>
        <a href="{{ action('CategoryPublic@necklace') }}" class="button is-fullwidth whitish-bg black-text show-all">SHOW ALL</a>
      </div>
      <div class="category-thumb">
        <a href="#">
          <img data-lazy="/public/img/slides/slide2.jpg">
        </a>
        <a href="{{ action('CategoryPublic@necklace') }}" class="button is-fullwidth blackish-bg white-text show-all">SHOW ALL</a>
      </div>
      <div class="category-thumb">
        <a href="#">
          <img data-lazy="/public/img/slides/slide3.jpg">
        </a>
        <a href="{{ action('CategoryPublic@necklace') }}" class="button is-fullwidth whitish-bg black-text show-all">SHOW ALL</a>
      </div>
      <div class="category-thumb">
        <a href="#">
          <img data-lazy="/public/img/slides/slide4.jpg">
        </a>
        <a href="{{ action('CategoryPublic@necklace') }}" class="button is-fullwidth whitish-bg black-text show-all">SHOW ALL</a>
      </div>
      <div class="category-thumb">
        <a href="#">
          <img data-lazy="/public/img/slides/slide5.jpg">
        </a>
        <a href="{{ action('CategoryPublic@necklace') }}" class="button is-fullwidth whitish-bg black-text show-all">SHOW ALL</a>
      </div>
      <div class="category-thumb">
        <a href="#">
          <img data-lazy="/public/img/slides/slide6.jpg">
        </a>
        <a href="{{ action('CategoryPublic@necklace') }}" class="button is-fullwidth whitish-bg black-text show-all">SHOW ALL</a>
      </div>
  </div>
  
  <div class="column is-4-desktop is-12-mobile slick" data-slick='{"infinite":true, "slidesToShow":1, "slidesToScroll":1, "speed":1500, "fade": true, "cssEase": "linear", "autoplay": true, "autoplaySpeed": 2000, "lazyLoad": "ondemand", "centerMode": true, "arrows": false }' >
      <div class="hover">
        <img data-lazy="/public/img/slides/slide7.jpg">
      </div>
      <div class="hover">
        <img data-lazy="/public/img/slides/slide8.jpg">
      </div>
      <div class="hover">
        <img data-lazy="/public/img/slides/slide9.jpg">
      </div>
      <div class="hover">
        <img data-lazy="/public/img/slides/slide10.jpg">
      </div>
      <div class="hover">
        <img data-lazy="/public/img/slides/slide11.jpg">
      </div>
      <div class="hover">
        <img data-lazy="/public/img/slides/slide12.jpg">
      </div>
      <div class="hover">
        <img data-lazy="/public/img/slides/slide13.jpg">
      </div>
      <div class="hover">
        <img data-lazy="/public/img/slides/slide14.jpg">
      </div>
      <div class="hover">
        <img data-lazy="/public/img/slides/slide15.jpg">
      </div>
  </div>
  
  <div class="column is-4-desktop is-12-mobile slick" data-slick='{"infinite":true, "slidesToShow":1, "slidesToScroll":1, "speed":1500, "fade": true, "cssEase": "linear", "autoplay": true, "autoplaySpeed": 2000, "lazyLoad": "ondemand", "centerMode": true, "arrows": false }' >
      <div class="hover">
        <img data-lazy="/public/img/slides/slide16.jpg">
      </div>
      <div class="hover">
        <img data-lazy="/public/img/slides/slide17.jpg">
      </div>
      <div class="hover">
        <img data-lazy="/public/img/slides/slide18.jpg">
      </div>
      <div class="hover">
        <img data-lazy="/public/img/slides/slide19.jpg">
      </div>
      <div class="hover">
        <img data-lazy="/public/img/slides/slide20.jpg">
      </div>
      <div class="hover">
        <img data-lazy="/public/img/slides/slide21.jpg">
      </div>
      <div class="hover">
        <img data-lazy="/public/img/slides/slide22.jpg">
      </div>
      <div class="hover">
        <img data-lazy="/public/img/slides/slide23.jpg">
      </div>
      <div class="hover">
        <img data-lazy="/public/img/slides/slide24.jpg">
      </div>
      <div class="hover">
        <img data-lazy="/public/img/slides/slide25.jpg">
      </div>
      <div class="hover">
        <img data-lazy="/public/img/slides/slide26.jpg">
      </div>
  </div>
  
  <div class="column is-4-desktop is-12-mobile slick" data-slick='{"infinite":true, "slidesToShow":1, "slidesToScroll":1, "speed":1500, "fade": true, "cssEase": "linear", "autoplay": true, "autoplaySpeed": 2000, "lazyLoad": "ondemand", "centerMode": true, "arrows": false }' >
      <div class="hover">
        <img data-lazy="/public/img/slides/slide27.jpg">
      </div>
      <div class="hover">
        <img data-lazy="/public/img/slides/slide28.jpg">
      </div>
      <div class="hover">
        <img data-lazy="/public/img/slides/slide29.jpg">
      </div>
      <div class="hover">
        <img data-lazy="/public/img/slides/slide30.jpg">
      </div>
      <div class="hover">
        <img data-lazy="/public/img/slides/slide31.jpg">
      </div>
      <div class="hover">
        <img data-lazy="/public/img/slides/slide32.jpg">
      </div>
      <div class="hover">
        <img data-lazy="/public/img/slides/slide33.jpg">
      </div>
  </div>
  
  <div class="column is-4-desktop is-12-mobile slick" data-slick='{"infinite":true, "slidesToShow":1, "slidesToScroll":1, "speed":1500, "fade": true, "cssEase": "linear", "autoplay": true, "autoplaySpeed": 2000, "lazyLoad": "ondemand", "centerMode": true, "arrows": false }' >
      <div class="hover">
        <img data-lazy="/public/img/slides/slide34.jpg">
      </div>
      <div class="hover">
        <img data-lazy="/public/img/slides/slide35.jpg">
      </div>
      <div class="hover">
        <img data-lazy="/public/img/slides/slide36.jpg">
      </div>
      <div class="hover">
        <img data-lazy="/public/img/slides/slide37.jpg">
      </div>
  </div>

</section>

@stop
        