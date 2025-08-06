@extends('layouts.app')

@section('content')
<div class="container text-center py-5">
    <h1 class="mb-4">Welcome to the Articles App</h1>
    <p class="lead">Laravel + Bootstrap simple app to manage articles.</p>


    <div class="mt-4">
        <a href="{{ route('articles.index') }}" class="btn btn-primary me-2">View Articles</a>

        @auth
            <a href="{{ route('articles.create') }}" class="btn btn-success">Create Article</a>
        @else
            <a href="{{ route('login') }}" class="btn btn-outline-primary">Login</a>
        @endauth
    </div>
</div>
@endsection
