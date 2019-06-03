<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ActualizaTablaPrivilegios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('crmmex_sis_rol_reglas', function (Blueprint $table) {
            //
            $table->foreign('idRol')->references('id')->on('crmmex_sis_roles')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('crmmex_sis_rol_reglas', function (Blueprint $table) {
            //
        });
    }
}
