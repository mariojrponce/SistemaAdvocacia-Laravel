@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style=" font-weight: normal; font-style: normal;">Cadastrar Clientes</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <!-- INÍCIO: Form -->
                        <form action="{{ route('cliente.salvar') }}" method="POST" enctype="multipart/form-data" >
                            @csrf

                            <fieldset>
                                <a class="text-center" style="font-weight: bold; font-style: normal;"><h5>Dados pessoais</h5></a>
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

                                {{-- Conteúdo Pessoa --}}
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
                                            <input id="inputData" type="date" name="data_nascimento" class="form-control rounded-pill"  value="{{ old('data_nascimento') }}"  required>
                                        </div>
                                    </div>
                                </div>
                                <a class="text-center" style="font-weight: bold; font-style: normal;"><h5>Dados para contato</h5></a>
                                {{-- Conteúdo Contato --}}
                                <div class="row">
                                    <div class="col" name="telefone_col" id="telefone_col_id" >
                                        <div class="form-group">
                                            <label for="inputTelefone">Telefone:</label>
                                            <input id="inputTelefone" class="form-control rounded-pill" type="text" name="telefone" value="{{ old('telefone') }}" required>
                                        </div>
                                    </div>
                                    <div class="col" name="email_col" id="email_col_id" >
                                        <div class="form-group">
                                            <label for="inputEmail">Email:</label>
                                            <input id="inputEmail" class="form-control rounded-pill" type="text" name="email" value="{{ old('email') }}" required>
                                        </div>
                                    </div>
                                </div>
                                <a class="text-center" style="font-weight: bold; font-style: normal;"><h5>Pessoa Física</h5></a>
                                {{-- Conteúdo Pessoa física --}}
                                <div class="row">
                                    <div class="col" name="rg_col" id="rg_col_id" >
                                        <div class="form-group">
                                            <label for="inputRg">RG:</label>
                                            <input id="inputRg" class="form-control rounded-pill" type="text" name="rg" value="{{ old('rg') }}">
                                        </div>
                                    </div>
                                    <div class="col" name="cpf_col" id="cpf_col_id" >
                                        <div class="form-group">
                                            <label for="inputCpf">CPF:</label>
                                            <input id="inputCpf" class="form-control rounded-pill" type="text" name="cpf" value="{{ old('cpf') }}">
                                        </div>
                                    </div>
                                </div>
                                <a class="text-center" style="font-weight: bold; font-style: normal;"><h5>Pessoa Jurídica</h5></a>
                                {{-- Conteúdo Pessoa física --}}
                                <div class="row-2">
                                    <div class="col" name="razao_social_col" id="razao_social_col_id" >
                                        <div class="form-group">
                                            <label for="inputRazaoSocial">Razão Social:</label>
                                            <input id="inputRazaoSocial" class="form-control rounded-pill" type="text" name="razao_social" value="{{ old('razao_social') }}">
                                        </div>
                                    </div>
                                    <div class="col" name="inscricao_estadual_col" id="inscricao_estadual_col_id" >
                                        <div class="form-group">
                                            <label for="inputInscricaoEstadual">Inscricao Estadual:</label>
                                            <input id="inputInscricaoEstadual" class="form-control rounded-pill" type="text" name="inscricao_estadual" value="{{ old('inscricao_estadual') }}">
                                        </div>
                                    </div>
                                    <div class="col" name="cnpj_col" id="cnpjl_col_id" >
                                        <div class="form-group">
                                            <label for="inputCnpj">CNPJ:</label>
                                            <input id="inputCnpj" class="form-control rounded-pill" type="text" name="cnpj" value="{{ old('cnpj') }}">
                                        </div>
                                    </div>
                                    <div class="col" name="nome_fantasia_col" id="nome_fantasia_col_id" >
                                        <div class="form-group">
                                            <label for="inputCnpj">Nome Fantasia:</label>
                                            <input id="inputCnpj" class="form-control rounded-pill" type="text" name="nome_fantasia" value="{{ old('nome_fantasia') }}">
                                        </div>
                                    </div>
                                </div>

                                <!--Botão enviar formulário-->
                                <div class="row" name="buttons_row" id="buttons_row_id" >
                                        <div class="mt-4 ml-4"><a href="{{url()->previous()}}" class="btn btn-outline-primary" role="button">Voltar</a></div>
                                    <div class="mt-4 ml-auto mr-4">
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
