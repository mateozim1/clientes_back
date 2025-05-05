<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Endereco;

class EnderecoSeeder extends Seeder
{
    public function run(): void
    {
        Endereco::factory()->count(10)->create();
    }
}
