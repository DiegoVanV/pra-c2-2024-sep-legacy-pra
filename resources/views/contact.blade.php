<!DOCTYPE html>
<html>
<head>
    <title>Contactformulier</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <h1>Contactformulier</h1>
    <form action="{{ route('contact.store') }}" method="POST">
        @csrf
        <label for="name">Naam:</label><br>
        <input type="text" id="name" name="name"><br><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br><br>
        <label for="message">Bericht:</label><br>
        <textarea id="message" name="message"></textarea><br><br>
        <button type="submit">Verstuur</button>
    </form>
</body>
</html>
