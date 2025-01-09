@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cadastrar Usuário</h1>
    <form action="{{ route('usuarios.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="NICKNAME">Nickname:</label>
            <input type="text" class="form-control" name="NICKNAME" id="NICKNAME" value="{{ old('NICKNAME') }}">
            @error('NICKNAME')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="NOME">Nome:</label>
            <input type="text" class="form-control" name="NOME" id="NOME" value="{{ old('NOME') }}">
            @error('NOME')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="TELEFONE">Telefone:</label>
            <input type="text" class="form-control" name="TELEFONE" id="TELEFONE" value="{{ old('TELEFONE') }}">
            @error('TELEFONE')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="ATIVO">Ativo:</label>
            <select class="form-control" name="ATIVO" id="ATIVO">
                <option value="S" {{ old('ATIVO') == 'S' ? 'selected' : '' }}>Sim</option>
                <option value="N" {{ old('ATIVO') == 'N' ? 'selected' : '' }}>Não</option>
            </select>
            @error('ATIVO')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection
