<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('contatos', function (Blueprint $table) {
            $table->integer('altura')->change(); // Alterando para centímetros
        });
    }

    public function down()
    {
        Schema::table('contatos', function (Blueprint $table) {
            $table->decimal('altura', 5, 2)->change(); // Voltar para metros se necessário
        });
    }
};
