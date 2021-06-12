@extends('layouts.entete')

@section('content')

<div class="chat">
    <input type='hidden' value='{{ $user_id }}' name='user_id' />
    <div id="frame">
        <div id="sidepanel">
            <div id="search" style='padding-top:5px;padding-bottom:5px;'>
          <p style='text-align:center;font-weight:bold;font-size=40px;'>User List</p>
            </div>
            <div id="contacts">
                <ul id="contacts_list_status">
            @foreach ($logged_in_users as $user)
              @if( ($user->time_since_last_activity('m') <= 90) || (Auth::id() == $user->id ) )
                <li class="contact">
                  <div class="wrap">

                    @if( $user->time_since_last_activity('m') > 5 )
                      <span class="contact-status away" data-userid='{{ $user->id }}' name='user_{{ $user->id }}_status' ></span>
                    @else
                      <span class="contact-status online" data-userid='{{ $user->id }}' name='user_{{ $user->id }}_status'  ></span>
                    @endif

                    <img src="storage/avatars/{{ $user->avatar }}" alt="" />
                    <div class="meta">
                      <p class="name">{{ $user->name }}</p>
                      <p class="preview" name="last_activity_user_{{ $user->id }}">{{ $user->time_since_last_activity('h') }}</p>
                    </div>
                  </div>
                </li>
              @endif
            @endforeach

                </ul>
            </div>
            <div id="bottom-bar">
          <button id="addcontact">
            <a href="#upload_avatar" rel="modal:open" style="color:#E6EAEA;text-decoration: none;">
              <i class="fa fa-user-plus fa-fw" aria-hidden="true"></i>Change Avatar
            </a>
          </button>
            </div>
        </div>
        <div class="content">
            <div class="contact-profile">
          <img src="storage/avatars/{{ Auth::user()->avatar }}" alt="" />
          <p>{{ Auth::user()->name  }}</p>
                <div class="social-media">
                    <a href="logout"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="messages">
                <ul>
              @foreach ($messages as $message )
                @if( $message->user->id == $user_id)
                  <li class="sent">
                @else
                  <li class="replies">
                @endif
                  <img src="storage/avatars/{{ $message->user->avatar }}" alt="" />
                  <p>{{ $message->message }}</p>
                </li>

              @endforeach

                </ul>
            </div>
            <div class="message-input">
             <form action="/send" method="post">
                @csrf
                <div class="wrap">
                <input type="hidden" value="{{auth()->user()->id}}" name="user_id"/>
                <input type="text" name="message" placeholder="Write your message..." />
                <button class="submit" id='btn_send_message'>
                <i class="fa fa-paper-plane" aria-hidden="true"></i>valider
                </button>
                
            </form>
             </div>
        </div>
    </div>


    <!-- Modal HTML embedded directly into document -->
    <div id="upload_avatar" class="modal">

      <form action="/profile" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input type="file" class="form-control-file" name="avatar" id="avatarFile" aria-describedby="fileHelp">
            <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

    </div>
    </div>
</div>

@endsection

{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,300' rel='stylesheet' type='text/css'>
    <script src="https://js.pusher.com/4.4/pusher.min.js"></script>
    <script src="https://use.typekit.net/hoy3lrg.js"></script>
    <script>try{Typekit.load({ async: true });}catch(e){}</script>

    <!-- Styles -->


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,300' rel='stylesheet' type='text/css'>
    <script src="https://js.pusher.com/4.4/pusher.min.js"></script>
    <script src="https://use.typekit.net/hoy3lrg.js"></script>
    <script>try{Typekit.load({ async: true });}catch(e){}</script>

    <!-- Styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/chatter.css">
    <link rel="stylesheet" href="assets/css/reset.min.css">
    <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.js">
    <link rel="stylesheet" href="assets/fontawesome-free-5.15.1-web">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">




    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <!-- jQuery Modal -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <!-- Latest compiled and minified CSS -->
    <link rel='stylesheet prefetch' href="{{ asset('css/chatter.css') }}" >

</head>
<body>
    <header>
        <nav class="navbar-fixed">

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



<div class="container-fluid">
<input type='hidden' value='{{ $user_id }}' name='user_id' />
<div id="frame">
	<div id="sidepanel">
		<div id="search" style='padding-top:5px;padding-bottom:5px;'>
      <p style='text-align:center;font-weight:bold;font-size=40px;'>User List</p>
		</div>
		<div id="contacts">
			<ul id="contacts_list_status">
        @foreach ($logged_in_users as $user)
          @if( ($user->time_since_last_activity('m') <= 90) || (Auth::id() == $user->id ) )
            <li class="contact">
              <div class="wrap">

                @if( $user->time_since_last_activity('m') > 5 )
                  <span class="contact-status away" data-userid='{{ $user->id }}' name='user_{{ $user->id }}_status' ></span>
                @else
                  <span class="contact-status online" data-userid='{{ $user->id }}' name='user_{{ $user->id }}_status'  ></span>
                @endif

                <img src="storage/avatars/{{ $user->avatar }}" alt="" />
                <div class="meta">
                  <p class="name">{{ $user->name }}</p>
                  <p class="preview" name="last_activity_user_{{ $user->id }}">{{ $user->time_since_last_activity('h') }}</p>
                </div>
              </div>
            </li>
          @endif
        @endforeach

			</ul>
		</div>
		<div id="bottom-bar">
      <button id="addcontact">
        <a href="#upload_avatar" rel="modal:open" style="color:#E6EAEA;text-decoration: none;">
          <i class="fa fa-user-plus fa-fw" aria-hidden="true"></i>Change Avatar
        </a>
      </button>
		</div>
	</div>
	<div class="content">
		<div class="contact-profile">
      <img src="storage/avatars/{{ Auth::user()->avatar }}" alt="" />
      <p>{{ Auth::user()->name  }}</p>
			<div class="social-media">
				<a href="logout"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
			</div>
		</div>
		<div class="messages">
			<ul>
          {{-- @foreach ($messages as $message )
            @if( $message->user->id == $user_id)
              <li class="sent">
            @else
              <li class="replies">
            @endif
              <img src="storage/avatars/{{ $message->user->avatar }}" alt="" />
              <p>{{ $message->message }}</p>
            </li>

          @endforeach --}}

			{{-- </ul>
		</div>
		<div class="message-input">
            <form action="/send" method="post">
                @csrf
			<div class="wrap">
            <input type="hidden" value="{{auth()->user()->id}}" name="user_id"/>
          <input type="text" name="message" placeholder="Write your message..." /> --}}
          {{-- <button class="submit" id='btn_send_message'>
            <i class="fa fa-paper-plane" aria-hidden="true"></i>
          </button> --}}
          {{-- <button type="submit" class="btn btn-danger" >valider</button>
        </form>

			</div>
		</div>
	</div>
</div> --}}


 {{-- Modal HTML embedded directly into document --}}
{{-- <div id="upload_avatar" class="modal">

  <form action="/profile" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <input type="file" class="form-control-file" name="avatar" id="avatarFile" aria-describedby="fileHelp">
        <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

</div>
</div>

</body>
</html> --}}


