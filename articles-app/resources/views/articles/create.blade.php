@extends('layouts.app')

@section('title', 'Create Article')

@section('styles')
<style>
  /* خلفية متحركة */
  body {
    background: linear-gradient(270deg, #ff6a00, #ee0979, #00f260, #0575e6);
    background-size: 800% 800%;
    animation: gradientBG 20s ease infinite;
    min-height: 100vh;
  }

  @keyframes gradientBG {
    0% {background-position:0% 50%;}
    50% {background-position:100% 50%;}
    100% {background-position:0% 50%;}
  }

  /* كارد زجاجي */
  .glass-card {
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);
    border-radius: 15px;
    border: 1px solid rgba(255, 255, 255, 0.3);
    box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
  }

  /* تأثير على الأزرار */
  .btn-primary {
    background: linear-gradient(45deg, #6a11cb, #2575fc);
    border: none;
    transition: background 0.3s ease;
  }
  .btn-primary:hover {
    background: linear-gradient(45deg, #2575fc, #6a11cb);
    box-shadow: 0 4px 15px rgba(37, 117, 252, 0.6);
  }

  /* تأثير الحقول */
  input.form-control,
  textarea.form-control {
    background: rgba(255, 255, 255, 0.25);
    border: 1px solid rgba(255, 255, 255, 0.5);
    color: #fff;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
  }
  input.form-control:focus,
  textarea.form-control:focus {
    background: rgba(255, 255, 255, 0.35);
    border-color: #2575fc;
    box-shadow: 0 0 8px #2575fc;
    color: #fff;
  }

  label.form-label {
    color: #eee;
    font-weight: 600;
  }

  /* نص داخل الكارد */
  .card-header, .card-body {
    color: #eee;
  }

  /* رابط العودة */
  .btn-outline-secondary {
    color: #eee;
    border-color: #eee;
    transition: all 0.3s ease;
  }
  .btn-outline-secondary:hover {
    background-color: #eee;
    color: #2575fc;
    border-color: #2575fc;
  }
</style>
@endsection

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card glass-card shadow-lg">
                <div class="card-header bg-transparent border-0">
                    <h4 class="mb-0">Create New Article</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('articles.store') }}" method="POST" novalidate>
                        @csrf

                        <div class="mb-4">
                            <label for="title" class="form-label fw-semibold">Title</label>
                            <input
                                type="text"
                                class="form-control @error('title') is-invalid @enderror"
                                id="title"
                                name="title"
                                value="{{ old('title') }}"
                                placeholder="Enter article title"
                                required
                                autofocus
                            >
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="body" class="form-label fw-semibold">Content</label>
                            <textarea
                                class="form-control @error('body') is-invalid @enderror"
                                id="body"
                                name="body"
                                rows="8"
                                placeholder="Write your article content here..."
                                required
                            >{{ old('body') }}</textarea>
                            @error('body')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('articles.index') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left me-2"></i>Back to Articles
                            </a>
                            <button type="submit" class="btn btn-primary shadow-sm">
                                <i class="bi bi-check-circle me-2"></i>Create Article
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
