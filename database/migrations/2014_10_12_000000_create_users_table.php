<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            //campos para la BDD
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->integer('cedula');
            $table->string('email')->unique();
            $table->string('direccion');
            $table->integer('telefono');
            $table->string('tipo_usuario');
            $table->dateTime('fecha_registro');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
