<!DOCTYPE html>
<html>
<head>
    <title>Users List</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-gray-100">
    <h1 class="text-2xl font-bold mb-4">Users List</h1>
    <table class="table-fixed w-1/2 mx-auto border border-gray-300">
        <thead class="bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th>Prenom</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-800">
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->prenom }}</td>
                <td>{{ $user->nom }}</td>
                <td>{{ $user->login }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>
