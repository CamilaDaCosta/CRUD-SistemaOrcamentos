<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    //-> Mostrar todos os produtos
    public function showall()
    {
        $produtos = Produto::all();
        return view('produto/showall', ['produtos' => $produtos]);
    }
    //<- Mostrar todos os produtos

    //-> Criar Produto
    public function create()
    {
        return view('produto.create');
    }

    public function store(Request $request)
    {
        $produto = new Produto;

        $produto->descricao = $request->descricao;
        $produto->material = $request->material;
        $produto->unidade = $request->unidade;
        $produto->espessura = $request->espessura;
        $produto->valor = $request->valor;

        $produto->save();
        return redirect('/produto/showall');
    }
    //<- Criar Produto

    //-> Mostrar Produto
    public function show($id)
    {
        $produto = Produto::findOrFail($id);
        return view('produto.show', ['produto' => $produto]);
    }
    //<- Mostrar Produto

    //->Deletar Produto
    public function destroy($id)
    {
        Produto::findOrFail($id)->delete();
        return redirect('/produto/showall');
    }
    //<-Deletar Produto

    //->Atualizar produto
    public function edit($id)
    {
        $produto = Produto::findOrFail($id);
        return view('produto.edit', ['produto' => $produto]);
    }

    public function update(Request $request)
    {
        Produto::findOrFail($request->id)->update($request->all());
        return redirect('/produto/showall');
    }
    //<-Atualizar produto
}
