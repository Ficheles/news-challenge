@extends('layouts.app')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($news as $item)
    <article class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="p-6">
            <h2 class="text-xl font-semibold mb-3">{{ $item->title }}</h2>
            <p class="text-gray-600 mb-4">{{ $item->content }}</p>
            <a href="{{ route('news.show', $item->slug) }}"
               class="inline-block px-6 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition-colors">
                Acessar
            </a>
        </div>
    </article>
    @endforeach
</div>
@endsection
