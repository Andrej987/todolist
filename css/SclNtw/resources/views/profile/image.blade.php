@extends('profile.master  ')

@section('content')
  <div class="container">
    <ol class="breadcrumb">
      <li><a href="{{ route('home') }}">Home</a></li>
      <li>/</li>
      <li><a href="{{ route('profile',['id'=>Auth::user()->id]) }}">Profile</a></li>
      <li>/</li>
      <li><a href="{{ route('editProfile') }}">Edit Profile</a></li>
      <li>/</li>
      <li><a>Change Image</a></li>
    </ol>
    <div class="row">
      @include('profile.sidebar')
      <div class="col-md-9">
        <div class="panel panel-default">
          <div class="panel-heading">{{Auth::user()->firstname}}{{ Auth::user()->lastname }}</div>

          <div class="panel-body">
            <div class="col-md-4">
                Welcome to your profile !
                <img src="{{ Auth::user()->image_path }}" width="100px" height="100px"/><br>
                <br>
                <hr>
                <form action= "{{ route('uploadPhoto')}}" method="POST" enctype="multipart/form-data">
                  <input type="file" name="file" id="file" >
                      <input type="submit" value="Upload" name="submit">
                      <input type="hidden" value="{{csrf_token()}}" name="_token">
                </form>
              </div>
            </div>

        </div>
      </div>
    </div>
  </div>
@endsection
