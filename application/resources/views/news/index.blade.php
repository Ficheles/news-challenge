@extends('layouts.app')

@section('content')
<!-- <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
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
</div> -->

<main class="container mx-auto px-4 py-12">
      <div class="space-y-12">
      <div class="text-center max-w-2xl mx-auto">
          <h1 class="text-4xl font-bold gradient-text mb-4">
            Últimas Notícias
          </h1>
          <p class="text-neutral-600">
            Mantenha-se informado com as notícias mais recentes e relevantes do momento
          </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <!-- Card 1 -->

          @foreach($news as $item)
          <div class="card-hover">
            <div class="h-full flex flex-col bg-white/80 backdrop-blur-sm border border-neutral-200/50 hover:border-indigo-200 rounded-lg transition-all duration-300 hover:shadow-lg hover:shadow-indigo-500/10">
              <div class="p-6 space-y-4">
                <span class="inline-flex px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-50 text-indigo-600 hover:bg-indigo-100">
                {{ $item->category->name}}
                </span>
                <h2 class="text-xl font-semibold text-neutral-800 line-clamp-2">
                {{ $item->title }}
                </h2>
                <p class="text-neutral-600 line-clamp-4">
                {{ $item->content }}
                </p>
              </div>
              <div class="p-6 mt-auto">
              <a href="{{ route('news.show', $item->slug) }}">
                <button class="w-full px-4 py-2 rounded-md bg-gradient-to-r from-indigo-600 to-purple-600 text-white hover:opacity-90 transition-opacity">
                  Acessar
                </button>
              </a>
              </div>
            </div>
          </div>
        @endforeach

      </div>
    </main>
@endsection
