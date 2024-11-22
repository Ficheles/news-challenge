
@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-6">Cadastrar Nova Notícia</h1>

    <form action="{{ route('news.store') }}" method="POST" class="space-y-6">
        @csrf
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Título da notícia</label>
            <input type="text"
                   name="title"
                   id="title"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        </div>

        <div>
            <label for="url_img" class="block text-sm font-medium text-gray-700">URL da Imagem</label>
            <input type="text"
                   name="url_img"
                   id="url_img"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        </div>

        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Categoria</label>
            <div class="flex gap-x-2">

                <select name="category_id" class="mt-1 flex-1 w-64 p-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <a href="/categories/create" class="mt-1 flex p-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="size-5">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Categoria
                </a>
            </div>
        </div>

        <div>
            <label for="content" class="block text-sm font-medium text-gray-700">Conteúdo</label>
            <textarea name="content"
                      id="content"
                      rows="6"
                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
        </div>

        <div>
            <button type="submit"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-sky-400 hover:bg-sky-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Publicar Notícia
            </button>
        </div>
    </form>
</div>
@endsection
