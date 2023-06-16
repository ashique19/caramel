<!DOCTYPE html>
<html>
    @include('public.partials.head')
  <body>
    
    @if( env('APP_DEBUG') == false )
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-109438059-3"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      
      gtag('config', 'UA-109438059-3');
    </script>
    
    @endif

    
    <section class="hero is-black is-fullheight">
      
      @include('public.navs.topbar')
      
      <!-- Hero content: will be in the middle -->
      <div class="hero-body padding-top-0 xs-padding-left-0 xs-padding-right-0">
        <div class="container has-text-centered">
          
          <article class="columns is-multiline">
    
          @yield('main')
      
          </article>
          
          
        </div>
      </div>
        
      
    </section>
        
    <!-- START SCRIPTS -->
    
    @foreach( front_js() as $js) <script type="text/javascript" src="{{ $js }}"></script> @endforeach
    
    @yield('js')
    <!-- END SCRIPTS -->
    
  </body>
</html>     

