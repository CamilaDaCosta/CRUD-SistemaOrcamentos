<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Produto as ProdutoResource;
use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showall()
    {
        $todosProdutos = Produto::paginate(15);
        return ProdutoResource::collection($todosProdutos);
        //$produtos = Produto::all();
        //return $produtos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produto = new Produto;

        $produto->descricao = $request->input('descricao');
        $produto->material = $request->input('material');
        $produto->unidade = $request->input('unidade');
        $produto->espessura = $request->input('espessura');
        $produto->valor = $request->input('valor');

        $produto->save();

        return $produto;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = Produto::findOrFail($id);
        return new ProdutoResource($produto);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = Produto::findOrFail($id);
        return $produto;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);
        $produto->update([
            "descricao" => $request->descricao,
            "material" => $request->material,
            "unidade" => $request->unidade,
            "espessura" => $request->espessura,
            "valor" => $request->valor
        ]);
        return $produto;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delProduto = Produto::findOrFail($id);
        if ($delProduto->delete()) {
            return new ProdutoResource($delProduto);
        }
    }
}
