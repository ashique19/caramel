<!-- Hero head: will stick at the top -->
<div class="hero-head">
    <header class="navbar topbar black-border is-radiusless margin-bottom-5 z-200">
        <div class="container xs-padding-0 yellow-bg">
            <div class="navbar-brand xs-padding-0 black-text font-size-14">
                <a href="{{ route('home') }}" class="navbar-item xs-padding-0 hidden-xs black-bg">
                    <img src="{{ settings()->logo_photo }}" alt="{{ settings()->application_name }}" class="hidden-xs">
                </a>
                <button type="button" class="button transparent-bg border-width-0 topbar-toggler padding-left-10 padding-right-10 font-weight-700 black-text hidden-tablet is-hidden-desktop" data-target="#topbar-menu">
                    <i class="fas fa-bars font-size-14"></i>
                    &nbsp;MENU
                </button>
                @if( auth()->user() )
                <a href="{{ route('dashboard') }}" class="black-text padding-top-15 padding-bottom-15 padding-left-10 padding-right-10 font-weight-700 hidden-tablet is-hidden-desktop">
                    <i class="fas fa-home font-size-14"></i>
                </a>
                <a href="{{ route('logout') }}" class="black-text padding-top-15 padding-bottom-15 padding-left-10 padding-right-10 font-weight-700 hidden-tablet is-hidden-desktop">
                    <i class="fas fa-sign-out-alt font-size-14"></i>
                </a>
                @else
                <a href="{{ route('home') }}" class="black-text padding-top-15 padding-bottom-15 padding-left-10 padding-right-10 font-weight-700 hidden-tablet is-hidden-desktop">
                    <i class="fas fa-home font-size-14"></i>
                    HOME
                </a>
                <a href="{{ route('login') }}" class="black-text padding-top-15 padding-bottom-15 padding-left-10 padding-right-10 font-weight-700 hidden-tablet is-hidden-desktop">
                    <i class="fas fa-sign-in-alt font-size-14"></i>
                    LOG IN
                </a>
                @endif
                
                @if( auth()->user() )
                @if( in_array( auth()->user()->role, [1,2] ) )
                <button type="button" class="button transparent-bg  border-width-0 topbar-toggler padding-top-15 padding-bottom-15 padding-left-10 padding-right-10 font-weight-700 black-text hidden-tablet is-hidden-desktop is-pulled-right margin-right-15" data-target="#admin-menu">
                    NAV&nbsp;
                    <i class="fas fa-bars font-size-14"></i>
                </button>
                @endif
                @endif
            </div>
            <div class="navbar-item xs-margin-top-40 xs-padding-top-0">
                <div class="control search-bar width-300 xs-width-100-percent">
                    <input class="input is-small is-rounded product-search-value" data-url="{{ action('StaticPageController@productSearch') }}" type="text" placeholder="Search or Browse Product">
                    
                    <section class="searched-items width-300 xs-width-100-percent">
                        <div class="card">
                            <div class="card-content padding-0"></div>
                        </div>
                    </section>
                    
                </div>
            </div>
            <div id="topbar-menu" class="navbar-menu xs-margin-top-0 font-size-14">
                <div class="navbar-end">
                    <a href="{{ route('home') }}" class="navbar-item font-weight-700">
                    HOME
                    </a>
                    <a href="{{ action('CategoryPublic@necklace') }}" class="navbar-item font-weight-700">
                    PRODUCTS
                    </a>
                    <span class="navbar-item">
                        @if( auth()->user() )
                        @if( in_array( auth()->user()->role, [1,2,3] ) )
                        <a href="{{ action('AdminOrders@create') }}" class="button is-small yellow-bg yellow-border font-weight-700 margin-right-5" >
                            <span class="icon">
                                <i class="fas fa-plus"></i>
                            </span>
                        </a>
                        <a href="{{ action('AdminOrders@index') }}" class="button is-small yellow-bg yellow-border font-weight-700 margin-right-5" >
                            <span class="icon">
                                <i class="fas fa-folder"></i>
                            </span>
                        </a>
                        @endif
                        <a href="{{ route('dashboard') }}" class="button is-small yellow-bg yellow-border font-weight-700" >
                            <span class="icon">
                                <i class="fas fa-book"></i>
                            </span>
                            <span>Dashboard</span>
                        </a>
                        <a href="{{ route('logout') }}" class="button is-small font-weight-700 black-bg white-text black-border" >
                            <span class="icon">
                                <i class="fas fa-sign-out-alt"></i>
                            </span>
                            <span>Log out</span>
                        </a>
                        @else
                        <a href="{{ route('login') }}" class="button is-small yellow-bg yellow-border font-weight-700" data-toggle="tooltip" data-placement="bottom" title="Log in with Facebook or Phone number" >
                            <span class="icon">
                                <i class="fas fa-sign-in-alt"></i>
                            </span>
                            <span>LOG IN</span>
                        </a>
                        @endif
                    </span>
                </div>
            </div>
        </div>
    </header>
</div>