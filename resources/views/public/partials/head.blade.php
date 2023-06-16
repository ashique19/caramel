<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# business: http://ogp.me/ns/business#" >        
<!-- META SECTION -->
<title>@yield('title')</title>            
<!-- Required meta tags-->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="author" content="Md Ashiqul Islam; Email: ashique19@gmail.com; Phone: +880-178-563-6359">

<meta name='copyright' content='{{ settings()->application_name }}'>
<meta name='classification' content='Business'>

<meta property="og:type" content="business.business">
<meta property="og:title" content="{{ settings()->application_name }}">
<meta property="og:url" content="{{ route('home') }}">
<meta property="og:image" content="{{ settings()->logo_photo }}">
<meta property="business:contact_data:street_address" content="{{ settings()->address }}">
<meta property="business:contact_data:locality" content="{{ settings()->city }}">
<meta property="business:contact_data:region" content="{{ settings()->city }}">
<meta property="business:contact_data:postal_code" content="{{ settings()->postcode }}">
<meta property="business:contact_data:country_name" content="{{ settings()->country }}">

<link rel="shortcut icon" type="image/png" href="{{settings()->icon_photo}}"/>

<meta name="keywords" content="Sundoritoma, fashion, woman fashion, jewelry, necklace, earring, indian jewelry, chinese jewelry">
<meta name="description" content="Sundoritoma - Premium Fashion Accessories for woman">

@yield('meta')
<!-- END META SECTION -->

<!-- CSS INCLUDE -->
@foreach( front_css() as $css ) <link rel="stylesheet" type="text/css" href="{{ $css }}" media="all" /> @endforeach

@yield('css')

<!-- END CSS INCLUDE -->                               


<!--Start Pre-loading-->

<!--
-- rel="prefetch" enables preloading and caching assets (e.g. css, js, img etc.)
-->
<!--<link rel="prefetch" href="image.png">-->
@yield('prefetch')


<!--
-- rel="prerender" loads and caches entire page so that it can display the page instantly on request.
-->
<!--<link rel="prerender" href="http://css-tricks.com">-->
@yield('prerender')

<!--END Pre-loading-->

</head>