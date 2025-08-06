@extends('layouts.app')

@section('title', 'Login')

@section('content')
<style>
  html, body {
    height: 100%;
    margin: 0;
    background-color: #f0f2f5;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

  body {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .login-wrapper {
    width: 100%;
    max-width: 400px;
    padding: 2rem;
  }

  .card {
    background-color: #ffffff;
    border: none;
    border-radius: 1rem;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    padding: 2rem;
  }

  .form-control:focus {
    border-color: #6c63ff;
    box-shadow: 0 0 0 0.1rem rgba(108, 99, 255, 0.25);
  }

  .btn-primary {
    background: linear-gradient(to right, #6c63ff, #5f57d3);
    border: none;
  }

  .btn-primary:hover {
    background: linear-gradient(to right, #5f57d3, #4d47b5);
  }

  a {
    color: #6c63ff;
    text-decoration: none;
  }

  a:hover {
    text-decoration: underline;
  }

  .text-muted {
    font-size: 0.9rem;
    color: #6c757d !important;
  }

</style>

<div class="login-wrapper">
  <div class="card">
    <div class="text-center mb-4">
      <h3 class="fw-bold">Welcome Back</h3>
      <p class="text-muted">Sign in to your account</p>
    </div>

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror"
               id="email" name="email" value="{{ old('email') }}" required autofocus>
        @error('email')
          <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror"
               id="password" name="password" required>
        @error('password')
          <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
        <label class="form-check-label" for="remember">Remember me</label>
      </div>

      <div class="d-grid mb-3">
        <button type="submit" class="btn btn-primary">Login</button>
      </div>

      @if (Route::has('password.request'))
        <div class="text-center mb-3">
          <a href="{{ route('password.request') }}">Forgot Password?</a>
        </div>
      @endif

      <div class="text-center">
        <p class="mb-0 text-muted">
          Don't have an account?
          <a href="{{ route('register') }}">Sign up</a>
        </p>
      </div>
    </form>
  </div>
</div>
@endsection
