<!DOCTYPE html>
<html>
<head>
    <title>Encrypt Number</title>
</head>
<body>
    <h1>Encrypt Number</h1>
    <form method="post" action="/encrypt">
        @csrf
        <label for="numero1">Ingrese un número:</label>
        <input type="text" id="numero1" name="numero1" required>
        <button type="submit">Encrypt</button>
    </form>

    @if(isset($encrypted))
        <p>El número encriptado es: {{ $encrypted }}</p>
    @endif

    @if(isset($error))
        <p>{{ $error }}</p>
    @endif
</body>
</html>
