<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Endereco extends Model
{
    use HasFactory;

    protected $fillable = [
        'endereco',
        'numero',
        'bairro',
        'complemento',
        'cidade',
        'uf'
    ];

    public function clientes()
    {
        return $this->hasMany(Cliente::class, 'id_endereco');
    }
}
