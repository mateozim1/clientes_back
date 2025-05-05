<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Cliente;
use App\Models\Endereco;
use App\Models\Profissao;
use App\Services\ClienteService;
use App\Repositories\ClienteRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;

class ClienteServiceTest extends TestCase
{
    use RefreshDatabase;

    protected ClienteService $service;

    protected function setUp(): void
    {
        parent::setUp();
        Artisan::call('db:seed');
        $this->service = new ClienteService(new ClienteRepository);
    }

    public function test_create_cliente(): void
    {
        $endereco = Endereco::factory()->create();
        $profissao = Profissao::first();

        $data = [
            'nome' => 'Maria Silva',
            'data_nascimento' => '1990-01-01',
            'tipo_pessoa' => 'fisica',
            'cpf_cnpj' => '12345678901',
            'email' => 'maria@email.com',
            'telefone' => '(11) 91234-5678',
            'id_endereco' => $endereco->id,
            'id_profissao' => $profissao->id,
            'status' => 'ativo'
        ];

        $cliente = $this->service->create($data);

        $this->assertInstanceOf(Cliente::class, $cliente);
        $this->assertEquals('Maria Silva', $cliente->nome);
    }

    public function test_get_cliente_by_id(): void
    {
        $cliente = Cliente::factory()->create();

        $result = $this->service->getById($cliente->id);

        $this->assertInstanceOf(Cliente::class, $result);
        $this->assertEquals($cliente->id, $result->id);
    }

    public function test_get_all_clientes(): void
    {
        $clientes = $this->service->getAll();

        $this->assertCount(10, $clientes);
    }

    public function test_update_cliente(): void
    {
        $cliente = Cliente::factory()->create();
        $data = ['nome' => 'João Atualizado'];

        $updated = $this->service->update($cliente, $data);

        $this->assertEquals('João Atualizado', $updated->nome);
    }

    public function test_delete_cliente(): void
    {
        $cliente = Cliente::factory()->create();

        $this->service->delete($cliente->id);

        $this->assertDatabaseMissing('clientes', ['id' => $cliente->id]);
    }

    public function test_search_cliente_by_name(): void
    {
        Cliente::factory()->create(['nome' => 'Carlos Souza']);
        Cliente::factory()->create(['nome' => 'Carla Mendes']);

        $result = $this->service->search('Carl');

        $this->assertCount(2, $result);
    }
}

