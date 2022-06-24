@extends('layout.dashboard')
@section('content')
<div class="card">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">
                <div class="card">
                    <div class="card-header">
                        <form action="/dashboard/profile" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="mb-4">
                                <label for="name" class="form-label">Name</label>
                                <input type="name" class="form-control" id="name" name="name" required value="{{ old('name', $user->name) }}">
                            </div>
                            <div class="mb-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" disabled value="{{ old('email', $user->email) }}">
                            </div>
                            <div class="mb-4">
                                <label for="address" class="form-label">Address</label>
                                <input type="address" class="form-control" id="address" name="address" nullable value="{{ old('address', $user->address) }}">
                            </div>
                            <div class="mb-4">
                                <label for="number" class="form-label">Number</label>
                                <input type="text" class="form-control" id="number" name="number" nullable value="{{ old('number', $user->number) }}">
                            </div>
                            <div class="mb-4">
                                <label for="image" class="form-label">Photo</label>
                                <input type="hidden" name="oldImage" value="{{ $user->image }}">
                                @if($user->image)
                                    <img src="{{ asset('storage/' . $user->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                @else
                                    <img class="img-preview img-fluid mb-3 col-sm-5">
                                @endif
                                <input class="form-control" type="file" id="image" name="image" onchange="previewImage()">
                            </div>
                            <a href="/dashboardmember/profile/view" class="btn btn-danger">Cancel</a>
                            <button input type="submit" value="Submit" class="btn btn-primary">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
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