<!DOCTYPE html>

<html>

<head>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>page de chat</title>
  <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,300' rel='stylesheet' type='text/css'>
  <script src="https://js.pusher.com/4.4/pusher.min.js"></script>
  <script src="https://use.typekit.net/hoy3lrg.js"></script>
  <script>try{Typekit.load({ async: true });}catch(e){}</script>

  <link rel='stylesheet prefetch' href="{{ asset('css/reset.min.css') }}" >

  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
  <!-- jQuery Modal -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
  <!-- Latest compiled and minified CSS -->
  <link rel='stylesheet prefetch' href="{{ asset('css/chatter.css') }}" >

</head>
<body>

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

			</ul>
		</div>
		<div class="message-input">
            <form action="/send" method="post">
                @csrf
			<div class="wrap">
            <input type="hidden" value="{{auth()->user()->id}}" name="user_id"/>
          <input type="text" name="message" placeholder="Write your message..." />
          {{-- <button class="submit" id='btn_send_message'>
            <i class="fa fa-paper-plane" aria-hidden="true"></i>
          </button> --}}
          <button type="submit" class="btn btn-danger" >valider</button>
        </form>

			</div>
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

{{-- <script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script> --}}
<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script src='{{ asset('js/chatter.js') }}'></script>

</body>
</html>
