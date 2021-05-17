<?php

namespace App\Http\Controllers\Api;

use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class ClienteController extends Controller
{
    public function index()
    {

        $cliente = Cliente::all();
        return $cliente;
    }

    public function create(Request $request)
    {

        $cliente = new Cliente();

        $cliente->nome = $request->nome;
        $cliente->idade = $request->idade;
        $cliente->save();

        return ['msg' => 'cliente Adicionado com sucesso'];
    }

    public function delete($id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();
        return ['msg' => 'cliente Removido com sucesso'];
    }


    public function update(Request $request, $id)
    {

        try {
            $cliente =  Cliente::find($id);
            $cliente->nome = $request->nome;
            $cliente->idade = $request->idade;
            $cliente->save();

            return ['msg' => $cliente];
        } catch (\Throwable $th) {
            return ['msg' => "Erro ao Salvar"];
        }
    }


    public function find($id)
    {
        $cliente = Cliente::find($id);
        return ['msg' => $cliente];
    }
}
