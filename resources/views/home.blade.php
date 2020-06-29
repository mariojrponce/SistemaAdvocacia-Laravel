@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Usuários Cadastrados</div>

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
                            <th scope="col">ID</th>
                            <th width="25%" scope="col">Nome</th>
                            <th scope="col">E-mail</th>
                        @endslot
                        @slot('loop')
                            @foreach ($usuarios as $usuario)
                            <tr>
                                <th>
                                    {{$usuario->id}}
                                </th>
                                <th>
                                    {{$usuario->name}}
                                </th>
                                <th>
                                    {{$usuario->email}}
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
