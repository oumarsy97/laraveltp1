<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="w-1/2 max-w-md bg-white p-8 rounded-lg shadow-md mx-auto mt-64">
        @if ($errors->any())
            <div class="mb-6 bg-red-100 border border-red-400 text-red-700 p-4 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    <h1 class="text-2xl font-bold mb-4">Login</h1>
    <form action="{{ route('login') }}" method="POST" class="mb-6 space-y-4">
        @csrf
        <div class="mb-4 ">
            <label for="login">Login:</label>
            <input type="text" id="login" name="login" value="{{ old('login') }}" class="form-input mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 py-1" required>
        </div>
        <div>
            <label for="password" >Password:</label>
            <input type="password" id="password" name="password" class="form-input mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 py-1" required>
        </div>
        <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-300">Login</button>
    </form>
</div>

</body>
</html>
