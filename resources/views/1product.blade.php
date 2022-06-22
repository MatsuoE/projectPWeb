@extends('layout.main')
@section('container')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>{{ $product->title }}</h2>
            <p>Category: <a href="/product?category={{ $product->category->slug }}" class='text-decoration-none'>{{ $product->category->name }}</a></p>
            @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="$product->category->name" class="img-fluid" style="height: 538px; width:1000px">
                    @else
                    <img src="https://source.unsplash.com/500x400?{{ $product->category->name }}" class="card-img-top" alt="{{ $product->category->name }}">
                    @endif</div>
            <div class="col-md-6 mt-5"><h3 class="mt-5">Price: Rp {{ $product->price }},00</h3>
                {!! $product->body !!}
                <a href="/product" class='d-block mt-2'>Back to Main</a>
            </div>   
        </div>
    </div>
</div>
@endsection