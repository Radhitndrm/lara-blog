@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-4">
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
        
          @if(session()->has('loginFailed'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
              {{ session('loginFailed') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        <main class="form-signin w-100 m-auto">
            <h1 class="h3 mb-3 fw-normal text-center">Please login</h1>
            <form action="/" method="POST">
                @csrf
              <div class="form-floating">
                <input type="email"  class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="name@example.com" required value="{{ old('email') }}">
                <label for="email">Email address</label>
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="password"  class="form-control @error('email')is-invalid @enderror" id="password" name="password" placeholder="Password" autofocus required>
                <label for="password">Password</label>  
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
          
              <button class="btn btn-primary w-100 py-2" type="submit">login</button>
            </form>
            <small class="d-block mt-2 text-center">Not Registered? <a href="/register">Register Now!</a></small>
        </main>
    </div>
</div>

@endsection