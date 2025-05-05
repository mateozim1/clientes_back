<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Endereco;
use Illuminate\Http\Request;
use App\Http\Resources\EnderecoResource;
use App\Http\Requests\StoreEnderecoRequest;
use App\Http\Requests\UpdateEnderecoRequest;
use App\Services\EnderecoService;
use OpenApi\Annotations as OA;

class EnderecoController extends Controller
{
    public function __construct(protected EnderecoService $service) {}

    /**
     * @OA\Get(
     *     path="/api/endereco",
     *     summary="Listar todos os enderecos",
     *     @OA\Response(
     *         response=200,
     *         description="Lista de enderecos"
     *     )
     * )
     */
    public function index()
    {
        return response()->json(EnderecoResource::collection($this->service->getAll()));
    }

    /**
     * @OA\Post(
     *     path="/api/endereco",
     *     summary="Criar novo endereco",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"endereco", "numero", "bairro", "cidade", "uf"},
     *             @OA\Property(property="endereco", type="string"),
     *             @OA\Property(property="numero", type="string"),
     *             @OA\Property(property="bairro", type="string"),
     *             @OA\Property(property="complemento", type="string"),
     *             @OA\Property(property="cidade", type="string"),
     *             @OA\Property(property="uf", type="string"),
     *         )
     *     ),
     *     @OA\Response(response=201, description="Endereco criado com sucesso")
     * )
     */
    public function store(StoreEnderecoRequest $request)
    {
        $endereco = $this->service->create($request->validated());
        return response()->json(new EnderecoResource($endereco), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Endereco $endereco)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Endereco $endereco)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Endereco $endereco)
    {
        //
    }
}
