<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function orcamentosDoProduto()
    {
        return $this->belongsToMany(Orcamento::class, 'orcamento_produtos')->withPivot(['quantidade']);
    }
}
