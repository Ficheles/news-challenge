
@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <main class="container mx-auto px-4 py-12">
      <div class="max-w-4xl mx-auto">
        <!-- Breadcrumb -->
        <nav class="flex items-center space-x-2 text-sm text-neutral-600 mb-8">
          <a href="index.html" class="hover:text-indigo-600">Início</a>
          <span>/</span>
          <span class="text-neutral-400">{{$news->category->name}}</span>
        </nav>

        <p></p>
        <!-- Article Header -->
        <div class="space-y-6 mb-12">
          <span class="inline-flex px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-50 text-indigo-600">
          {{$news->category->name}}
          </span>
          <h1 class="text-4xl font-bold text-neutral-800">
            {{$news->title}}
          </h1>
          <div class="flex items-center space-x-4 text-sm text-neutral-600">
            <div class="flex items-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"/>
                <circle cx="12" cy="10" r="3"/>
                <path d="M7 20.662V19a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v1.662"/>
              </svg>
              Por João Silva
            </div>
            <div class="flex items-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                <line x1="16" y1="2" x2="16" y2="6"/>
                <line x1="8" y1="2" x2="8" y2="6"/>
                <line x1="3" y1="10" x2="21" y2="10"/>
              </svg>
              15 de Março, 2024
            </div>
          </div>
        </div>

        <!-- Article Content -->
        <div class="prose prose-lg max-w-none">

          <div class="aspect-w-16 aspect-h-9 mb-8">
            <img
              src="{{$news->url_img}}"
              alt="IA Imagem"
              class="rounded-xl object-cover w-full h-[400px]"
            />
          </div>


          <p class="text-neutral-600 leading-relaxed mb-6">
            A Inteligência Artificial (IA) está revolucionando diversos setores da sociedade, desde a medicina até o entretenimento. Com avanços significativos em machine learning e deep learning, as possibilidades parecem ilimitadas.
          </p>

          <h2 class="text-2xl font-semibold text-neutral-800 mt-8 mb-4">
            O Impacto da IA no Cotidiano
          </h2>

          <p class="text-neutral-600 leading-relaxed mb-6">

          {{$news->content}}

          </p>

          <blockquote class="border-l-4 border-indigo-500 pl-4 italic text-neutral-700 my-8">
            "A Inteligência Artificial é a nova eletricidade. Assim como a eletricidade transformou praticamente tudo há 100 anos, hoje mal podemos pensar em um setor que não será transformado pela IA nos próximos anos." - Andrew Ng
          </blockquote>

          <h2 class="text-2xl font-semibold text-neutral-800 mt-8 mb-4">
            O Futuro da IA
          </h2>

          <p class="text-neutral-600 leading-relaxed mb-6">
            As perspectivas para o futuro da IA são empolgantes. Especialistas preveem avanços significativos em áreas como:
          </p>

          <ul class="list-disc list-inside text-neutral-600 mb-6 space-y-2">
            <li>Medicina personalizada e diagnóstico precoce</li>
            <li>Veículos autônomos e sistemas de transporte inteligente</li>
            <li>Educação adaptativa e personalizada</li>
            <li>Sustentabilidade e eficiência energética</li>
          </ul>
        </div>

        <!-- Share and Engagement -->
        <div class="flex items-center justify-between mt-12 py-6 border-t border-neutral-200">
          <div class="flex items-center space-x-4">
            <button class="inline-flex items-center space-x-2 text-neutral-600 hover:text-indigo-600">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/>
              </svg>
              <span>Curtir</span>
            </button>
            <button class="inline-flex items-center space-x-2 text-neutral-600 hover:text-indigo-600">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
              </svg>
              <span>Comentar</span>
            </button>
          </div>
          <button class="inline-flex items-center space-x-2 text-neutral-600 hover:text-indigo-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"/>
              <polyline points="16 6 12 2 8 6"/>
              <line x1="12" y1="2" x2="12" y2="15"/>
            </svg>
            <span>Compartilhar</span>
          </button>
        </div>
      </div>
    </main>

    @endsection
