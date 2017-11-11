<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->string('abbr',5);
            $table->timestamps();
        });


        DB::Table('country')->insert(array( 'id' => 1, 'name' => 'BRASIL', 'abbr' => 'BRA'));
        DB::Table('country')->insert(array( 'id' => 2, 'name' => 'PARAGUAI', 'abbr' => 'PAR'));
        DB::Table('country')->insert(array( 'id' => 3, 'name' => 'ARGENTINA', 'abbr' => 'ARG'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('country');
    }
}
