@extends('layout.dashboard')
@section('content')
<div class="card">
  <div class="mt-3 mb-3 mr-4 text-right">
    <form action="#">
      <button type="button" class="btn btn-primary">Add new admin</button>
    </form>
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
        <th scope="row">{{ $user->id }}</th>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
            @if($user->is_admin == 0)
            {{ 'Member' }}
            @else
            {{ 'Admin' }}
            @endif
        </td>
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