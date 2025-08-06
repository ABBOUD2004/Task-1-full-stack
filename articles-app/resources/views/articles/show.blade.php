@extends('layouts.app')

@section('title', $article->title)

@section('content')
<style>
  body {
    background-color: #0f172a; 
  }

  .glass-card {
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(12px);
    border-radius: 1rem;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
    border: 1px solid rgba(255, 255, 255, 0.08);
    padding: 1rem;
  }

  .glass-card h4,
  .glass-card .article-content,
  .glass-card small,
  .glass-card .btn {
    color: #f1f5f9 !important;
  }

  .glass-card small {
    font-size: 0.85rem;
    color: #cbd5e1 !important;
  }

  .glass-card .btn-outline-light {
    border-color: #94a3b8;
    color: #cbd5e1;
  }

  .glass-card .btn-outline-light:hover {
    background-color: #cbd5e1;
    color: #1e293b;
  }

  .glass-card .btn-outline-danger {
    color: #f87171;
    border-color: #f87171;
  }

  .glass-card .btn-outline-danger:hover {
    background-color: #f87171;
    color: #fff;
  }

  .btn-secondary {
    background-color: #334155;
    border: none;
  }

  .btn-secondary:hover {
    background-color: #475569;
  }
</style>

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card glass-card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center border-0">
          <h4 class="mb-0">{{ $article->title }}</h4>
          <div class="btn-group" role="group">
            @can('update', $article)
              <a href="{{ route('articles.edit', $article->id) }}"
                 class="btn btn-sm btn-outline-light">
                <i class="bi bi-pencil me-1"></i>Edit
              </a>
            @endcan
            @can('delete', $article)
              <form action="{{ route('articles.destroy', $article->id) }}"
                    method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger"
                        onclick="return confirm('Are you sure you want to delete this article?')">
                  <i class="bi bi-trash me-1"></i>Delete
                </button>
              </form>
            @endcan
          </div>
        </div>
        <div class="card-body">
          <div class="mb-3">
            <small>
              By {{ $article->user->name ?? 'Unknown' }} •
            </small>
          </div>

          <div class="article-content">
            {!! nl2br(e($article->body)) !!}
          </div>
        </div>
        <div class="card-footer border-0 text-end">
          <a href="{{ route('articles.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-2"></i>Back to Articles
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
