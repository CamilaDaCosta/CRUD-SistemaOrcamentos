@extends('layouts.main')

{{-- selecione "CRUD" como parâmetro de title --}}
@section('title', 'Criar Orçamento')

{{-- selectiona o paramentro de content, dentro da section até o final --}}
@section('content')
    <div>

        <h1>Cadastrar Orçamento</h1>

        <form action="/orcamento" method="POST">
            @csrf

            <div>
                <label for="cliente_id">Selecione o cliente deste Orçamento</label>
                <select name="cliente_id" id="cliente_id">
                    @foreach ($cliente as $c)
                        <option value="{{ $c->id }}">{{ $c->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="date">Data do Orçamento:
                </label>
                <input type="date" id="data" name="data">
            </div>

            <div>
                <label for="text">Situação do Orçamento:</label>
                <select name="situacao" id="situacao">
                    <option value="Ativo">Ativo</option>
                    <option value="Inativo">Inativo</option>
                    <option value="Demonstrativo">Demonstrativo</option>
                </select>
            </div>
            <div>
                <label for="produto_id">Selecione os Produtos deste Orçamento</label>
                <select multiple="multiple" name="produto_id" id="produto_id">
                    @foreach ($produto as $p)
                        <option value="{{ $p->id }}">Produto: {{ $p->descricao }}</option>
                    @endforeach
                </select>
            </div>

            <input type="submit" value="Cadastrar">

        </form>

    </div>

@endsection
