@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Clientes Cadastrados</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- INICIO: Conteúdo da Listagem --}}
                    <div class="container">
                        @component('componente.listagem.tabela')
                        @slot('titulo')
                            <th width="25%" scope="col">Nome</th>
                            <th scope="col">Nascimento</th>
                            <th scope="col">Genero</th>
                            <th width="7%">Ações</th>
                        @endslot
                        @slot('loop')
                            @foreach ($pessoas as $pessoa)
                            <tr>
                                <th>
                                    {{$pessoa->nome}}
                                </th>
                                <th>
                                    {{$pessoa->data_nascimento}}
                                </th>
                                <th>
                                    {{$pessoa->descricao}}
                                </th>
                                <td>
                                    <div class="row text-center">
                                        <div class="col">
                                            <a href="{{route('cliente.editar', $pessoa->id)}}" data-toggle="tooltip" data-placement="top" title="Editar" class="text-primary" >Editar</a>
                                            <a href="{{route('cliente.deletar', $pessoa->id)}}" data-toggle="tooltip" data-placement="top" title="Deletar" class="text-danger">Deletar</a>
                                        </div>
                                    </div>
                                </td>
                            @endforeach
                        @endslot
                    @endcomponent
                    </div>
                    {{-- FIM: Conteúdo da Listagem --}}

                    <!--Botão criar novo cliente-->
                    <div class="row" name="buttons_row" id="buttons_row_id" >
                        <div class="mt-4 ml-4"><a href="{{url()->previous()}}" class="btn btn-outline-primary" role="button">Voltar</a></div>
                    <div class="mt-4 ml-auto mr-4">
                        <a href="{{ route('cliente.criar') }}" class="btn btn-outline-success">Novo Cliente</a>
                    </div>
                    </div>

            </div>
        </div>
    </div>
</div>
@endsection
