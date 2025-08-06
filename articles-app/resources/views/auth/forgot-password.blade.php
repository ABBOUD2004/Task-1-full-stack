
@extends('layouts.app')

@section('title', 'Forgot Password')

@section('content')
<style>

  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

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
    border-radius: 1.25rem;
    box-shadow: 0 25px 45px rgba(0,0,0,0.15);
    background: #fff;
    padding: 2.5rem 2rem;
    width: 100%;
    max-width: 450px;
  }

  .display-1 {
    color: #764ba2;
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
    background: linear-gradient(45deg, #667eea, #764ba2);
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

  .invalid-feedback {
    font-size: 0.875rem;
  }

  .alert-success {
    background-color: #d4edda;
    border-color: #c3e6cb;
    color: #155724;
    font-weight: 600;
    border-radius: 8px;
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

</style>

<div class="fade-in">
  <div class="card shadow-lg">
    <div class="text-center mb-4">
      <i class="bi bi-question-circle display-1"></i>
      <h2 class="mt-3">Forgot Password?</h2>
      <p>Enter your email to reset your password</p>
    </div>

    @if (session('status'))
      <div class="alert alert-success" role="alert">
        {{ session('status') }}
      </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
      @csrf
      <div class="mb-4">
        <label for="email" class="form-label fw-semibold">Email Address</label>
        <div class="input-group shadow-sm">
          <span class="input-group-text"><i class="bi bi-envelope"></i></span>
          <input
            type="email"
            class="form-control @error('email') is-invalid @enderror"
            id="email"
            name="email"
            value="{{ old('email') }}"
            required
            autofocus
            placeholder="your-email@example.com"
          >
        </div>
        @error('email')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="d-grid mb-3">
        <button type="submit" class="btn btn-primary btn-lg shadow">Send Reset Link</button>
      </div>
    </form>

    <hr>

    <div class="text-center">
      <p class="mb-0">
        Remember your password?
        <a href="{{ route('login') }}" class="text-decoration-none">Back to login</a>
      </p>
    </div>
  </div>
</div>
@endsection
