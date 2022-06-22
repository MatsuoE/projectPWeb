@extends('layout.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="card">
                <div class="card-body">
                    <form action="/dashboard/products/allcategory/create" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="name" name="name" required value="{{ old('name') }}">
                        </div>
                        <a href="/dashboard/products/allcategory" class="btn btn-danger">Back</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
    const name = document.querySelector('#name');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
        fetch('/dashboard/products/allcategory/create/checkSlug?name=' + name.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });
    </script>
@endsection