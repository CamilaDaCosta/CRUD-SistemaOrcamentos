{{-- extende de /layout/main.blade.php o layout total do html --}}
@extends('layouts.main')

{{-- selecione "CRUD" como parâmetro de title --}}
@section('title', 'Clientes')

{{-- selectiona o paramentro de content, dentro da section até o final --}}
@section('content')

    <h1>
        @if (isset($cliente))
            Editando: {{$cliente->nome}} {{-- SE EXISTIR CLIENTE ELE EXIBE O EDIT--}}
            @else
            Cadastrar {{-- SE NÃO EXISTIR CLIENTE ELE EXIBE O CADASTRAR--}}
        @endif
    </h1>

    @if (isset($cliente))
            <form action="{{url("cliente/$cliente->id/update")}}" method="POST"> {{-- SE EXISTIR CLIENTE ELE EXIBE O EDIT--}}
                @method('PUT')
        @else
            <form action="/cliente" method="POST">{{-- SE NÃO EXISTIR CLIENTE ELE EXIBE O CADASTRAR--}}
    @endif


            @csrf {{-- DIRETIVA DO BLADE PARA PERMITIR ADICIONAR DADOS NO BANCO --}}
            <div class="form-group">
                <label for="title">Cliente:</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Cliente" value="{{$cliente->nome ?? ''}}" required>
            </div>
            <div class="form-group">
                <label for="title">CPF:</label>
                <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF do Cliente" value="{{$cliente->cpf ?? ''}}" required>
            </div>
            <div class="form-group">
                <label for="title">Email:</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Email do Cliente" value="{{$cliente->email ?? ''}}" required>
            </div>
            <div class="form-group">
                <label for="title">Telefone:</label>
                <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone do Cliente" value="{{$cliente->telefone ?? ''}}" required>
            </div>
            <div class="form-group">
                <label for="title">Profissão:</label>
                <input type="text" class="form-control" id="profissao" name="profissao" placeholder="Profissão do Cliente" value="{{$cliente->profissao ?? ''}}" required>
            </div>

            <h3>Cadastrar Endereço</h3>

            <div class="form-group">
                <label for="title">CEP:</label>
                <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP"  value="{{$endereco->cep ?? ''}}" required>
            </div>
            <div class="form-group">
                <label for="title">Logradouro:</label>
                <input type="text" class="form-control" id="logradouro" name="logradouro" placeholder="Logradouro" value="{{$endereco->logradouro ?? ''}}" required>
            </div>
            <div class="form-group">
                <label for="title">Numero:</label>
                <input type="text" class="form-control" id="numero" name="numero" placeholder="Numero" value="{{$endereco->numero ?? ''}}" required>
            </div>
            <div class="form-group">
                <label for="title">Complemento:</label>
                <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Complemento" value="{{$endereco->complemento ?? ''}}" required>
            </div>
            <div class="form-group">
                <label for="title">Cidade:</label>
                <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade" value="{{$endereco->cidade ?? ''}}" required>
            </div>
            <div class="form-group">
                <label for="title">Estado:</label>
                <input type="text" class="form-control" id="estado" name="estado" placeholder="Estado" value="{{$endereco->estado ?? ''}}" required>
            </div>
            <div>
                <input type="submit" value="@if(isset($cliente)) Editar @else Cadastrar @endif">
            </div>
        </form>
    </div>

@endsection
