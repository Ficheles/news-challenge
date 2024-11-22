<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'News Portal') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-full">
    <!-- Header -->
    <header class="bg-white shadow-sm">
        <div class="container mx-auto px-4 py-3">
            <div class="flex items-center justify-between">
                <div class="text-xl font-bold">LOGO</div>
                <nav class="flex items-center space-x-6">
                    <a href="{{ route('news.create') }}" class="text-gray-600 hover:text-gray-900">CADASTRAR NOTÍCIAS</a>
                    <a href="{{ route('news.index') }}" class="text-gray-600 hover:text-gray-900">EXIBIR NOTÍCIAS</a>

                    <form action="{{ route('news.index') }}" method="GET">
                        <!-- @csrf -->
                        <div class="relative">
                            <input type="search"
                                name="search"
                                id="search"
                                class="w-64 pl-3 pr-10 py-2 border rounded-full focus:outline-none focus:border-gray-500"
                                placeholder="Buscar...">
                            <button type="submit" class="absolute right-3 top-1/2 transform -translate-y-1/2">
                                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </button>
                        </div>
                    </form>
                </nav>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8" style="min-heigh: calc(100dvh - 100px)">
            @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white mt-12 py-4 border-t">
        <div class="container mx-auto px-4 text-center text-gray-600">
            <p>Desenvolvido por Fideles - 2024</p>
        </div>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
