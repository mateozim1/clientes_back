<?php

namespace App\Repositories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Collection;

class ClienteRepository
{
    public function getAll(): Collection
    {
        return Cliente::with(['endereco', 'profissao'])->get();
    }

    public function findById(int $id): ? Cliente
    {
        return Cliente::with(['endereco', 'profissao'])->findOrFail($id);
    }

    public function searchByName(string $nome): Collection
    {
        return Cliente::with(['endereco', 'profissao'])
            ->where('nome', 'like', "%{$nome}%")
            ->get();
    }

    public function create(array $data): Cliente
    {
        return Cliente::create($data);
    }

    public function update(Cliente $cliente, array $data): Cliente
    {
        $cliente->update($data);
        return $cliente;
    }

    public function delete(int $id): void
    {
        Cliente::destroy($id);
    }
}
