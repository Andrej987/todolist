@extends('profile.master')

@section('content')
  <div class="container">
    <ol class="breadcrumb">
      <li><a href="{{ route('home') }}">Home</a></li>
      <li>/</li>
      <li><a href="{{ route('profile',['id'=>Auth::user()->id]) }}">Profile</a></li>
    </ol>
    <div class="row justify-content-center">
      @include('profile.sidebar')
      <div class="col-md-9">
        <div class="panel panel-default">
          {{-- <div class="panel-heading">{{Auth::user()->firstname}}{{ Auth::user()->lastname }}</div> --}}

          <div class="panel-body">
            <div class="row">
              <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                  <h3>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h3>
                  <img src="{{asset(Auth::user()->image_path)}}" class="img-rounded" height="120" width="120" align="center">
                  <div class="caption">
                    <p>{{ $data->city }}, {{ $data->country }}</p>

                    <p><a href="{{ route('editProfile') }}" class="btn btn-primary" role="button">Edit Profile</a></p>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
                <h3><span class="label label-default">About</span></h3>
                <p>{{ $data->about }}</p>
              </div>
              {{--
              <div class="col-md-4">
              Welcome to your profile !<br>
              <a href="{{ route('changePhoto') }}">Change Photo</a>
            </div> --}}
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection
