@extends('layout.main')
@section('container')
{{-- <link rel="stylesheet" href="/css/signin.css"> --}}

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-5">

      @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if(session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
          {{ session('loginError') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

      <main class="form-signin m-auto">
        <h1 class="h3 mb-3 fw-normal text-center">Login</h1>
        <form action="/login" method="post">
          @csrf
          <div class="form-floating">
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" name="email" autofocus required value="{{ old('email') }}">
            @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
            <label for="email">Email address</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
            <label for="password">Password</label>
          </div>
    
          <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
        </form>
        
        <h6 class="h6 mt-2 mb-1 fw-normal text-center">Don't have account?</h6>
        <small class="d-block text-center"><a href="/regist">Make new account</a></small>
      
      </main>
    </div>
  </div>
</div>
@endsection

