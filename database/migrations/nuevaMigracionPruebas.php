<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaMigracionTest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create( 'tabla_test' , function( Blueprint $tabla ) {
            $tabla->increments( 'id' );
            $tabla->string( 'name' );
            $tabla->string( 'apPaterno' );
            $tabla->string( 'apMaterno' );
            $tabla->boolean( 'status' )->default( '1' );
            $tabla->timestamps();
            $tabla->softDeletes();
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists( 'tabla_test' );
    }
}
