<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Http\Resources\ClienteResource;
use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use App\Services\ClienteService;
use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *     title="API de Clientes",
 *     version="1.0.0"
 * )
 */
class ClienteController extends Controller
{
    public function __construct(protected ClienteService $service) {}

    /**
     * @OA\Get(
     *     path="/api/clientes",
     *     summary="Listar todos os clientes",
     *     @OA\Response(
     *         response=200,
     *         description="Lista de clientes"
     *     )
     * )
     */
    public function index()
    {
        return response()->json(ClienteResource::collection($this->service->getAll()));
    }

    /**
     * @OA\Post(
     *     path="/api/clientes",
     *     summary="Criar novo cliente",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"nome", "data_nascimento", "tipo_pessoa", "cpf_cnpj", "email", "telefone", "id_endereco", "id_profissao", "status","endereco", "numero", "bairro", "cidade", "uf"},
     *             @OA\Property(property="nome", type="string"),
     *             @OA\Property(
     *                 property="data_nascimento",
     *                 type="string",
     *                 pattern="^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}$",
     *                 description="Formato: YYYY-MM-DD HH:MM:SS"
     *             ),
     *             @OA\Property(property="tipo_pessoa", type="string"),
     *             @OA\Property(property="cpf_cnpj", type="string"),
     *             @OA\Property(property="email", type="string", format="email"),
     *             @OA\Property(
     *                 property="telefone",
     *                 type="string",
     *                 pattern="^\(\d{2}\)\s\d{4,5}-\d{4}$",
     *                 description="Formato: (00) 0000-0000 ou (00) 00000-0000"
     *             ),
     *             @OA\Property(property="id_endereco", type="integer"),
     *             @OA\Property(property="id_profissao", type="integer"),
     *             @OA\Property(property="status", type="string"),
     *      *      @OA\Property(property="endereco", type="string"),
     *             @OA\Property(property="numero", type="string"),
     *             @OA\Property(property="bairro", type="string"),
     *             @OA\Property(property="complemento", type="string"),
     *             @OA\Property(property="cidade", type="string"),
     *             @OA\Property(property="uf", type="string"),
     *         )
     *     ),
     *     @OA\Response(response=201, description="Cliente criado com sucesso")
     * )
     */
    public function store(Request $request)
    {
        $cliente = $this->service->create($request->all());
        return response()->json(new ClienteResource($cliente), 201);
    }

    public function show($id)
    {
        return response()->json(new ClienteResource($this->service->getById($id)));
    }

    public function update(UpdateClienteRequest $request, $id)
    {
        $cliente = $this->service->getById($id);
        $cliente = $this->service->update($cliente, $request->validated());
        return response()->json(new ClienteResource($cliente));
    }

    /**
     * @OA\Delete(
     *     path="/api/clientes/{id}",
     *     summary="Deletar cliente",
     *     description="Remove um cliente pelo ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID do cliente",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Cliente deletado com sucesso"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Cliente não encontrado"
     *     )
     * )
     */
    public function destroy($id)
    {
        $this->service->delete($id);
        return response()->json(['message' => 'Cliente removido com sucesso']);
    }

    public function searchByName($nome)
    {
        return response()->json(ClienteResource::collection($this->service->search($nome)));
    }
}
