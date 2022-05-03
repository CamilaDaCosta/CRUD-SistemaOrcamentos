<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrcamentoController extends Controller
{

    protected $data = ['date'];

    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente');
    }

    public function produtosDoOrcamento()
    {
        return $this->belongsToMany(Produto::class, 'orcamento_produtos');
    }
}
