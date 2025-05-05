<?php

namespace App\Repositories;

use App\Models\Profissao;
use Illuminate\Database\Eloquent\Collection;

class ProfissaoRepository
{
    public function getAll(): Collection
    {
        return Profissao::get();
    }
}
