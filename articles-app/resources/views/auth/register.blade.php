@extends('layouts.app')

@section('title', 'Register')

@section('content')
<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

  html, body {
    overflow: hidden;
    height: 100%;
  }

  body {
    font-family: 'Poppins', sans-serif;
    min-height: 100vh;
    margin: 0;
    background: linear-gradient(-45deg, #667eea, #764ba2, #89f7fe, #66a6ff);
    background-size: 400% 400%;
    animation: gradientBG 15s ease infinite;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  @keyframes gradientBG {
    0% {background-position: 0% 50%;}
    50% {background-position: 100% 50%;}
    100% {background-position: 0% 50%;}
  }

  .fade-in {
    animation: fadeInUp 1s ease forwards;
    opacity: 0;
    transform: translateY(20px);
  }

  @keyframes fadeInUp {
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .card {
    border-radius: 1.5rem;
    box-shadow: 0 25px 45px rgba(0,0,0,0.15);
    background: #fff;
    padding: 2.5rem 2rem;
    width: 100%;
    max-width: 500px;
  }

  .display-1 {
    color: #764ba2;
    font-size: 4rem;
    filter: drop-shadow(0 0 10px #a77de0);
    animation: pulseGlow 2.5s ease-in-out infinite;
  }

  @keyframes pulseGlow {
    0%, 100% {
      filter: drop-shadow(0 0 10px #a77de0);
      transform: scale(1);
    }
    50% {
      filter: drop-shadow(0 0 25px #b08ff5);
      transform: scale(1.05);
    }
  }

  h2 {
    font-weight: 700;
    color: #3c1361;
  }

  p {
    font-weight: 500;
    color: #5a4b8b;
  }

  .input-group-text {
    background: #764ba2;
    border: none;
    color: #fff;
    font-size: 1.2rem;
  }

  .form-control {
    border-radius: 0 0.375rem 0.375rem 0;
    border: 2px solid transparent;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
    font-size: 1rem;
  }

  .form-control:focus {
    border-color: #764ba2;
    box-shadow: 0 0 10px #764ba2;
    outline: none;
  }

  .btn-primary {
    background: linear-gradient(45deg, #764ba2, #667eea);
    border: none;
    padding: 0.85rem 1.5rem;
    font-size: 1.15rem;
    font-weight: 600;
    border-radius: 50px;
    box-shadow: 0 6px 15px rgba(118, 75, 162, 0.5);
    cursor: pointer;
    transition: all 0.35s ease;
    user-select: none;
  }

  .btn-primary:hover {
    background: linear-gradient(45deg, #8b6eea, #9465b8);
    box-shadow: 0 10px 20px rgba(118, 75, 162, 0.8);
    transform: scale(1.08);
  }

  .btn-primary:active {
    transform: scale(0.98);
    box-shadow: 0 4px 10px rgba(118, 75, 162, 0.4);
  }

  .form-check-input {
    cursor: pointer;
    border-color: #764ba2;
    transition: box-shadow 0.3s ease;
  }

  .form-check-input:checked {
    background-color: #764ba2;
    border-color: #764ba2;
    box-shadow: 0 0 8px #764ba2;
  }

  .invalid-feedback {
    font-size: 0.875rem;
  }

  a.text-decoration-none {
    color: #764ba2;
    font-weight: 600;
    transition: color 0.3s ease;
  }

  a.text-decoration-none:hover {
    color: #5a3b94;
    text-decoration: underline;
  }

  hr {
    margin: 2rem 0;
    border-top: 1px solid #eee;
  }

  .text-center > p {
    font-size: 1rem;
  }
</style>

<div class="fade-in">
  <div class="card shadow-lg">
    <div class="text-center mb-4">
      <i class="bi bi-person-plus display-1"></i>
      <h2 class="mt-3">Create Account</h2>
      <p class="text-muted">Join our community today</p>
    </div>

    <form method="POST" action="">
      @csrf

      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="name" class="form-label fw-semibold">Full Name</label>
          <div class="input-group shadow-sm">
            <span class="input-group-text"><i class="bi bi-person"></i></span>
            <input type="text" class="form-control @error('name') is-invalid @enderror"
                   id="name" name="name" value="{{ old('name') }}" required autofocus>
          </div>
          @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="col-md-6 mb-3">
          <label for="username" class="form-label fw-semibold">Username</label>
          <div class="input-group shadow-sm">
            <span class="input-group-text"><i class="bi bi-at"></i></span>
            <input type="text" class="form-control @error('username') is-invalid @enderror"
                   id="username" name="username" value="{{ old('username') }}" required>
          </div>
          @error('username')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label fw-semibold">Email Address</label>
        <div class="input-group shadow-sm">
          <span class="input-group-text"><i class="bi bi-envelope"></i></span>
          <input type="email" class="form-control @error('email') is-invalid @enderror"
                 id="email" name="email" value="{{ old('email') }}" required>
        </div>
        @error('email')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="password" class="form-label fw-semibold">Password</label>
        <div class="input-group shadow-sm">
          <span class="input-group-text"><i class="bi bi-lock"></i></span>
          <input type="password" class="form-control @error('password') is-invalid @enderror"
                 id="password" name="password" required>
        </div>
        @error('password')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="password_confirmation" class="form-label fw-semibold">Confirm Password</label>
        <div class="input-group shadow-sm">
          <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
          <input type="password" class="form-control"
                 id="password_confirmation" name="password_confirmation" required>
        </div>
      </div>

      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
        <label class="form-check-label" for="terms">
          I agree to the <a href="#" class="text-decoration-none">Terms of Service</a>
        </label>
      </div>

      <div class="d-grid">
        <button type="submit" class="btn btn-primary btn-lg shadow">Create Account</button>
      </div>
    </form>

    <hr class="my-4">

    <div class="text-center">
      <p class="mb-0">Already have an account?
        <a href="{{ route('login') }}" class="text-decoration-none">Sign in</a>
      </p>
    </div>
  </div>
</div>
@endsection
