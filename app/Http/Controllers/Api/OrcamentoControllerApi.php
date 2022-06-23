<?php

namespace App\Http\Controllers\api;


use App\Http\Controllers\Controller;
use App\Http\Resources\Orcamento as OrcamentoResource;
use Illuminate\Http\Request;
use App\Models\OrcamentoProdutos;
use App\Models\Orcamento;

class OrcamentoControllerApi extends Controller
{

    private $orcamento;
    private $orcamentoProdutos;
    public function __construct(Orcamento $orcamento, OrcamentoProdutos $orcamentoProdutos)
    {
        $this->orcamento = $orcamento;
        $this->orcamentoProdutos = $orcamentoProdutos;
    }

    public function showall(Request $request)
    {
        if($request->key){
            return $this->orcamento->with(['cliente','produtosDoOrcamento'])->where('situacao','like','%'.$request->key.'%')->get();
        }
        return $this->orcamento->with(['cliente','produtosDoOrcamento'])->paginate();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $orcamento = new Orcamento;

        $orcamento->cliente_id = $request->input('cliente_id');
        $orcamento->data = $request->input('data');
        $orcamento->situacao = $request->input('situacao');
        $orcamento->valorTotal = $request->input('valortotal');
        $orcamento->save();

        $produtos = collect($request->input('produtos', []))
            ->map(function ($produtos) {
                return ['quantidade' => $produtos];
            });
        $orcamento->produtosDoOrcamento()->sync($produtos);

        return $orcamento;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orcamento = Orcamento::FindOrFail($id);
        $cliente = $orcamento->cliente;
        $produtos = $orcamento->produtosDoOrcamento;
        return [$orcamento, $cliente, $produtos];
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delOrcamento = Orcamento::FindOrFail($id);
        if ($delOrcamento->delete()) {
            return new OrcamentoResource($delOrcamento);
        }
    }
}
