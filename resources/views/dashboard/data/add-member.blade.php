@extends('layout.dashboard')
@section('content')
<div class="card">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">
                <div class="card">
                    <div class="card-header">
                        <form action="/dashboard/data/add-member" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="name" class="form-label">Name</label>
                                <input type="name" class="form-control" id="name" name="name" required value="{{ old('name') }}">
                            </div>
                            <div class="mb-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required value="{{ old('email') }}">
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="mb-4">
                                <label for="address" class="form-label">Address</label>
                                <input type="address" class="form-control" id="address" name="address" required value="{{ old('address') }}">
                            </div>
                            <div class="mb-4">
                                <label for="number" class="form-label">Number</label>
                                <input type="text" class="form-control" id="number" name="number" required value="{{ old('number') }}">
                            </div>
                            <a href="/dashboard/admin" class="btn btn-danger">Cancel</a>
                            <button input type="submit" value="Submit" class="btn btn-primary">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection