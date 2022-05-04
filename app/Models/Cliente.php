<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function endereco(){
        return $this->hasOne(Endereco::class, 'id_cliente');// 1 para 1
    }
    // public function search($filter = ''){
    //     $results = $this->where(function ($query) use ($filter){
    //         if ($filter){
    //             $query->DB::table('clientes')->select('clientes.nome')
    //             ->join('enderecos','clientes.id', '=', 'enderecos.id_cliente')
    //             ->where('cidade', 'like', "%{$filter}%")->get();
    //             // where('nome', 'like', "%{$filter}%")
    //             // ->orWhere('cpf', 'like', "%{$filter}%");
    //         }
    //     })->toSql()->first();//->paginate();
    //     dd($results);
    //     //return $results;
    // }
}
