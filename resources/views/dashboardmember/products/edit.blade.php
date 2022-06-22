@extends('layout.dashboard')
@section('content')
@php
use Symfony\Component\Console\Input\Input;
@endphp
<div class="container-fluid">
    <div class="row">
        <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Edit Product</h1>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Alert!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    
                    <form action="/dashboard/products/{{ $product->slug }}/edit" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="mb-4">
                            <label for="title" class="form-label">Product Name</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required value="{{ old('title', $product->title) }}">
                            @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug" disabled required value="{{ old('slug', $product->slug) }}">
                        </div>
                        <div class="mb-4">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" class="form-control  @error('stock') is-invalid @enderror" id="stock" name="stock" value="{{ old('stock', $product->stock) }}">
                            @error('stock')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="hidden" name="oldImage" value="{{ $product->image }}">
                            @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                            @else
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                            @endif
                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                            @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                          </div>                          
                        <div class="mb-4">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value = "{{ old('price', $product->price) }}">
                            @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-select" name='category_id'>
                                @foreach ($category as $c)
                                    @if(old('category_id', $product->category_id) == $c->id)
                                        <option value="{{ $c->id }}" selected>{{ $c->name }}</option>
                                    @else
                                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="body" class="form-label">Description</label>
                            <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body">{{  old('body', $product->body)  }}</textarea>
                            @error('body')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                            {{-- 
                                -- If you want to use Trix-Editor -- 
                            <input type="hidden" class="form-control @error('body') is-invalid @enderror" id="body" name="body" value="{{ old('body') }}">
                            <trix-editor input="body"></trix-editor>
                            --}}
                            
                        </div>
                        <a href="/dashboard/products/all" class="btn btn-danger">Cancel</a>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
        fetch('/dashboard/products/create/checkSlug?title=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });

    function previewImage(){
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection