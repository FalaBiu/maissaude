<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'NICKNAME' => 'required|string|max:40|unique:USUARIO',
            'NOME' => 'required|string|max:255',
            'TELEFONE' => 'required|string|max:20',
            'ATIVO' => 'required|in:S,N',
        ]);

        Usuario::create($request->all());
        return redirect()->route('usuarios.index')->with('success', 'Usuário criado com sucesso!');
    }

    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

    // Outros métodos: edit, update, destroy, etc.
}
