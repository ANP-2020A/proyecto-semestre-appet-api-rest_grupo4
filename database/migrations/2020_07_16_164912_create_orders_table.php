<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            //se crea todos los campos para la BDD
            $table->bigIncrements('id_order');
            $table->dateTime('fecha_pedido');
            $table->dateTime('fecha_atencion');
            $table->string('descripcion');
            $table->string('novedades');
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
        Schema::dropIfExists('orders');
    }
}
    //chicos no puedo hacer?
