<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

    public function index(Request $request)
{
    $search = $request->get('search');
    if ($search) {
        $usuarios = Usuario::where('NICKNAME', 'like', '%' . $search . '%')->get();
    } else {
        $usuarios = Usuario::all();
    }
    return view('usuarios.index', compact('usuarios'));
}


    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'NICKNAME' => 'required|unique:USUARIO|max:40',
            'NOME' => 'required|max:255',
            'TELEFONE' => 'required|max:20',
            'ATIVO' => 'required|in:S,N'
        ]);

        Usuario::create($validatedData);
        return redirect()->route('usuarios.index')->with('success', 'Usuário criado com sucesso.');
    }

    public function show($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.show', compact('usuario'));
    }

    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'NICKNAME' => 'required|max:40|unique:USUARIO,NICKNAME,' . $id . ',CD_USUARIO',
            'NOME' => 'required|max:255',
            'TELEFONE' => 'required|max:20',
            'ATIVO' => 'required|in:S,N'
        ]);

        Usuario::where('CD_USUARIO', $id)->update($validatedData);
        return redirect()->route('usuarios.index')->with('success', 'Usuário atualizado com sucesso.');
    }

    public function destroy($id)
    {
        Usuario::destroy($id);
        return redirect()->route('usuarios.index')->with('success', 'Usuário deletado com sucesso.');
    }
}


