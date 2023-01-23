<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert(array('name'=>'Jonathan Alva Abanto','tipo_documento'=>'DNI','num_documento'=>'764457834',
      'direccion'=>'Trujillo','telefono'=>'98765432','email'=>'jonathan@gmail.com','password'=> Hash::make('jhon33'),'idrol'=>'1' ));
    }
}
