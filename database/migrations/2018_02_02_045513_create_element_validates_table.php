<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElementValidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('element_validates', function (Blueprint $table) {
            $table->increments('id_validate');
            $table->integer('id_element');
            $table->integer('validate_min')->nullable();
            $table->integer('validate_max')->nullable();
            $table->integer('validate_integer')->nullable();
            $table->integer('validate_numeric')->nullable();
            $table->integer('validate_alpha')->nullable();
            $table->integer('validate_alpha_dash')->nullable();
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
        Schema::dropIfExists('element_validates');
    }
}
