<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $news = News::when($search, function($query) use ($search) {
            return $query->search($search);
        })
        ->with('category')
        ->latest()
        ->paginate(10);

        $categories = Category::all();

        return view('news.index', compact('news', 'categories', 'search'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('news.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'url_img' => 'required|max:255',
            'category_id' => 'required|exists:categories,id'
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        News::create($validated);

        return redirect()->route('news.index')->with('success', 'Notícia criada com sucesso!');
    }

    public function show($slug)
    {
        $news = News::with('category')->where('slug', $slug)->firstOrFail();

        return view('news.show', compact('news'));
    }
}
