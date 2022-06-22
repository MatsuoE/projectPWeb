@extends('layout.dashboard')
@section('content')
<div class="card">
    <div class="mt-3 mb-3 ml-4 text-left">
        <form action="#">
            <button type="button" class="btn btn-primary">Edit Profil</button>
        </form>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="card">
                    <div class="card-header">
                        @method('put')
                        @csrf
                        <div class="mb-4">
                            <label for="title" class="form-label">Name</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label for="title" class="form-label">Email</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label for="title" class="form-label">Password</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label for="title" class="form-label">Role</label>
                            <select type="form-select" name="role">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  @endsection