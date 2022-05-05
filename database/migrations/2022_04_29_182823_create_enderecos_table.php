<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->id();
            $table->string("cep");
            $table->string("logradouro");
            $table->string("numero");
            $table->string("complemento");
            $table->string("cidade");
            $table->string("estado");
            $table->unsignedBigInteger('id_cliente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enderecos');
        $table->foreign('id_cliente')
            ->references('id')
            ->on('clientes')
            ->onDelete('cascade');
    }
};
