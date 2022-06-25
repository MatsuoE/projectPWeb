@extends('layout.dashboard')
@section('content')

@if(Session::get('success'))
<div class="alert alert-success" role="alert">
  <p> {{ 'New admin has been added' }} </p>
</div>
@endif

<div class="card">
    <div class="mt-3 mb-3 mr-4 text-right">
      <a href="/dashboard/data/add-member">
        <button type="button" class="btn btn-primary">Add new member</button>
      </a>
      </div>
  <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Role</th>
  <!--        <th scope="col">Option</th>     -->
        </tr>
      </thead>
      @foreach ($user as $user)
      <tbody>
        <tr>
          @if($user->isAdmin == 0)
          <th scope="row">{{ $user->id }}</th>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>
              @if($user->isAdmin == 0)
              {{ 'Member' }}
              @else
              {{ 'Admin' }}
              @endif
          </td>
          @endif
          {{--
          <td class="text-center">
            <a class="btn btn-sm btn-warning" href="/dashboard/category/edit"><i class="fa fa-pen"></i></a>
          --}}
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection