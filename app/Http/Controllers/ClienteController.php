<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Pessoa;
use App\Genero;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function listagem()
    {

        $pessoas = DB::select('SELECT id, nome, data_nascimento, descricao FROM public.vw_pessoa_genero');
        //dd($pessoas);

        return view('cliente.listagem', compact('pessoas'));
    }

    public function criar(){
        $generos = Genero::all();
        return view('cliente.criar', compact('generos'));
    }

    public function salvar(Request $request){
        $pessoa = new Pessoa();
        $pessoa->nome = $request->nome;
        $pessoa->data_nascimento = $request->data_nascimento;
        $pessoa->idgenero = $request->idgenero;
        $pessoa->save();
        return redirect()->route('cliente.listagem');
    }

    public function deletar($id){
        $pessoa = Pessoa::find($id);
        $pessoa->delete();

        return redirect()->route('cliente.listagem');
    }

    public function editar($id){
        $pessoa = Pessoa::findOrFail($id);
        $generos = Genero::all();
        return view('cliente.editar', compact('pessoa', 'generos'));
    }

    public function atualizar(Request $request){
        $pessoa = Pessoa::find($request->id);
        $pessoa->nome = $request->nome;
        $pessoa->data_nascimento = $request->data_nascimento;
        $pessoa->idgenero = $request->idgenero;
        $pessoa->save();
        return redirect()->route('cliente.listagem');
    }
}
