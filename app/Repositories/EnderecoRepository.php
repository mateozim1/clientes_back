<?php

namespace App\Repositories;

use App\Models\Endereco;
use Illuminate\Database\Eloquent\Collection;

class EnderecoRepository
{
    public function getAll(): Collection
    {
        return Endereco::get();
    }

    public function findById(int $id): ? Endereco
    {
        return Endereco::findOrFail($id);
    }

    public function searchByName(string $endereco): Collection
    {
        return Endereco::where('endereco', 'like', "%{$endereco}%")->get();
    }

    public function create(array $data): Endereco
    {
        return Endereco::create($data);
    }
}
