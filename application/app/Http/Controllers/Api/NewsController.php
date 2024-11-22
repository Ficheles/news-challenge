<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Http\Requests\NewsRequest;
use App\Http\Resources\NewsResource;
use App\Http\Resources\NewsCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::with('category')
            ->latest()
            ->paginate(10);

        return new NewsCollection($news);
    }

    public function search(Request $request)
    {
        $query = News::query()->with('category');

        if ($request->has('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'like', "%{$searchTerm}%")
                  ->orWhereHas('category', function($q) use ($searchTerm) {
                      $q->where('name', 'like', "%{$searchTerm}%");
                  });
            });
        }

        if ($request->has('category')) {
            $query->where('category_id', $request->category);
        }

        $news = $query->latest()->paginate(10);
        return new NewsCollection($news);
    }

    public function store(NewsRequest $request)
    {
        $validated = $request->validated();
        $validated['slug'] = Str::slug($validated['title']);

        $news = News::create($validated);

        return new NewsResource($news);
    }

    public function show(News $news)
    {
        return new NewsResource($news->load('category'));
    }

    public function update(NewsRequest $request, News $news)
    {
        $validated = $request->validated();
        $validated['slug'] = Str::slug($validated['title']);

        $news->update($validated);

        return new NewsResource($news->fresh('category'));
    }

    public function destroy(News $news)
    {
        $news->delete();
        return response()->json(['message' => 'Notícia excluída com sucesso']);
    }
}
