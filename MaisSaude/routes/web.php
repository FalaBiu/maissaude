<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

Route::get('/', function () {
    return view('welcome');
    
});

//rota do controller de usuario
Route::resource('usuarios', UsuarioController::class);