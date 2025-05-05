<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProfissaoFactory extends Factory
{
    public function definition(): array
    {
        $profissoes = [
            'Administração',
            'Consultor',
            'Contabilidade',
            'Engenheiro de Software',
            'Logística',
            'Recursos Humanos'
        ];

        return [
            'nome_profissao' => $this->faker->randomElement($profissoes),
        ];
    }
}
