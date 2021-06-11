@extends('layouts.entete')

@section('content')
<div class="container">
    <div class="row justify-content-center">






                        <div class="col-4 my-3">
                            <div class="col-12 my-3">
                                <form action="" method="get">
                                    <button type="submit" class="btn btn-xs btn-info">Messages</button>
                                </form>
                            </div>
                            <div class="col-12 my-3">
                                <form action="" method="get">
                                    <button type="submit" class="btn btn-xs btn-info">Chatter</button>
                                </form>
                            </div>
                            <div class="col-12 my-3">
                                <form action="" method="get">
                                    <button type="submit" class="btn btn-xs btn-info">forum</button>
                                </form>
                            </div>

                        </div>
                      <div class="col-8 bg-white ">
                         <h2> </h2>
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Liste des clients ayant un compte</li>
                    </ol>
                </nav>
                <div class="container-fluid">

                   <table class="table table-striped">
                  <h5>Au total,il ya comptes existants</h5>
          <thead>
            <tr>
              <th scope="col">#</th>
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
