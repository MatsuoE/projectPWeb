@extends('layout.dashboard')
@section('content')

@if(Session::get('success'))
<div class="alert alert-success" role="alert">
  <p> {{ 'New admin has been added' }} </p>
</div>
@endif

<div class="card">
  <div class="mt-3 mb-3 mr-4 text-right">
    <a href="/dashboard/data/add">
      <button type="button" class="btn btn-primary">Add new admin</button>
    </a>
    </div>
<table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Address</th>
        <th scope="col">Number</th>
<!--        <th scope="col">Option</th>     -->
      </tr>
    </thead>
    @php $no = 0; @endphp
      @foreach ($user as $user)
      <tbody>
        <tr>
          <th scope="row">{{ ++$no }}</th>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->address }}</td>
          <td>{{ $user->number }}</td>
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