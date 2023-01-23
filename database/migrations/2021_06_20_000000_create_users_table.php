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
            $table->increments('id');
            $table->string('name');
            $table->string('tipo_documento',20)->nullable();
            $table->string('num_documento',20)->nullable();
            $table->string('direccion',70)->nullable();
            $table->string('telefono',20)->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->integer('idrol')->unsigned();
            $table->foreign('idrol')->references('id')->on('rols')->onDelete('cascade');
            $table->string('imagen')->nullable();
            $table->rememberToken();
            $table->timestamps();

        });
        //DB::table('users')->insert(array('id'=>'1','name'=>'yoel','tipo_documento'=>'dni','num_documento'=>'77885544',
        //'direccion'=>'trujillo','telefono'=>'98765432','email'=>'yoel@test.com','password'=>bcrypt('1234')));
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
