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

          <div class="panel-body">
            <div class="row">
              <div class="col-sm-12 col-md-12">
                <div class="thumbnail">
                  <h3>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h3>
                  <img src="{{asset(Auth::user()->image_path)}}" class="img-rounded" height="120" width="120" align="center">
                  <div class="caption">
                    <p>{{ $data->city }}, {{ $data->country }}</p>

                    <p><a href="{{ route('changePhoto') }}" class="btn btn-primary" role="button">Change Photo</a></p>
                  </div>
                </div>
              </div>

              <div class="col-sm-12 col-md-12">
                {{-- <h3><span class="label label-default">Update Profile</span></h3>
                <br> --}}
                <form class="" action="{{ route('updateProfile') }}" method="POST">
                  <input type="hidden" value="{{csrf_token()}}" name="_token">

                  <div class="col-md-4">
                    <div class="form-group-sm">
                      <label for="exampleInputCity">City</label>
                      <input type="text" class="form-control" id="city" name="city" placeholder="{{ $data->city }}">
                    </div>
                    <br>

                    <div class="form-group-sm">
                      <label for="exampleInputCountry">Country</label>
                      <input type="text" class="form-control" id="country" name="country" placeholder="{{$data->country}}">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <br>
                    <div class="form-group">
                      <label for="exampleInputAbout">About</label>
                      <textarea type="text" class="form-control" id="about" name="about" placeholder="{{$data->about}}" style="width:400px; height:150px"></textarea>
                    </div>
                    <div>
                      <button type="submit" class="btn btn-default submit"><i class="fa fa-paper-plane"aria-hidden="true"></i> Submit</button>
                    </div>
                  </div>
                </form>
                {{-- <div class="input-group">
                <span id="basic-addon1"></span>
                <input type="text" class="form-control" placeholder="City">
              </div>
              <div class="input-group">
              <span id="basic-addon1"> </span>
              <input type="text" class="form-control" placeholder="Country">
            </div>
            <div class="input-group">
            <span id="basic-addon1"></span>
            <textarea type="text" class="form-control" placeholder="About"></textarea>
          </div>
        </div> --}}

      </div>
    </div>
  </div>

</div>
</div>
</div>
</div>

@endsection
