<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Pessoa;
use App\Genero;
use App\Pessoa_fisica;
use App\Pessoa_juridica;
use App\Contato;
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

        $contato = new Contato();
        $contato->telefone = $request->telefone;
        $contato->email = $request->email;
        $contato->idpessoa = $pessoa->id;
        $contato->save();

        if($request->cpf){
            $pessoa_fisica = new Pessoa_fisica();
            $pessoa_fisica->rg = $request->rg;
            $pessoa_fisica->cpf = $request->cpf;
            $pessoa_fisica->idpessoa = $pessoa->id;
            $pessoa_fisica->save();
        }
        if($request->cnpj){
            //dd($request);
            $pessoa_juridica = new Pessoa_juridica();
            $pessoa_juridica->cnpj = $request->cnpj;
            $pessoa_juridica->razao_social = $request->razao_social;
            $pessoa_juridica->inscricao_estadual = $request->inscricao_estadual;
            $pessoa_juridica->nome_fantasia = $request->nome_fantasia;
            $pessoa_juridica->idpessoa = $pessoa->id;
            $pessoa_juridica->save();
        }


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
