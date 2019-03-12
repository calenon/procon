<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Currencies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //Define a Database schema for the application.
    public function up()
    {
      Schema::create('currencies', function (Blueprint $table) {
          $table->increments('id');
          $table->string('currencyFrom');
          $table->string('currencyTo');
          $table->decimal('ratio',8, 4);
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('currencies');
    }
}
