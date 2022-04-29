<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Clientes</title>
</head>
<body>
    <h1>Clientes</h1>
        @foreach ($cliente as $cliente)
            <div class="card-body">
                <p>Cliente: {{ $cliente->nome }}</p>
                <p>CPF: {{ $cliente->cpf }}</p>
                <a href="/cliente/{{ $cliente->id }}">Ver Mais</a>
            </div>
        @endforeach
</body>
</html>
