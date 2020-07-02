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
                            @endforeach
                        @endslot
                    @endcomponent
                    </div>
                    {{-- FIM: Conteúdo da Listagem --}}
            </div>
        </div>
    </div>
</div>
@endsection
