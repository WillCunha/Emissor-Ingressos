<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evento_id')->constrained('eventos');
            $table->foreignId('ingresso_id')->constrained('ingressos');
            $table->integer('user_id');
            $table->integer('quantidade');
            $table->decimal('unitario');
            $table->decimal('total');
            $table->string('metodo_pgto');
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
        Schema::dropIfExists('vendas');
    }
}
