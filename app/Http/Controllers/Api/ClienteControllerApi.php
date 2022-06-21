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
    public function __construct(Cliente $cliente, Endereco $endereco)
    {
        $this->cliente = $cliente;
        $this->endereco = $endereco;
    }

    public function index(Request $request)
    { //RETORNA TODOS OS CLIENTES SEUS DADOS DE CADASTRO E ENDERECO
        if($request->key){
            return $this->cliente->with('endereco')->where('id','LIKE','%'.$request->key.'%')->get();
        }
        return $this->cliente->with('endereco')->paginate();
    }

    //CLIENTES/ID
    public function show(Cliente $cliente, Endereco $endereco)
    { // RETORNA CLIENTE E ENDERECO PELO ID DO CLIENTE
        $getEnd = $endereco->where('id_cliente', '=', $cliente->id)->get();
        return [$cliente, $getEnd];
    }

    public function store(Request $request)
    {
        $cliente = new Cliente;

        $cliente->nome = $request->input('nome');
        $cliente->cpf = $request->input('cpf');
        $cliente->telefone = $request->input('telefone');
        $cliente->email = $request->input('email');
        $cliente->profissao = $request->input('profissao');

        $cliente->save();

        $endereco = new Endereco;

        $endereco->cep = $request->input('cep');
        $endereco->logradouro = $request->input('logradouro');
        $endereco->numero = $request->input('numero');
        $endereco->complemento = $request->input('complemento');
        $endereco->cidade = $request->input('cidade');
        $endereco->estado = $request->input('estado');
        $endereco->id_cliente = $cliente->id;

        $endereco->save();

        return [$cliente, $endereco];

        // $c = Cliente::create([
        //     "nome" => $request->nome,
        //     "cpf" => $request->cpf,
        //     "telefone" => $request->telefone,
        //     "email" => $request->email,
        //     "profissao" => $request->profissao
        // ]);
        // $e = Endereco::create([
        //     "cep" => $request->cep,
        //     "logradouro" => $request->logradouro,
        //     "numero" => $request->numero,
        //     "complemento" => $request->complemento,
        //     "cidade" => $request->cidade,
        //     "estado" => $request->estado,
        //     "id_cliente" => $c->id
        // ]);
        // return [$c, $e];
    }

    public function update(Request $request, $id)
    {
        $c = Cliente::findOrFail($id);
        $c->update([
                "nome" => $request->nome,
                "cpf" => $request->cpf,
                "telefone" => $request->telefone,
                "email" => $request->email,
                "profissao" => $request->profissao
            ]);
        $e = Endereco::all();
        foreach ($e as $e){
            if ($id == $e->id_cliente){
                $e->update([
                    "cep" => $request->cep,
                    "logradouro" => $request->logradouro,
                    "numero" => $request->numero,
                    "complemento" => $request->complemento,
                    "cidade" => $request->cidade,
                    "estado" => $request->estado
                ]);
            }
        }
        return [$c, $e];

    }

    public function destroy(Cliente $cliente)
    {
        return $cliente->delete();
    }
}
