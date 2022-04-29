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
    <div id="criar-cliente-container" class="col-md-6 offset-md-3">
        <h3>Cadastrar Cliente</h3>
        <form action="/cliente" method="POST">
            @csrf {{-- DIRETIVA DO BLADE PARA PERMITIR ADICIONAR DADOS NO BANCO --}}
            <div class="form-group">
                <label for="title">Cliente:</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Cliente">
            </div>
            <div class="form-group">
                <label for="title">CPF:</label>
                <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF do Cliente">
            </div>
            <div class="form-group">
                <label for="title">Email:</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Email do Cliente">
            </div>
            <div class="form-group">
                <label for="title">Telefone:</label>
                <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone do Cliente">
            </div>
            <div class="form-group">
                <label for="title">Profissão:</label>
                <input type="text" class="form-control" id="profissao" name="profissao" placeholder="Profissão do Cliente">
            </div>

            <h3>Cadastrar Endereço</h3>

            <div class="form-group">
                <label for="title">CEP:</label>
                <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP">
            </div>
            <div class="form-group">
                <label for="title">Logradouro:</label>
                <input type="text" class="form-control" id="logradouro" name="logradouro" placeholder="Logradouro">
            </div>
            <div class="form-group">
                <label for="title">Numero:</label>
                <input type="text" class="form-control" id="numero" name="numero" placeholder="Numero">
            </div>
            <div class="form-group">
                <label for="title">Complemento:</label>
                <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Complemento">
            </div>
            <div class="form-group">
                <label for="title">Cidade:</label>
                <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade">
            </div>
            <div class="form-group">
                <label for="title">Estado:</label>
                <input type="text" class="form-control" id="estado" name="estado" placeholder="Estado">
            </div>
            <div>
                <input type="submit" class="btn btn-primary" value="Cadastrar">
            </div>
        </form>
    </div>
</body>
</html>
