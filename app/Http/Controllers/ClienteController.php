<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ClienteController extends Controller
{
    public function index()
    {

        $clientes = Cliente::all();

        return view('home', compact('clientes'));
        // return view('home', ['clientes'=>$clientes]);
    }
    public function addData()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        // Cliente::create([
        //     'nome'=>$request->nome,
        //     'idade'=>$request->idade
        // ]);

        $rules = [
            'nome' => 'required|max:10|min:3',
            'email' => 'required|email',
        ];

        $cm = ['nome.required' => 'Digite o nome'];

        $this->validate($request, $rules, $cm);
        $clientes  = new Cliente();
        $clientes->nome = $request->nome;
        $clientes->email = $request->email;
        $clientes->save();

        Session::flash('msg', 'Data Save Susseful');
        return redirect('/');
    }


    public function edit($id = null)
    {

        $cliente = Cliente::find($id);

        return view('edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'nome' => 'required|max:20|min:3',
            'email' => 'required|email',
        ];

        $cm = ['nome.required' => 'Digite o nome'];
        $this->validate($request, $rules, $cm);
        $clientes  = Cliente::find($id);
        $clientes->nome = $request->nome;
        $clientes->email = $request->email;
        $clientes->save();

        Session::flash('msg', 'Data Save Susseful');
        return redirect('/');
    }
    public function delete($id = null)
    {

        $cliente = Cliente::find($id);
        $cliente->delete();
        Session::flash('msg', 'Delete Susseful');
        return redirect('/');
    }
}
