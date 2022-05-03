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

        return redirect('/');
    }

    public function show($id){
        $cliente = Cliente::findOrFail($id);
        $endereco = Endereco::findOrFail($id);//RETORNA COM O ID DO ENDERECO REFERENTE AO CLIENTE
        return view('cliente.show', ['cliente' => $cliente, 'endereco' => $endereco]);//só funciona se o id dos dois for igual
    }

    public function edit($id){
        $cliente = Cliente::find($id);
        $endereco = Endereco::find($id);
        return view('cliente.create',compact('cliente','endereco'));
    }

    // ALTERAR DADOS DAS TABELAS CLIENTE E ENDERECO
    public function update(Request $request, $id){
        Cliente::where(['id'=>$id])->update([
            'nome'=>$request->nome,
            'cpf'=>$request->cpf,
            'telefone'=>$request->telefone,
            'email'=>$request->email,
            'profissao'=>$request->profissao,
        ]);
        Endereco::where(['id'=>$id])->update([
            'cep'=>$request->cep,
            'logradouro'=>$request->logradouro,
            'numero'=>$request->numero,
            'complemento'=>$request->complemento,
            'cidade'=>$request->cidade,
            'estado'=>$request->estado
        ]);
        return redirect('/');
    }
}
