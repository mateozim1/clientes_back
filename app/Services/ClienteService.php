<?php

namespace App\Services;

use App\Models\Cliente;
use App\Repositories\ClienteRepository;
use Illuminate\Database\Eloquent\Collection;
use App\Services\EnderecoService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class ClienteService
{
    protected ClienteRepository $repository;
    protected EnderecoService $enderecoService;

    public function __construct(ClienteRepository $repository, EnderecoService $enderecoService)
    {
        $this->repository = $repository;
        $this->enderecoService = $enderecoService;
    }

    public function getAll(): Collection
    {
        return $this->repository->getAll();
    }

    public function getById(int $id): Cliente
    {
        return $this->repository->findById($id);
    }

    public function create(array $data): Cliente
    {
        try {
            return DB::transaction(function () use ($data) {
                $enderecoData = [
                    'endereco' => $data['endereco'],
                    'numero' => $data['numero'],
                    'bairro' => $data['bairro'],
                    'complemento' => $data['complemento'] ?? null,
                    'cidade' => $data['cidade'],
                    'uf' => $data['uf'],
                ];

                $endereco = $this->enderecoService->create($enderecoData);

                $data['id_endereco'] = $endereco->id;

                unset(
                    $data['endereco'],
                    $data['numero'],
                    $data['bairro'],
                    $data['complemento'],
                    $data['cidade'],
                    $data['uf']
                );

                return $this->repository->create($data);
            });
        } catch (Throwable $e) {
            Log::error('Erro ao criar cliente: ' . $e->getMessage());
            throw $e;
        }
    }

    public function update(Cliente $cliente, array $data): Cliente
    {
        return $this->repository->update($cliente, $data);
    }

    public function delete(int $id): void
    {
        $this->repository->delete($id);
    }
}
