<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Endereco;

class ClienteControllerApi extends Controller
{
    private $cliente;
    private $endereco;
    public function __construct(Cliente $cliente, Endereco $endereco){
        $this->cliente = $cliente;
        $this->endereco = $endereco;
    }
    //SHOWALL
    public function index(){ //RETORNA TODOS OS CLIENTES SEUS DADOS DE CADASTRO E ENDERECO
       return $this->cliente->with('endereco')->paginate();
    }

    //CLIENTES/ID
    public function show(CLiente $cliente){ //RETORNA APENAS O CLIENTE QUE FOR PASSADO O ID
        return $cliente;
    }

    public function store(Request $request){
        //return [$this->cliente->create($request->all()), $this->endereco->create($request->all())];
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

    public function update(Request $request, Cliente $cliente){
        $cliente->update($request->all());
        return $cliente;
    }

    public function destroy(Cliente $cliente){
        return $cliente->delete();
    }

}
