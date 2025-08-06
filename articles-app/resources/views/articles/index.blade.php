@extends('layouts.app')

@section('title', 'Articles')

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
    transition: transform 0.2s ease;
  }

  .glass-card:hover {
    transform: translateY(-5px);
  }

  .glass-card .card-title {
    color: #f8fafc;
    font-weight: 600;
  }

  .glass-card .card-text,
  .glass-card small {
    color: #cbd5e1 !important;
  }

  .btn-outline-light {
    border-color: #cbd5e1;
    color: #f1f5f9;
  }

  .btn-outline-light:hover {
    background-color: #cbd5e1;
    color: #0f172a;
  }

  .btn-outline-danger:hover {
    background-color: #f87171;
    color: white;
  }

  .alert {
    border-radius: 0.75rem;
  }

  .text-light-50 {
    color: #94a3b8 !important;
  }

  .text-center i {
    color: #64748b;
  }

  .btn-primary {
    background: linear-gradient(to right, #6366f1, #8b5cf6);
    border: none;
  }

  .btn-primary:hover {
    background: linear-gradient(to right, #4f46e5, #7c3aed);
  }

</style>

<div class="container py-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0 text-light">Articles</h1>
    <a href="{{ route('articles.create') }}" class="btn btn-primary">
      <i class="bi bi-plus-circle me-2"></i>Create Article
    </a>
  </div>

  @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif

  <div class="row">
    @forelse($articles as $article)
      <div class="col-md-6 col-lg-4 mb-4">
        <div class="card glass-card h-100 shadow-sm text-light">
          <div class="card-body d-flex flex-column justify-content-between">
            <div>
              <h5 class="card-title">{{ $article->title }}</h5>
              <p class="card-text text-light-50">
                {{ \Illuminate\Support\Str::limit($article->body, 100) }}
              </p>
            </div>
            <div class="mt-3 d-flex justify-content-between align-items-center">
              <small class="text-light-50">
                By {{ $article->user->name ?? 'Unknown' }}
              </small>
              <div class="btn-group" role="group">
                <a href="{{ route('articles.show', $article->id) }}"
                   class="btn btn-sm btn-outline-light">View</a>
                @can('update', $article)
                  <a href="{{ route('articles.edit', $article->id) }}"
                     class="btn btn-sm btn-outline-light">Edit</a>
                @endcan
                @can('delete', $article)
                  <form action="{{ route('articles.destroy', $article->id) }}"
                        method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-danger"
                            onclick="return confirm('Are you sure?')">Delete</button>
                  </form>
                @endcan
              </div>
            </div>
          </div>
        </div>
      </div>
    @empty
      <div class="col-12">
        <div class="text-center py-5 text-light">
          <i class="bi bi-journal-text display-1 mb-3"></i>
          <h3 class="mt-3">No Articles Yet</h3>
          <p class="text-light-50">Be the first to create an article!</p>
          <a href="{{ route('articles.create') }}" class="btn btn-primary mt-2">
            Create Your First Article
          </a>
        </div>
      </div>
    @endforelse
  </div>
</div>
@endsection
