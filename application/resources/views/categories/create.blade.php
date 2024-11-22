@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto my-20 bg-white p-8 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-6">Nova Categoria</h1>

    <form action="{{ route('categories.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block mb-2">Nome</label>
            <input type="text"
                   name="name"
                   class="w-full p-2 border rounded"
                   required>
        </div>

        <div>
            <button type="submit"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-sky-400 hover:bg-sky-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Criar Categoria
            </button>
        </div>
    </form>
</div>
@endsection
