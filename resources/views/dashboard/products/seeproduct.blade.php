@extends('layout.dashboard')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>{{ $product->title }}</h2>
            <p>Category: <a href="/product?category={{ $product->category->slug }}" class='text-decoration-none'>{{ $product->category->name }}</a></p>
            @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->category->name }}" class="img-fluid">
            @else
            <img src="https://source.unsplash.com/500x400?{{ $product->category->name }}" class="card-img-top" alt="{{ $product->category->name }}">
            @endif
        </div>
            <div class="col-md-6 mt-5">
                <h3 class="mt-5">
                    Price: Rp {{ $product->price }},00
                </h3>
                {!! $product->body !!}
                <div style="text-align: center" class="mt-3 mb-3 d-grid gap-2 col-6 mx-auto">
                    <a class="btn btn-warning" href="/dashboard/products/{{ $product->slug }}/edit">EDIT <i class="fa fa-pen"></i></a>
                    <form action="/dashboard/products/all/{{ $product->slug }}" method="POST" class="d-inline">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger" onclick="return confirm('Do you want to delete this product?')">DELETE <i class="fa fa-trash"></i></button>
                    </form>
                </div>
                <a href="/dashboard/products/all" class='d-block mt-2'>Back to Product</a>
            </div>   
    </div>
</div>
@endsection