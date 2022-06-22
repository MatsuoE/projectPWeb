@extends('layout.dashboardmember')
@section('content')

@if(Session::get('edited'))
<div class="alert alert-success" role="alert">
  <p> {{ 'Your profile has been edited' }} </p>
</div>
@endif
  <div class="card">
    <div class="container-fluid">
      <div class="col-md-12 mt-4 d-flex">
        <div class="col-sm-8">
          <div class="card">
            <p>Name     : {{ $user->name }}</p>
            <p>Email    : {{ $user->email }}</p>
            <p>Alamat   : {{ $user->address }}</p>
            <p>No HP    : {{ $user->number }}</p>
          </div>
        </div>
        <div class="col-md-4 d-flex justify-content-center">
          <div class="card">
            @if($user->image)
            <img src="{{ asset('storage/' . $user->image) }}" alt="$user->name" class="img-fluid" style="height: 200px; width:300px">
            @else
            <img src=" " class="card-img-top" alt="{{ $user->name }}">
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection