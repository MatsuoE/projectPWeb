@extends('layout.main')
@section('container')
{{-- <link rel="stylesheet" href="/css/signin.css"> --}}

<div class="container">
  <div class="row justify-content-center">
    <!-- <div class="col-md-5"> -->
      <main class="form-regist m-auto">
        <form action="/regist" method="POST">
          @csrf
          
          <h1 class="h3 mt-3 mb-3 fw-normal text-center">Registration</h1>
    
          <div class="form-floating mb-3">
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name" value="{{ old('name') }}">
            @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
            <label for="name">Name</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Address" value="{{ old('address') }}">
            @error('address')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
            <label for="address">Alamat</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" name="number" class="form-control @error('number') is-invalid @enderror" id="number" placeholder="Number" value="{{ old('number') }}">
            @error('number')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
            <label for="number">No HP</label>
          </div>
          <div class="form-floating mb-3">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" value="{{ old('email') }}">
            @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
            <label for="email">Email address</label>
          </div>
          <div class="form-floating mb-4">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password">
            @error('password')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
            <label for="password">Password</label>
          </div>
    
          <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
          
          <h6 class="h6 mt-2 mb-1 fw-normal text-center">Already have account?</h6>
          <small class="d-block text-center"><a href="/login">Login</a></small>
        
        </form>
      </main>
    
  </div>
</div>
@endsection

