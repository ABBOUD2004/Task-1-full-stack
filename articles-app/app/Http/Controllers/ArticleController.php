<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ArticleController extends Controller
{
    use AuthorizesRequests;


    public function index()
    {
        $articles = Article::with('user')->latest()->get();
        return view('articles.index', compact('articles'));
    }


    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $request->user()->articles()->create($data);

        return redirect()->route('articles.index')->with('success', 'Article created successfully!');
    }
    public function edit(Article $article)
    {
        $this->authorize('update', $article);
        return view('articles.edit', compact('article'));
    }
    public function update(Request $request, Article $article)
    {
        $this->authorize('update', $article);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $article->update($data);

        return redirect()->route('articles.index')->with('success', 'Article updated!');
    }


    public function destroy(Article $article)
    {
        $this->authorize('delete', $article);

        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Article deleted!');
    }

    public function show(Article $article)
    {
        $article->load('user');
        return view('articles.show', compact('article'));
    }


    public function dashboard()
    {
        $user = auth()->user();

        $totalArticles = $user->articles()->count();
        $publishedCount = $user->articles()->where('published', true)->count();
        $totalViews = $user->articles()->sum('views');
        $totalLikes = $user->articles()->sum('likes');
        $articlesThisMonth = $user->articles()
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();

        $recentArticles = $user->articles()->latest()->take(5)->get();

        return view('dashboard', compact(
            'totalArticles',
            'publishedCount',
            'totalViews',
            'totalLikes',
            'articlesThisMonth',
            'recentArticles'
        ));
    }
}
