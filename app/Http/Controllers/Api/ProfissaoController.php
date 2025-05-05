<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProfissaoResource;
use App\Models\Profissao;
use App\Services\ProfissaoService;
use OpenApi\Annotations as OA;

class ProfissaoController extends Controller
{
    public function __construct(protected ProfissaoService $service) {}

    /**
     * @OA\Get(
     *     path="/api/profissoes",
     *     summary="Listar todos as profissoes",
     *     @OA\Response(
     *         response=200,
     *         description="Lista de profissoes"
     *     )
     * )
     */
    public function index()
    {
        return response()->json(ProfissaoResource::collection($this->service->getAll()));
    }
}
