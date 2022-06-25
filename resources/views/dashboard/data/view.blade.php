@extends('layout.dashboard')
@section('content')
  <div class="card">
    <div class="container-fluid">
      <div class="col-md-12 mt-4 d-flex">
        <div class="col-sm-8">
          <div class="card">
            <table class="table">
              <tbody>
                <tr>
                  <th scope="row">Name</th>
                  <td>
                    @if($user->name == NULL)
                    -
                    @else
                    {{ $user->name }}
                    @endif
                  </td>
                </tr>
                <tr>
                  <th scope="row">Email</th>
                  <td>
                    @if($user->email == NULL)
                    -
                    @else
                    {{ $user->email }}
                    @endif
                  </td>
                </tr>
                <tr>
                  <th scope="row">Alamat</th>
                  <td>
                    @if($user->address == NULL)
                    -
                    @else
                    {{ $user->address }}
                    @endif
                  </td>
                </tr>
                <tr>
                  <th scope="row">No HP</th>
                  <td>
                    @if($user->number == NULL)
                    -
                    @else
                    {{ $user->number }}
                    @endif
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-md-4 d-flex justify-content-center">
          <div class="card">
            @if($user->image != NULL)
            <img src="{{ asset('storage/' . $user->image) }}" alt="$user->name" class="img-fluid" style="height: 300px; width:300px">
            @else
            <img src="/img/default.jpg" class="card-img-top" style="height: 300px; width:300px"alt="{{ $user->name }}">
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection