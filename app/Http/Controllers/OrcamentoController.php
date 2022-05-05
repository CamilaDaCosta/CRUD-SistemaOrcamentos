<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orcamento;
use App\Models\Cliente;
use App\Models\OrcamentosProdutos;
use App\Models\Produto;

class OrcamentoController extends Controller
{
    public function showall()
    {
        $orcamento = Orcamento::all();
        return view('orcamento/showall', ['orcamento' => $orcamento]);
    }

    public function create()
    {
        $cliente = Cliente::all();
        $produto = Produto::all();
        return view('orcamento.create', ['cliente' => $cliente], ['produto' => $produto]);
    }

    public function store(Request $r)
    {
        $orcamento = new Orcamento;
        $orcamento->situacao = $r->situacao;
        $orcamento->cliente_id = $r->cliente_id;
        $orcamento->data = $r->data;
        $orcamento->valortotal = 0;

        $orcamento->save();
        return redirect('/orcamento/showall');
    }

    public function show($id)
    {
        $p = Produto::all();
        $o = Orcamento::findOrFail($id);
        $produtosDoOrcamento = $o->produtosDoOrcamento;
        return view('orcamento.show', ['orcamento' => $o, 'produto' => $p, 'pdo' => $produtosDoOrcamento]);
    }

    public function destroy($id)
    {
        Orcamento::findOrFail($id)->delete();
        return redirect('/orcamento/showall')->with('msg', 'Orçamento excluido !!!');
    }

    public function edit($id)
    {
        $p = Produto::all();
        $o = Orcamento::findOrFail($id);
        $produtosDoOrcamento = $o->produtosDoOrcamento;
        return view('orcamento.show', ['orcamento' => $o, 'produto' => $p, 'pdo' => $produtosDoOrcamento]);
    }

    public function update(Request $request)
    {
        Orcamento::findOrFail($request->id)->update($request->all());
        return redirect('/orcamento/showall')->with('msg', 'Orçamento Editado !!!');
    }
}
