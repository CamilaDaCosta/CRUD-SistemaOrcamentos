<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Endereco;

class ClienteControllerApi extends Controller
{
    public function showall(){
        $todosClientes = Cliente::all();
        //$todosEnderecos = Endereco::all();
        return $todosClientes;
    }

    public function store(Request $request){
        $cliente = new Cliente;

        $cliente-> nome = $request->input('nome');
        $cliente-> cpf = $request->input('cpf');
        $cliente-> telefone = $request->input('telefone');
        $cliente-> email = $request->input('email');
        $cliente-> profissao = $request->input('profissao');

        $cliente->save();

        $endereco = new Endereco;

        $endereco-> cep = $request->input('cep');
        $endereco-> logradouro = $request->input('logradouro');
        $endereco-> numero = $request->input('numero');
        $endereco-> complemento = $request->input('complemento');
        $endereco-> cidade = $request->input('cidade');
        $endereco-> estado = $request->input('estado');
        $endereco-> id_cliente = $cliente->id;

        $endereco->save();

        return [$cliente, $endereco];
    }

    public function destroy($id){
        $delCliente = Cliente::findOrFail($id)->delete();
//        $delEnd = Endereco::findOrFail($id)->delete();
        return $delCliente;
    }

}
