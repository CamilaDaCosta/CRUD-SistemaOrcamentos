<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Endereco;

class EnderecoControllerApi extends Controller
{

    public function index(Cliente $cliente){//RETORNA APENAS O ENDERECO DO CLIENTE SOLICITADO
        return $cliente->endereco;
    }

    public function update(Request $request,Cliente $cliente, Endereco $endereco)
    {//EDITA ENDERECO DO CLIENTE SOLICITADO
        $endereco->update($request->all());
        return $endereco;
    }

}
