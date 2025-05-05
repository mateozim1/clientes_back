<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('profissoes', function (Blueprint $table) {
            $table->id();
            $table->string('nome_profissao');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profissoes');
    }
};
