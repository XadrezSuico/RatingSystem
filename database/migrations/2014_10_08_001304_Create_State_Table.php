<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('state', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->string('abbr',5);
            $table->integer('country_id')->unsigned();
            $table->foreign('country_id')->references('id')->on('country');
            $table->timestamps();
        });

         DB::Table('State')->insert(array('id' => 1, 'country_id' => 1, 'name' => 'Alagoas', 'abbr' => 'AC' ));
         DB::Table('State')->insert(array('id' => 2, 'country_id' => 1, 'name' => 'Acre', 'abbr' => 'AL' ));
         DB::Table('State')->insert(array('id' => 3, 'country_id' => 1, 'name' => 'Amazonas', 'abbr' => 'AM' ));
         DB::Table('State')->insert(array('id' => 4, 'country_id' => 1, 'name' => 'Amapá', 'abbr' => 'AP' ));
         DB::Table('State')->insert(array('id' => 5, 'country_id' => 1, 'name' => 'Bahia', 'abbr' => 'BA' ));
         DB::Table('State')->insert(array('id' => 6, 'country_id' => 1, 'name' => 'Ceará', 'abbr' => 'CE' ));
         DB::Table('State')->insert(array('id' => 7, 'country_id' => 1, 'name' => 'Distrito Federal', 'abbr' => 'DF' ));
         DB::Table('State')->insert(array('id' => 8, 'country_id' => 1, 'name' => 'Espírito Santo', 'abbr' => 'ES' ));
         DB::Table('State')->insert(array('id' => 9, 'country_id' => 1, 'name' => 'Goiás', 'abbr' => 'GO' ));
         DB::Table('State')->insert(array('id' => 10, 'country_id' => 1, 'name' => 'Maranhão', 'abbr' => 'MA' ));
         DB::Table('State')->insert(array('id' => 11, 'country_id' => 1, 'name' => 'Minas Gerais', 'abbr' => 'MG' ));
         DB::Table('State')->insert(array('id' => 12, 'country_id' => 1, 'name' => 'Mato Grosso do Sul', 'abbr' => 'MS' ));
         DB::Table('State')->insert(array('id' => 13, 'country_id' => 1, 'name' => 'Mato Grosso', 'abbr' => 'MT' ));
         DB::Table('State')->insert(array('id' => 14, 'country_id' => 1, 'name' => 'Pará', 'abbr' => 'PA' ));
         DB::Table('State')->insert(array('id' => 15, 'country_id' => 1, 'name' => 'Paraíba', 'abbr' => 'PB' ));
         DB::Table('State')->insert(array('id' => 16, 'country_id' => 1, 'name' => 'Pernambuco', 'abbr' => 'PE' ));
         DB::Table('State')->insert(array('id' => 17, 'country_id' => 1, 'name' => 'Piauí', 'abbr' => 'PI' ));
         DB::Table('State')->insert(array('id' => 18, 'country_id' => 1, 'name' => 'Paraná', 'abbr' => 'PR' ));
         DB::Table('State')->insert(array('id' => 19, 'country_id' => 1, 'name' => 'Rio de Janeiro', 'abbr' => 'RJ' ));
         DB::Table('State')->insert(array('id' => 20, 'country_id' => 1, 'name' => 'Rio Grande do Norte', 'abbr' => 'RN' ));
         DB::Table('State')->insert(array('id' => 21, 'country_id' => 1, 'name' => 'Rondônia', 'abbr' => 'RO' ));
         DB::Table('State')->insert(array('id' => 22, 'country_id' => 1, 'name' => 'Roraima', 'abbr' => 'RR' ));
         DB::Table('State')->insert(array('id' => 23, 'country_id' => 1, 'name' => 'Rio Grande do Sul', 'abbr' => 'RS' ));
         DB::Table('State')->insert(array('id' => 24, 'country_id' => 1, 'name' => 'Santa Catarina', 'abbr' => 'SC' ));
         DB::Table('State')->insert(array('id' => 25, 'country_id' => 1, 'name' => 'Sergipe', 'abbr' => 'SE' ));
         DB::Table('State')->insert(array('id' => 26, 'country_id' => 1, 'name' => 'São Paulo', 'abbr' => 'SP' ));
         DB::Table('State')->insert(array('id' => 27, 'country_id' => 1, 'name' => 'Tocantins', 'abbr' => 'TO' ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('state');
    }
}
