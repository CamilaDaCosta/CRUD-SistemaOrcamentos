<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Endereco;

class ClienteController extends Controller
{
    public function clientes(){
        return view('cliente.create');
    }

    public function showall()
    {
        $cliente = Cliente::all();
        return view('cliente/showall', ['cliente' => $cliente]);
    }
    public function create(){
        return view('cliente.create');
    }

    public function store(Request $request)
    {
        $cliente = new Cliente;

        $cliente-> nome = $request->nome;
        $cliente-> cpf = $request->cpf;
        $cliente-> telefone = $request->telefone;
        $cliente-> email = $request->email;
        $cliente-> profissao = $request->profissao;

        $cliente->save();

        $endereco = new Endereco;

        $endereco-> cep = $request->cep;
        $endereco-> logradouro = $request->logradouro;
        $endereco-> numero = $request->numero;
        $endereco-> complemento = $request->complemento;
        $endereco-> cidade = $request->cidade;
        $endereco-> estado = $request->estado;
        $endereco-> id_cliente = $cliente->id;

        $endereco->save();

        return redirect('cliente/showall');
    }
}
