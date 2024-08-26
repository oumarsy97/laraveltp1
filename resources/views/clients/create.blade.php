<!DOCTYPE html>
<html>
<head>
    <title>Create User and Client</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <h1>Create User and Client</h1>
    <form action="{{ route('clients.store') }}" method="POST">
        @csrf
        <div>
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" value="{{ old('nom') }}" required>
        </div>
        <div>
            <label for="prenom">Prénom:</label>
            <input type="text" id="prenom" name="prenom" value="{{ old('prenom') }}" required>
        </div>
        <div>
            <label for="login">Login:</label>
            <input type="text" id="login" name="login" value="{{ old('login') }}" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>
        <div>
            <label for="telephone">Telephone:</label>
            <input type="text" id="telephone" name="telephone" value="{{ old('telephone') }}" required>
        </div>
        <div>
            <label for="adresse">Adresse:</label>
            <input type="text" id="adresse" name="adresse" value="{{ old('adresse') }}" required>
        </div>
        <button type="submit">Create</button>
    </form>
</body>
</html>
