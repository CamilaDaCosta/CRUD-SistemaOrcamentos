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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showall()


    {
        return $this->orcamento->with(
            [
                'cliente',
                'produtosDoOrcamento'
            ]
        )->paginate();
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

        $orcamento->cliente_id = $request->input('id_cliente');
        $orcamento->data = $request->input('data');
        $orcamento->situacao = $request->input('situacao');
        $orcamento->valorTotal = 0;

        $orcamento->save();


        /*
        $idProduto = $request->input('id_produto');
        foreach ($idProduto as $id) {
            $op = new OrcamentoProdutos;
            $op->produto_id = $id;
            $op->orcamento_id = $orcamento->id;
        }
        */
        /*
        $produtos = collect($request->input('id_produtos', []))
            ->map(function ($produtos) {
                return ['quantidade' => $produtos];
            });
        */
        /*
        $orcamento->produtosDoOrcamento()->sync(
            [
                $request->input('id_produto',),
                $request->input('quantidade',)
            ]
        );
*/

        $orcamentoProdutos = new OrcamentoProdutos;

        $orcamentoProdutos->produto_id = $request->input('id_produto');
        $orcamentoProdutos->quantidade = $request->input('quantidade');
        $orcamentoProdutos->orcamento_id = $orcamento->id;
        $orcamentoProdutos->save();


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
        dd($this->orcamento->with('produtosDoOrcamento'));
        return $orcamento->with(
            [
                'cliente',
                'produtosDoOrcamento'
            ]
        );
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
