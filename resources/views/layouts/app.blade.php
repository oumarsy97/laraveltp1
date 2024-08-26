<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-500 p-4 text-white flex justify-between items-center mb-4 shadow dark:bg-gray-800 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700">
        <div class="container mx-auto flex justify-between items-center">
            <div class="space-x-4">
                <a href="{{ route('clients.index') }}" class="text-white hover:bg-blue-700 px-3 py-2 rounded">Client</a>
                {{-- <a href="{{ route('dettes.index') }}" class="text-white hover:bg-blue-700 px-3 py-2 rounded">Dettes</a> --}}
                {{-- <a href="{{ route('articles.index') }}" class="text-white hover:bg-blue-700 px-3 py-2 rounded">Articles</a> --}}
            </div>
            <div class="space-x-4 ml-4">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-white hover:bg-red-700 px-3 py-2 rounded dark:hover:bg-red-700">Déconnexion</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container mx-auto mt-8">
        @yield('content')
    </div>
</body>
</html>
