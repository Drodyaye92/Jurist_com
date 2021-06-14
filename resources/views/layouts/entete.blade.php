<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

     <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
   <link href="{{ asset('assets/css/chatter.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
   <link rel="stylesheet" href="assets/css/reset.min.css">
    <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.js">
    <link rel="stylesheet" href="assets/fontawesome-free-5.15.1-web">
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <title>page de presentation</title>
</head>
<body>
    <header>
    <nav class="navbar-fixed">
        <div class="container">
        <div class="row">
    <div class="col-2 my-2"> Touver mon juriste.com</div>
    <div class="offset-7"></div>
    <div class="col-3">

            <!-- Authentication Links -->
            @guest
                    <a class="" href="{{ route('login') }}">Connexion</a>
                @if (Route::has('register'))
                    <a class="" href="{{ route('register') }}">Creer mon compte</a>
                @endif
            @else

                    <a id="navbarDropdown" class="" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>

            @endguest

    </div>
    </div>
    </nav>
        <div class="container">
            <div class="row">
                <div class="col-2"> <img src="{{asset('assets/images/balance.jpg')}}" width="150px" height="90px" class="" alt=""> </div>
                <div class="col-8 "></div>
                <div class="col-2 my-5"><h5 class="fin">Numero vert:2311</h5></div>
            </div>
        </div>

<div class=" division">
<nav class="navbar">
      <a class="navbar-brand" href="{{asset('/')}}">Actualite Juridique</a>
      <a class="navbar-brand" href="{{asset('chatter')}}">Nos services</a>
      <a class="navbar-brand" href="{{asset('home')}}">Notre Equipe</a>
      <a class="navbar-brand" href="{{asset('forum')}}">Forum</a>
      <a class="navbar-brand" href="{{asset('contact')}}">Contact</a>
</nav>
</div>
    </header>
    <main class="py-4">
        @yield('content')
    </main>
    <script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script>
    <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
   <script src='{{ asset('js/chatter.js') }}'></script>
</body>
</html>

