<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profissao;

class ProfissaoSeeder extends Seeder
{
    public function run(): void
    {
        $profissoes = [
            'Administração',
            'Consultor',
            'Contabilidade',
            'Engenheiro de Software',
            'Logística',
            'Recursos Humanos'
        ];

        foreach ($profissoes as $nome) {
            Profissao::firstOrCreate(['nome_profissao' => $nome]);
        }
    }
}
