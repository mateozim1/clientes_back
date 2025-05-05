<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profissao extends Model
{
    use HasFactory;

    protected $table = 'profissoes';

    protected $fillable = ['nome_profissao'];

    public function clientes()
    {
        return $this->hasMany(Cliente::class, 'id_profissao');
    }
}
