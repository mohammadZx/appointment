<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('seo_title')</title>
    <meta name="description" content="@yield('seo_description')">

    <link rel="stylesheet" href="{{ asset('css/layout/stylesheet.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layout/stylesheet_rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body>

<!-- Wrapper -->
<div id="main_wrapper">
  @include('layouts.header')
  <div class="clearfix"></div>
  <div class="page-content">
    @yield('content')
  </div>
 
  @include('layouts.footer')
</div>



    

    <!-- Scripts -->
   
    <script src="{{ asset('js/layout/jquery.min.js') }}"></script>
    <script src="{{ asset('js/layout/mmenu.js') }}"></script>
    <script src="{{ asset('js/layout/chosen.min.js') }}"></script> 
    <script src="{{ asset('js/layout/slick.min.js') }}"></script> 
    <script src="{{ asset('js/layout/rangeslider.min.js') }}"></script> 
    <script src="{{ asset('js/layout/magnific-popup.min.js') }}"></script> 
    <script src="{{ asset('js/layout/jquery-ui.min.js') }}"></script> 
    <script src="{{ asset('js/layout/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('js/layout/tooltips.min.js') }}"></script> 
    <script src="{{ asset('js/layout/color_switcher.js') }}"></script>
    <script src="{{ asset('js/layout/jquery_custom.js') }}"></script>

    <script>
      $('.add-listing-button').click(function(){
        $('#register').attr('data-redirect', "{{route('listing.create')}}")
      })
      $('.login-button').click(function(){
        $('#register').attr('data-redirect', "{{route('user.dashboard')}}")
      })
      
    </script>

    @yield('scripts')
</body>
</html>
