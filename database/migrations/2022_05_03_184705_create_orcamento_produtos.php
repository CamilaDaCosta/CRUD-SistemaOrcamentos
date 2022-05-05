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
        Schema::create('orcamento_produtos', function (Blueprint $table) {
            $table->timestamps();
            $table->foreignId('produto_id')->constrained()->onDelete('cascade');
            $table->foreignId('orcamento_id')->constrained()->onDelete('cascade');
            $table->string("quantidade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orcamento_produtos');
    }
};
