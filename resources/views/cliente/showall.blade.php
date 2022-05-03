{{-- extende de /layout/main.blade.php o layout total do html --}}
@extends('layouts.main')

{{-- selecione "CRUD" como parâmetro de title --}}
@section('title', 'Clientes')

{{-- selectiona o paramentro de content, dentro da section até o final --}}
@section('content')

    <h1>Clientes ||| <a href="/cliente/create">Cadastrar Novo</a></h1>
        <table border="1">
            <thead>
                <tr>
                    <th scope="col">Cliente</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Telefone</th>
                    <th colspan="2">Ações</th>
                    <th scope="col">Ver</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cliente as $c)
                    <tr>
                        <td>{{ $c->nome }}</td>
                        <td>{{ $c->cpf }}</td>
                        <td>{{ $c->telefone }}</td>
                        <td><a href="{{url("cliente/$c->id/edit")}}">Editar</td>
                        <td>Excluir</td>
                        <td><a href="/cliente/{{ $c->id }}">VER</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
