{{-- extende de /layout/main.blade.php o layout total do html --}}
@extends('layouts.main')

{{-- selecione "CRUD" como parâmetro de title --}}
@section('title', 'Produtos')

{{-- selectiona o paramentro de content, dentro da section até o final --}}
@section('content')

<div>
    <h2>Lista de Produtos|||<a href="/produto/create">Cadastrar Novo Produto</a></h2>
    <div>
        <table border="1">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Preço</th>
                    <th>Material</th>
                    <th>Unidade</th>
                    <th>Espessura</th>
                    <th colspan="3">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produtos as $p)
                <tr>
                    <td>{{ $p->descricao }}</td>
                    <td>{{ $p->valor }}</td>
                    <td>{{ $p->material}}</td>
                    <td>{{ $p->unidade}}</td>
                    <td>{{ $p->espessura}}</td>
                    <td><button><a href="{{url("produto/edit/$p->id")}}">Editar</button></td>
                        <td>
                            <form action="/produto/{{ $p->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Excluir">
                            </form>
                        </td>
                    <td><a href="/produto/{{ $p->id }}">Visualizar</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
