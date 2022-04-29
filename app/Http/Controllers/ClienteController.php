<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Endereco;

class ClienteController extends Controller
{
    public function clientes(){
        return view('cliente.create');
    }

    public function showall()
    {
        $cliente = Cliente::all();
        return view('cliente/showall', ['cliente' => $cliente]);
    }
}
