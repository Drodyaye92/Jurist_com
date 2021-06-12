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



