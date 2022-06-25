@extends('layout.dashboard')
@section('content')

@if(Session::get('success'))
<div class="alert alert-success" role="alert">
  <p> {{ 'New category has been added' }} </p>
</div>
@endif

<div class="card">
  <div class="mt-3 mb-3 mr-4 text-right">
    <form action="/dashboard/products/allcategory/create">
      <a href="/dashboard/products/allcategory/create">
        <button type="button" class="btn btn-primary">Add new category</button>
      </a>
    </form>
    </div>
<table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
<!--        <th scope="col">Option</th>     -->
      </tr>
    </thead>
    @foreach ($category as $category)
    <tbody>
      <tr>
        <th scope="row">{{ $category->id }}</th>
        <td>{{ $category->name }}</td>
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