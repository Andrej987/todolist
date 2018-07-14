@extends('profile.master')

@section('content')
<div class="container">
  <ol class="breadcrumb">
    <li><a href="{{ route('home') }}">Home</a></li>
    {{-- <li>/</li>
    <li><a href="{{ route('profile',['id'=>Auth::user()->id]) }}">Profile</a></li> --}}
  </ol>
    <div class="row justify-content-center">
        @include('profile.sidebar')
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
