<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTSitiosTuristicos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_sitios_turisticos', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('id_region')->length(11)->index();
            $table->string('nombre')->length(255);
            $table->text('descripcion');
            $table->text('como_llegar');
            $table->text('lugares_relacionados');
            $table->json('coordenadas');
            $table->boolean('activo')->default(true);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            //$table->timestamps(); //Solo con SQLite
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_sitios_turisticos');
    }
}
