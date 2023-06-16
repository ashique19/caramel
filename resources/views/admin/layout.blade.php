<!DOCTYPE html>
<html lang="en">
    @include('admin.partials.head')
    <body>
        
        @include('public.navs.topbar')
        
        @if( auth()->user() )
        
        @if( in_array( auth()->user()->role, [1,2] ) ) 
            @include('admin.partials.admin-top-nav')
            @include('admin.partials.sidebar')
        @endif
        
        @if( in_array( auth()->user()->role, [1,2,3] ) ) 
            @include('admin.partials.floating-nav')
        @endif
        
        @endif
        
        
        <section class="hero is-white is-fullheight">
            <div class="container">
            @yield('main')
            </div>
        </section>
        
        <!-- START SCRIPTS -->
    
        @foreach( back_js() as $js) <script type="text/javascript" src="{{ $js }}"></script> @endforeach
        
        @yield('js')
        <!-- END SCRIPTS -->
                
    </body>
</html>






