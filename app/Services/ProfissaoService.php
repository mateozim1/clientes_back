<?php

namespace App\Services;

use App\Models\Profissao;
use App\Repositories\ProfissaoRepository;
use Illuminate\Database\Eloquent\Collection;

class ProfissaoService
{
    public function __construct(protected ProfissaoRepository $repository) {}

    public function getAll(): Collection
    {
        return $this->repository->getAll();
    }
}
