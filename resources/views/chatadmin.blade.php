@extends('layouts.entete')

@section('content')

<div class="chat">
    <input type='hidden' value='' name='user_id' />
    <div id="frame">
        <div id="sidepanel">
            <div id="search" style='padding-top:5px;padding-bottom:5px;'>
          <p style='text-align:center;font-weight:bold;font-size=40px;'>User List</p>
            </div>
            <div >
        <ul>
            @foreach ($users as $user)
            <a href="{{route('chatadmin.show',$user->id)}}"><li><h3>{{$user->name}}</h3></li></a>
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
          <img src="storage/avatars/" alt="" />
          <p></p>
                <div class="social-media">
                    <a href="logout"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="messages">
              @foreach ($messages as $message)
              <p>{{$message->message}}</p>

              @endforeach
            </div>
            <div class="message-input">
             <form action="{{route('chatadmin.store')}}" method="post">
                @csrf
                <div class="wrap">
                    @foreach ($users as $user)
                <input type="hidden" value="{{$user->id}}" name="user_id"/>
                @endforeach
                @foreach ($messages as $message)
                <input type="hidden" value="{{$message->id}}" name="message_id"/>
                @endforeach
                <input type="text" name="answers" placeholder="Write your message..." />
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



