@extends('layouts.board')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
                        <div class="col-3 my- border-right leftbar">
                            <div>
                                <h3 class="text-center">Trouvez mon jurist.com</h3>

                            </div>
                            <div class="my-5" >
                                <div class="bord"><h4><a href="" class="text-white">Liste des utilisateurs</a> </h4></div>

                                <h4><a href="" class="text-white">Messages</a> </h4>
                                <h4><a href="" class="text-white">Chatter</a> </h4>
                                <h4><a href="" class="text-white">Forum</a> </h4>
                            </div>


                        </div>
                      <div class="col-9 bg-white my-5">
                        <div>
                            <nav class="navbar-fixed">
                                <div class="container">
                                <div class="row">
                            <div class="col-2 my-2"> </div>
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



                        </div>

                         <h2> </h2>
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Liste des clients ayant un compte</li>
                    </ol>
                  </nav>
                <div class="container-fluid">

                   <table class="table table-striped">

          <thead>
            <tr>
              <th scope="col"></th>
              <th scope="col">Nom</th>
              <th scope="col">Email</th>
              <th scope="col">Matricule</th>
              <th scope="col">Numero</th>
              <th scope="col">Action</th>

            </tr>
          </thead>
          <tbody>
          @foreach($user as $user)
            <tr>
              <th scope="row"></th>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user->matricule}}</td>
              <td>{{$user->numero}}</td>
                      <form action="" method="post">
                       @csrf
                  <td>
                   <input type="hidden" name="supprime" value="{{$user->email}}">
                   <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('Voulez vous supprimer inscription?')">supprimer</button>
                 </td>
                      </form>
            </tr>

            @endforeach
          </tbody>
        </table>

                </div>
                </div>

    </div>
</div>
@endsection
