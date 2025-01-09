@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Usuários</h1>
    <!-- Formulário de Pesquisa -->
    <form action="{{ route('usuarios.index') }}" method="GET" class="form-inline mb-2">
        <div class="form-group">
            <label for="search" class="sr-only">Pesquisar por Nickname</label>
            <input type="text" class="form-control" id="search" name="search" placeholder="Pesquisar por Nickname">
        </div>
        <button type="submit" class="btn btn-primary">Pesquisar</button>
    </form>

    <!-- Link para Adicionar Usuário -->
    <a href="{{ route('usuarios.create') }}" class="btn btn-success mb-2">Adicionar Usuário</a>
    
    <!-- Lista de Usuários -->
    <ul>
        @foreach ($usuarios as $usuario)
            <li>
                {{ $usuario->NOME }}
                <a href="{{ route('usuarios.edit', $usuario->CD_USUARIO) }}" class="btn btn-warning">Editar</a>
                <form action="{{ route('usuarios.destroy', $usuario->CD_USUARIO) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
@endsection
