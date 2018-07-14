@extends('profile.master')

@section('content')

  <div class="container">
    <ol class="breadcrumb">
      <li><a href="{{ route('home') }}">Home</a></li>
      <li>/</li>
      <li><a href="{{ route('profile',['id'=>Auth::user()->id]) }}">Profile</a></li>
      <li>/</li>
      <li><a href="{{ route('editProfile') }}">Edit Profile</a></li>
    </ol>
    <div class="row justify-content-center">
      @include('profile.sidebar')
      <div class="col-md-9">
        <div class="panel panel-default">
          <div class="panel-heading">{{Auth::user()->firstname}}{{ Auth::user()->lastname }}</div>
          <br>

          <div class="panel-body">
            <div class="row">
              <div class="col-sm-12 col-md-12">
                @foreach ($users as $user)
                  <div class="col-md-4" style="margin:5px">
                    <div class="thumbnail" >
                  <a href="#"><h3 align="left">{{ $user-> firstname }} {{ $user-> lastname }}</h3></a>
                      <img src="{{asset($user->image_path)}}" class="img-rounded" height="120" width="120" align="center">
                      <div class="caption" align="left">
                        <p>{{ $user->city }}, {{ $user->country }}</p>
                      </div>
                    </div>
                    <p>{{ $user->about }}</p>
                  </div>


                  <div class="col-md-3 pull-right">
                    @if ($friend_request_send->contains($user->id))
                      <p>Request Already Sent</p>
                    @else
                      <p><a href="{{ route('addFriend',['id'=>$user->id]) }}" class="btn btn-success">Add Friend</a></p>
                    @endif
                  </div>
                @endforeach
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

@endsection
