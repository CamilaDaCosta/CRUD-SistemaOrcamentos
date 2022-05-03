{{-- extende de /layout/main.blade.tdhtd o layout total do html --}}
@extends('layouts.main')

{{-- selecione "CRUD" como tdarâmetro de title--}}
@section('title',$cliente->title)

{{-- selectiona o tdaramentro de content, dentro da section até o final--}}
@section('content')
    <h2>Visualizando Cadastro: {{ $cliente -> nome }}</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>CPF</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Profissão</th>
                <th>CEP</th>
                <th>Logradouro</th>
                <th>Nº</th>
                <th>Complemento</th>
                <th>Cidade</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $endereco-> id_cliente }}</td>
                <td>{{ $cliente-> cpf }}</td>
                <td>{{ $cliente-> email }}</td>
                <td>{{ $cliente-> telefone }}</td>
                <td>{{ $cliente-> profissao }}</td>
                <td>{{ $endereco-> cep }}</td>
                <td>{{ $endereco-> logradouro }}</td>
                <td>{{ $endereco-> numero }}</td>
                <td>{{ $endereco-> complemento }}</td>
                <td>{{ $endereco-> cidade }}</td>
                <td>{{ $endereco-> estado }}</td>
            </tr>
        </tbody>
    </table>

@endsection
