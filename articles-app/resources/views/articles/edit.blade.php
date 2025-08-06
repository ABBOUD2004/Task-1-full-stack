@extends('layouts.app')

@section('title', 'Edit Article')

@section('content')
<style>
  body {
    background-color: #0f172a;
  }

  .glass-card {
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(12px);
    border-radius: 1rem;
    border: 1px solid rgba(255, 255, 255, 0.1);
    color: #f8fafc;
  }

  .form-label {
    color: #e2e8f0;
    font-weight: 500;
  }

  .form-control {
    background-color: rgba(255, 255, 255, 0.1);
    border: 1px solid #94a3b8;
    color: #f1f5f9;
  }

  .form-control:focus {
    background-color: rgba(255, 255, 255, 0.15);
    border-color: #6366f1;
    color: #fff;
  }

  .form-control::placeholder {
    color: #94a3b8;
  }

  .invalid-feedback {
    color: #f87171;
  }

  .btn-primary {
    background: linear-gradient(to right, #6366f1, #8b5cf6);
    border: none;
  }

  .btn-primary:hover {
    background: linear-gradient(to right, #4f46e5, #7c3aed);
  }

  .btn-secondary {
    background-color: #334155;
    border: none;
    color: #f1f5f9;
  }

  .btn-secondary:hover {
    background-color: #1e293b;
  }
</style>

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card glass-card shadow-lg p-4">
        <div class="mb-4">
          <h3 class="mb-0 text-light">
            <i class="bi bi-pencil-square me-2"></i>Edit Article
          </h3>
        </div>

        <form action="{{ route('articles.update', $article->id) }}" method="POST">
          @csrf
          @method('PUT')

          <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text"
                   class="form-control @error('title') is-invalid @enderror"
                   id="title" name="title"
                   value="{{ old('title', $article->title) }}" required>
            @error('title')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="body" class="form-label">Content</label>
            <textarea class="form-control @error('body') is-invalid @enderror"
                      id="body" name="body" rows="8" required>{{ old('body', $article->body) }}</textarea>
            @error('body')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('articles.index') }}" class="btn btn-secondary">
              <i class="bi bi-arrow-left me-2"></i>Cancel
            </a>
            <button type="submit" class="btn btn-primary">
              <i class="bi bi-check-circle me-2"></i>Update Article
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
