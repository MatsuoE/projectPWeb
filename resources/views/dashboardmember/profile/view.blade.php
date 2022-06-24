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
            <table class="table">
              <tbody>
                <tr>
                  <th scope="row">Name</th>
                  <td>{{ $user->name }}</td>
                </tr>
                <tr>
                  <th scope="row">Email</th>
                  <td>{{ $user->email }}</td>
                </tr>
                <tr>
                  <th scope="row">Alamat</th>
                  <td>{{ $user->address }}</td>
                </tr>
                <tr>
                  <th scope="row">No HP</th>
                  <td>{{ $user->number }}</td>
                </tr>
              </tbody>
            </table>
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