@extends('layouts.app')

@php use Illuminate\Support\Str; @endphp

@section('title', 'Dashboard')

@section('content')
<style>
  @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap');

  body, html {
    height: 100%;
    margin: 0;
    font-family: 'Inter', sans-serif;
    background: #3b82f6; 
    background: linear-gradient(135deg, #3b82f6 0%, #06b6d4 100%);
    color: #f3f4f6;
    overflow-x: hidden;
  }

  .card {
    border-radius: 16px;
    background: rgba(255, 255, 255, 0.15);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.12);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.25);
    color: #f3f4f6;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }
  .card:hover {
    transform: translateY(-7px);
    box-shadow:
      0 8px 32px rgba(14, 165, 233, 0.8),
      0 0 15px rgba(6, 182, 212, 0.7);
  }


  .card.bg-primary {
    background: rgba(255, 255, 255, 0.25);
    box-shadow: 0 8px 24px rgba(6, 182, 212, 0.5);
    color: #e0f2fe;
  }
  .card.bg-primary h4,
  .card.bg-primary p {
    margin-bottom: 0;
    text-shadow: 0 0 8px rgba(14, 165, 233, 0.8);
  }


  .card-body i {
    font-size: 2.5rem;
    color: #bae6fd;
    transition: transform 0.3s ease, color 0.3s ease;
  }
  .card-body i:hover {
    color: #06b6d4;
    transform: scale(1.2);
  }
.card-body h5 {
    font-weight: 700;
    font-size: 1.9rem;
    margin-bottom: 0.3rem;
    color: #dbeafe;
    text-shadow: 0 0 5px rgba(6, 182, 212, 0.8);
  }


  .card-body p,
  .card-body small {
    color: #cbd5e1;
  }

  a.btn-primary {
    background: #06b6d4;
    border: none;
    border-radius: 30px;
    padding: 0.5rem 1.6rem;
    font-weight: 700;
    box-shadow: 0 4px 15px rgba(6, 182, 212, 0.6);
    transition: box-shadow 0.3s ease, background 0.3s ease;
  }
  a.btn-primary:hover {
    background: #0284c7;
    box-shadow: 0 6px 25px rgba(14, 165, 233, 0.9);
    color: #fff;
  }


  a.btn-outline-primary {
    border-radius: 30px;
    font-weight: 600;
    color: #bae6fd;
    border-color: #bae6fd;
    transition: background-color 0.3s ease, color 0.3s ease;
  }
  a.btn-outline-primary:hover {
    background-color: #06b6d4;
    color: #fff;
  }

  a.btn-outline-secondary,
  a.btn-outline-info {
    border-radius: 30px;
    font-weight: 600;
    color: #cbd5e1;
    border-color: rgba(203, 213, 225, 0.5);
    transition: background-color 0.3s ease, color 0.3s ease;
  }
  a.btn-outline-secondary:hover {
    background-color: rgba(6, 182, 212, 0.25);
    color: #fff;
    border-color: #06b6d4;
  }
  a.btn-outline-info:hover {
    background-color: rgba(59, 130, 246, 0.25);
    color: #fff;
    border-color: #3b82f6;
  }


  .recent-article {
    border-radius: 10px;
    padding: 14px 18px;
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
    cursor: pointer;
  }
  .recent-article:hover {
    background: rgba(255, 255, 255, 0.1);
    box-shadow: 0 0 15px rgba(6, 182, 212, 0.5);
  }

  .recent-article h6 {
    margin-bottom: 0.2rem;
    color: #dbeafe;
    font-weight: 600;
  }
  .recent-article p,
  .recent-article small {
    color: #cbd5e1;
  }

  /* Responsive */
  @media (max-width: 767.98px) {
    .card-body i {
      font-size: 2rem;
    }
  }

</style>

<div class="container-fluid py-4">
    <!-- Welcome Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card bg-primary p-4">
                <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <div>
                        <h4>Welcome back, {{ Auth::user()->name }}!</h4>
                        <p>Here's what's happening with your articles today.</p>
                    </div>
                    <div class="text-end">
                        <h2>{{ $totalArticles }}</h2>
                        <small>Total Articles</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row mb-4 g-3">
        <div class="col-md-3">
            <div class="card text-center p-4">
                <i class="bi bi-journal-text"></i>
                <h5>{{ $publishedCount }}</h5>
                <p>Published</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center p-4">
                <i class="bi bi-eye"></i>
                <h5>{{ $totalViews }}</h5>
                <p>Total Views</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center p-4">
                <i class="bi bi-heart"></i>
                <h5>{{ $totalLikes }}</h5>
                <p>Total Likes</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center p-4">
                <i class="bi bi-calendar"></i>
                <h5>{{ $articlesThisMonth }}</h5>
                <p>This Month</p>
            </div>
        </div>
    </div>

    <!-- Recent Articles -->
    <div class="row g-3">
        <div class="col-md-8">
            <div class="card p-0">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Recent Articles</h5>
                    <a href="{{ route('articles.create') }}" class="btn btn-primary btn-sm">
                        <i class="bi bi-plus-circle me-1"></i>New Article
                    </a>
                </div>
                <div class="card-body">
                    @forelse($recentArticles as $article)
                        <div class="d-flex align-items-center recent-article mb-3">
                            <div class="flex-shrink-0">
                                <div class="bg-white bg-opacity-20 rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                    <i class="bi bi-file-text text-white"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6>{{ $article->title }}</h6>
                                <p class="mb-0 small">{{ Str::limit($article->body, 80) }}</p>
                                <small>{{ $article->created_at ? $article->created_at->diffForHumans() : 'N/A' }}</small>
                            </div>
                            <div class="flex-shrink-0">
                                <a href="{{ route('articles.show', $article->id) }}" class="btn btn-outline-primary btn-sm">View</a>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-4 text-white-50">
                            <i class="bi bi-journal-text display-4"></i>
                            <h5 class="mt-3">No Articles Yet</h5>
                            <p>Start writing your first article!</p>
                            <a href="{{ route('articles.create') }}" class="btn btn-primary">Create Article</a>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="col-md-4">
            <div class="card p-3">
                <div class="card-header">
                    <h5>Quick Actions</h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('articles.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle me-2"></i>New Article
                        </a>
                        <a href="{{ route('articles.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-list me-2"></i>All Articles
                        </a>
                        <a href="#" class="btn btn-outline-info">
                            <i class="bi bi-gear me-2"></i>Settings
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
