<?php

namespace Database\Factories;

use App\Models\Endereco;
use App\Models\Profissao;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    public function definition(): array
    {
        $faker = \Faker\Factory::create('pt_BR');

        $tipoPessoa = $faker->randomElement(['física', 'jurídica']);
        $documento = $tipoPessoa === 'física'
            ? preg_replace('/[^0-9]/', '', $faker->cpf)
            : preg_replace('/[^0-9]/', '', $faker->cnpj);

        return [
            'nome' => $faker->name,
            'data_nascimento' => $faker->date('Y-m-d', '-18 years'),
            'tipo_pessoa' => $tipoPessoa,
            'cpf_cnpj' => $documento,
            'email' => $faker->unique()->safeEmail,
            'telefone' => $faker->numerify('(##) #####-####'),
            'id_endereco' => Endereco::factory(),
            'id_profissao' => Profissao::inRandomOrder()->first()->id ?? Profissao::factory(),
            'status' => $faker->randomElement(['ativo', 'inativo']),
        ];
    }
}
