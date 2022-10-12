<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngressoEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingressos_eventos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ingresso_id')->constrained('ingressos');
            $table->foreignId('evento_id')->constrained('eventos')->nullable();
            $table->decimal('valor_venda');
            $table->integer('quantidade_ingressos');
            $table->integer('quantidade_disponivel');
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
        Schema::dropIfExists('ingressos_eventos');
    }
}
