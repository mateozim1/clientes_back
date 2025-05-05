<?php

namespace App\Services;

use App\Models\Endereco;
use App\Repositories\EnderecoRepository;
use Illuminate\Database\Eloquent\Collection;

class EnderecoService
{
    public function __construct(protected EnderecoRepository $repository) {}

    public function getAll(): Collection
    {
        return $this->repository->getAll();
    }

    public function getById(int $id): Endereco
    {
        return $this->repository->findById($id);
    }

    public function search(string $nome): Collection
    {
        return $this->repository->searchByName($nome);
    }

    public function create(array $data): Endereco
    {
        return $this->repository->create($data);
    }

    public function update(Endereco $endereco, array $data): Endereco
    {
        return $this->repository->update($endereco, $data);
    }

    public function delete(int $id): void
    {
        $this->repository->delete($id);
    }
}
