<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'USUARIO';
    protected $primaryKey = 'CD_USUARIO';
    public $timestamps = false;

    protected $fillable = [
        'NICKNAME', 'NOME', 'TELEFONE', 'ATIVO'
    ];
}
