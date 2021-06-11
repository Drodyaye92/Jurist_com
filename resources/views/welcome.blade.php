<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- CSRF Token -->
      <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

     <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.js">
    <link rel="stylesheet" href="assets/fontawesome-free-5.15.1-web"
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
                <div class="col-2"> <img src="assets/images/balance.jpg" width="150px" height="90px" class="" alt=""> </div>
                <div class="col-8 "></div>
                <div class="col-2 my-5"><h5 class="fin">Numero vert:2311</h5></div>
            </div>
        </div>

<div class=" division">
<nav class="navbar">
      <a class="navbar-brand" href="">Actualite Juridique</a>
      <a class="navbar-brand" href="">Nos services</a>
      <a class="navbar-brand" href="#">Forum</a>
      <a class="navbar-brand" href="#">Contact</a>
      <a class="navbar-brand" href="">Creer un contact</a>
</nav>
</div>
    </header>


<section class="container-fluid">

<img src="assets/images/femme.jpeg" alt="" class="covere" >
<div class="phot mx-auto text-white" style="position:relative;top:-340px;font-size:200%;" >
      <center><b>Nous sommes la voix des sans voix!!<br>Nous vous accompagnons jusqu'au bout avec le meilleur des juristes</b></center>
    </div>

</section>
<section>
    <h3 class="card-header text-white bg-dark">Presentation de la plateforme</h3>
    <div class="container">

                <div class="row">

                    <div class="col-6  my-1">
                        <h5><span class="line">N</span>os Forces:
                       Assistance Juridique gratuite propose un service axe la simplicite et methodiquement elaboree pour repondre a vos besoin.L'innovation vient du fait que l’utilisation de la technologie pour favoriser l’accès au droit et à la justice est un grand pas vers une vulgarisation des procedures judiciaire a travers le numerique.L’accès au droit et aux professionnels de droit en Afrique a longtemps été et constitue toujours un véritable casse-tête pour les justiciables et surtout les jeunes entrepreneurs.
                      </h5>
                    </div>
                    <div class="col-6 mt-5"><img src="assets/images/equipe.jpg" alt="" class="" width="500" height="300" ></div>
                    <div class="col-6 mt-5"><img src="assets/images/RJJR.jpg" alt="" class="" width="500" height="300" ></div>
                    <div class="col-6  mt-5">
                    <h5><span class="line">N</span>otre Vision:
                        La dimension humaine de notre métier est primordiale pour nous. Nous la considérons comme l’atout majeur d’une collaboration réussie, qu’il s’agisse des relations entre les avocats ou des relations entre justiciables. Pour participer à cette évolution, nous devons cultiver une posture d’ouverture, d’engagement et d’exigence qui nous permet d’accompagner nos clients avec pragmatisme et innovation sur les grands enjeux juridiques </h5>
                    </div>


                    <div class="col-6  mt-5">
                    <h5> <span class="line">N</span>os Objectifs:
                         L'assistant juridique assure les tâches de secrétariat pour un employeur du milieu juridique comme peut l'être un cabinet d'avocat, un notaire, une équipe de juriste d'entreprise ou encore un huissier.L'assistant juridique exerce des missions plus ou moins importantes et en rapport avec la justice selon ses capacités et sa connaissance du droit.Une assistance juridique reactive.L'imperatif de rapidite imposee par nos clients ne pose pas de problemme a nos equipe .</h5>
                    </div>
                    <div class="col-6  mt-5"><img src="assets/images/med.jpg" alt="" class="" width="500" height="300" ></div>
                </div>
          </div>
     </section>
<section class="decote">
  <div class="container my-5">
      <div class="row mt-4">
          <div class="col-5">
          <div class="card my-5">
  <div class="card-header text-white bg-dark">
  Actualite Juridique
  </div>
  <div class="card-body">
    <h5 class="card-title">Droit des obligations</h5>
    <p class="card-text"> L'intérêt du droit des obligations est de faire suivre la création d'obligations de conséquences juridiques, permettant la sécurité des affaires et l'émergence d'un marché stable</p>

  </div>
</div>
          </div>
          <div class="col-7">
          <div class="card my-5">
  <div class="card-header text-white bg-dark">
    Arret rendu par les tribunaux
  </div>
  <div class="card-body">
    <h5 class="card-title">Nassa-(Droit de la famille)</h5>
    <p class="card-text"> Le divorce et la séparation peuvent s'avérer des expériences très stressantes pour une famille. Si vous êtes bien informé et si vous recevez l'appui nécessaire, vous serez mieux en mesure de faire face à la situation.</p>

  </div>
</div>
          </div>
      </div>
  </div>

</section>
<section class="decote">
  <div class="container my-5">
      <div class="row mt-4">
          <div class="col-5">
          <div class="card my-5">
  <div class="card-header text-white bg-dark">
  Actualite Juridique
  </div>
  <div class="card-body">
    <h5 class="card-title">Droit des biens</h5>
    <p class="card-text"> L'intérêt du droit des obligations est de faire suivre la création d'obligations de conséquences juridiques, permettant la sécurité des affaires et l'émergence d'un marché stable</p>

  </div>
</div>
          </div>
          <div class="col-7">
          <div class="card my-5">
  <div class="card-header text-white bg-dark">
    Arret rendu par les tribunaux
  </div>
  <div class="card-body">
    <h5 class="card-title">Nassa-(Droit des affaires)</h5>
    <p class="card-text"> Le divorce et la séparation peuvent s'avérer des expériences très stressantes pour une famille. Si vous êtes bien informé et si vous recevez l'appui nécessaire, vous serez mieux en mesure de faire face à la situation.</p>

  </div>
</div>
          </div>
      </div>
  </div>

</section>

<section>
        <div class="container">
            <div class="row mt-5">
                <div class="col-4">
                <div class="card shadow" >
                    <div class="card-body">
                        <div class="cercle m-auto">
                        <div class="">
                            <img src="assets/images/telecharger.jpg "width="100px" height="100px" alt="">
                        </div>
                        </div>

                        <h5 class="card-title text-center">Code du travail</h5>
                    </div>
                </div>
                </div>
                <div class="col-4">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="cercle m-auto">
                        <div class="">
                            <img src="assets/images/telecharger.jpg "width="100px" height="100px" alt="">
                        </div>
                        </div>

                        <h5 class="card-title text-center">Droit de la Famille</h5>
                    </div>
                </div>
                </div>
                <div class="col-4">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="cercle m-auto">
                        <div class="">
                            <img src="assets/images/telecharger.jpg "width="100px" height="100px" alt="">
                        </div>
                        </div>
                        <h5 class="card-title text-center">Code du commerce </h5>
                    </div>
                </div>
                </div>
            </div>
        </div>
</section>
<section>
    <div class="container">
        <div class="row mt-5">
            <div class="col-4">
            <div class="card shadow" >
                <div class="card-body">
                    <div class="cercle m-auto">
                    <div class="">
                        <img src="assets/images/telecharger.jpg "width="100px" height="100px" alt="">
                    </div>
                    </div>

                    <h5 class="card-title text-center">Code du travail</h5>
                </div>
            </div>
            </div>
            <div class="col-4">
            <div class="card shadow">
                <div class="card-body">
                    <div class="cercle m-auto">
                    <div class="">
                        <img src="assets/images/telecharger.jpg "width="100px" height="100px" alt="">
                    </div>
                    </div>

                    <h5 class="card-title text-center">Droit de la Famille</h5>
                </div>
            </div>
            </div>
            <div class="col-4">
            <div class="card shadow">
                <div class="card-body">
                    <div class="cercle m-auto">
                    <div class="">
                        <img src="assets/images/telecharger.jpg "width="100px" height="100px" alt="">
                    </div>
                    </div>
                    <h5 class="card-title text-center">Code du commerce </h5>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>
<footer class="footer bg-dark">
    <div class="container-fluid mt-5  ">
        <div class="row mx-auto">
        <p class="mx-auto text-white pt-3">Copyright@2021 tous droits reserves Trouver mon Juriste.com </p>
        </div>
    </div>
</footer>
</body>
</html>



 {{-- @extends('layouts.app') --}}


{{-- @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">USER Dashboard</div>

 <script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script>
<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script src='{{ asset('js/chatter.js') }}'></script>

</body>
</html>

                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @component('components.who')
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
</div> --}}
{{-- @endsection --}}
