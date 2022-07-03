@extends('layout.dashboard')
@section('content')

@if(Session::get('success'))
<div class="alert alert-success" role="alert">
  <p> {{ 'Your product has been added' }} </p>
</div>
@endif

@if(Session::get('edited'))
<div class="alert alert-success" role="alert">
  <p> {{ 'Your product has been edited' }} </p>
</div>
@endif

@if(Session::get('deleted'))
<div class="alert alert-success" role="alert">
  <p> {{ 'Your product has been deleted' }} </p>
</div>
@endif

<div class="card">
  <div class="mt-3 mb-3 mr-4 text-right">
    <form action="/dashboard/products/create">
      <button type="submit" class="btn btn-primary">Add new product</button>
    </form>
    </div>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Image</th>
        <th scope="col">Category</th>
        <th scope="col">Price</th>
        <th scope="col">Option</th>
      </tr>
    </thead>
    @php $no = 0; @endphp
    @foreach ($product as $product)
    <tbody>
      <tr>
        <th scope="row">{{ ++$no }}</th>
        <td>{{ $product->title }}</td>
        <td>
          @if($product->image)
          <img src="{{ asset('storage/' . $product->image) }}" alt="$product->category->name" class="img-fluid" style="height: 120px; width:250px">
          @else
          <img src="https://source.unsplash.com/500x400?{{ $product->category->name }}" class="card-img-top" alt="{{ $product->category->name }}" style="height: 120px; width:250px">
          @endif
        </td>
        <td>{{ $product->category->name }}</td>
        <td>{{ "Rp $product->price, 00" }}</td>
        <td class="text-center">
          <a class="btn btn-sm btn-success mr-1" href="/dashboard/products/{{ $product->slug }}"><i class="fa fa-eye"></i></a>
          <a class="btn btn-sm btn-warning mr-1" href="/dashboard/products/{{ $product->slug }}/edit"><i class="fa fa-pen"></i></a>
          <form action="/dashboard/products/all/{{ $product->slug }}" method="POST" class="d-inline">
            @csrf
            @method('delete')
            <button class="btn btn-sm btn-danger" onclick="return confirm('Do you want to delete this product?')"><i class="fa fa-trash"></i></button>
          </form>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
  @endsection