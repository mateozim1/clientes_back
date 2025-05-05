<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EnderecoFactory extends Factory
{
    public function definition(): array
    {
        $faker = \Faker\Factory::create('pt_BR');

        return [
            'endereco' => $faker->streetName,
            'numero' => $faker->buildingNumber,
            'bairro' => $faker->citySuffix,
            'complemento' => $faker->optional()->secondaryAddress,
            'cidade' => $faker->city,
            'uf' => $faker->stateAbbr,
        ];
    }
}
