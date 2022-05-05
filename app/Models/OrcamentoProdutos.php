<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrcamentoProdutos extends Model
{
    use HasFactory;
    protected $fillable = ['id_produto', 'id_orcamento'];
}
