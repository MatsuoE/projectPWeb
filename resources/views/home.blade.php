@extends('layout.main')
@section('container')
  <div class="container">
    <div class="row justify-content-center mt-3">
      @foreach($category as $category)
        <h4 class="text-center">{{ $category->name }}</h4>
        @for ($i = 0; $i < 1; $i++)
              @foreach($category->product->sortDesc()->take(3) as $p)
          <div class="col-md-3">
            <a href="/product/{{ $p->slug }}">
            <div class="card" style="width: 18rem;">
              <div class="position-absolute bg-dark px-3 py-2 text-white" style="background-color: rgba(0, 0, 0, 0.183)">
                {{ $p->category->name }}
            </div>
              @if($p->image)
                        <img src="{{ asset('storage/' . $p->image) }}" alt="$product->category->name" class="img-fluid" style="height: 230px; width:500px">
                    @else
                    <img src="https://source.unsplash.com/500x400?{{ $p->category->name }}" class="card-img-top" alt="{{ $p->category->name }}">
                    @endif
            </a>
              <div class="card-body">
                <h5 class="card-title text-center">{{ $p->title }}</h5>
              </div>
            </div>
          </div>
                  @endforeach
        @endfor
          <div class="d-flex justify-content-center">
            <a href="/product?category={{ $category->slug }}" class="btn btn-primary mt-3 mb-4">View More</a>
            </div>
        @endforeach
    </div>
  </div>
@endsection

