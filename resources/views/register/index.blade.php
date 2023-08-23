@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-4">
        <main class="form-registration w-100 m-auto">
            <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>
            <form action="/register" method="POST">
                @csrf
              <div class="form-floating">
                <input type="text" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name" value="{{ old('name') }}">
                <label for="floatingInput">Name</label>
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
              </div>
              <div class="form-floating">
                <input type="text" class="form-control  @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username" value="{{ old('username') }}">
                <label for="floatingPassword">Username</label>
                    @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
              </div>
              <div class="form-floating">
                <input type="email" class="form-control  @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
                <label for="floatingPassword">Email Address</label>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
              </div>
              <div class="form-floating">
                <input type="password" class="form-control rounded-bottom  @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" value="{{ old('password') }}">
                 <label for="floatingPassword">Password</label>
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
              </div>
          
              <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Register</button>
            </form>
            <small class="d-block mt-2 text-center">Already Registered? <a href="/">Login!</a></small>
        </main>
    </div>
</div>

@endsection