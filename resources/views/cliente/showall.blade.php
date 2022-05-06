{{-- extende de /layout/main.blade.php o layout total do html --}}
@extends('layouts.main')

{{-- selecione "CRUD" como parâmetro de title --}}
@section('title', 'Clientes')

{{-- selectiona o paramentro de content, dentro da section até o final --}}
@section('content')

    <h1>Clientes ||| <a href="/cliente/create">Cadastrar Novo</a></h1>
    <div class="campo">
        <!--form action="{{--url("cliente/search")--}}" method="POST"-->
        <form action="/" method="GET">
            @csrf
            <label for="text">Busque Por Clientes</label>
            <!--input type="text" name="filter" id="filter" placeholder="Busque um Cliente"-->
            <input type="text" name="search" id="search" placeholder="Busque um Cliente">
            <input type="submit" value="Buscar">
        </form>
        <form action="/" method="GET">
            @csrf
            <label for="text">Busque Por Endereco</label>
            <!--input type="text" name="filter" id="filter" placeholder="Busque um Cliente"-->
            <input type="text" name="searchEnd" id="searchEnd" placeholder="Busque por Endereco">
            <input type="submit" value="Buscar">
        </form>
    </div>
        <table border="1">
            <thead>
                <tr>
                    <th scope="col">Cliente</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Telefone</th>
                    <th>Cidade</th>
                    <th colspan="3">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cliente as $c)
                    <tr>
                        <td>{{ $c->nome }}</td>
                        <td>{{ $c->cpf }}</td>
                        <td>{{ $c->telefone }}</td>

                        <td>@if(isset($c->endereco->cidade)) {{$c->endereco->cidade}} @else
                                @if (isset($e)) {{$e}} @else Sem Registro @endif
                            @endif</td>
                        <td><button>
                            @if(isset($c->id)) <a href="{{url("cliente/$c->id/edit")}}">Editar</button></td>
                                @else <a href="{{url("cliente/$cli/edit")}}">Editar </button></td>
                            @endif
                        <td>
                            @if(isset($c->id))
                                <form action="/cliente/{{ $c->id }}" method="POST">
                                @else
                                    <form action="/cliente/{{ $cli }}" method="POST">
                                        @endif
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Excluir">
                            </form>
                        </td>
                        <td><button>
                            @if(isset($c->id))<a href="/cliente/{{ $c->id }}">Visualizar</a></button></td>
                                @else <a href="{{url("cliente/$cli")}}">Visualizar </button></td>
                            @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
