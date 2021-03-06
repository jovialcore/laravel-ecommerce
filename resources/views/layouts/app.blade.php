<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'covid-19 store') }}</title>

    <!-- Scripts -->
    <script   src="{{ secure_asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
<!-- this styling link is for production -->

<link href="{{ secure_asset('css/shop.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
<!-- this styling is for develpoment -->
      <link href="{{ URL::asset('css/shop.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

    <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="/">Covid-19 Store</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/">Home
         <!--      <span class="sr-only">(current)</span> no useful -->
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/cart">Cart

                  @if (Cart::instance('saveForLater')->content()->count() > 0)

                  <span class="badge badge-light">
                    {{  Cart::instance('saveForLater')->content()->count()}}
                  </span>
                  @endif
            </a>
          </li>
          
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
        <div class="row">
            @yield('content')
        </div>
  </div> 
</body>
</html>
