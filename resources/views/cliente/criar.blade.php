@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cadastrar Clientes</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <!-- INÍCIO: Form -->
                        <form action="{{ route('cliente.salvar') }}" method="POST" enctype="multipart/form-data" >
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="container-fluid text-center mb-4">
                                        <a class="flex-fill" style="font-family: 'Google Sans'; font-weight: bold; font-style: normal;"><h5>Cadastro</h5>
                                            <text class="text-black-50" style="font-family: 'Google Sans'; font-weight: normal; font-style: normal;">Cliente</text>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <fieldset>

                                {{-- Linha do genero --}}
                                <div class="row">
                                    {{-- Coluna contém seleção do genero --}}
                                    <div class="col-6" name="genero_col" id="genero_col_id">
                                        <div class="form-group" >
                                            <label for="my-input">Tipo do genero</label>
                                                {{-- Listagem tipos Atos Normativos --}}
                                                <select name="idgenero" id="genero_id" class="form-control" required>
                                                    <option value="">Selecione</option>
                                                    @foreach ($generos as $genero)
                                                        <option value="{{ $genero->id }}" {{ old('genero') == $genero->id ? 'selected' : '' }}>{{ $genero->descricao }}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                {{-- Conteúdo do cliente --}}
                                <div class="row">
                                    <div class="col" name="nome_col" id="nome_col_id" >
                                        <div class="form-group">
                                            <label for="inputNome">Nome:</label>
                                            <input id="inputNome" class="form-control rounded-pill" type="text" name="nome" value="{{ old('nome') }}" required>
                                        </div>
                                    </div>
                                    <div class="col" name="nascimento_col" id="nacimento_col_id">
                                        <div class="form-group">
                                            <label id="inputData">Data de nascimento':</label>
                                            <input id="inputData" type="date" name="data_nascimento" class="form-control rounded-pill"  value="{{ old('data_doc') }}"  required>
                                        </div>
                                    </div>
                                </div>

                                <!--Botão enviar formulário-->
                                <div class="row mb-5" name="buttons_row" id="buttons_row_id" >
                                        <div class="mt-4 ml-4"><a href="{{url()->previous()}}" class="btn btn-outline-primary" role="button">Voltar</a></div>
                                    <div class="mt-4 ml-auto mr-4 mb-4">
                                        <button type="submit" class="btn btn-outline-success mr-3">Salvar</button>
                                        <button type="reset" class="btn btn-outline-danger">Limpar</button>
                                    </div>
                                </div>

                            </fieldset>
                        </form>
                        <!-- FIM: Form -->
            </div>
        </div>
    </div>
</div>
@endsection
