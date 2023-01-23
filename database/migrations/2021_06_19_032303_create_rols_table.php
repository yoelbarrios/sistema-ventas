<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateRolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rols', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',30)->unique();
            $table->string('descripcion',100)->nullable();
        });
        DB::table('rols')->insert(array('id'=>'1','nombre'=>'Administrador','descripcion'=>'Administrador'));
        DB::table('rols')->insert(array('id'=>'2','nombre'=>'Vendedor','descripcion'=>'Vendedor'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rols');
    }
}
