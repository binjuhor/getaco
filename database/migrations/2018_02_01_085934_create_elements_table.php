<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elements', function (Blueprint $table) {
            $table->increments('id_element');
            $table->integer('id_form');
            $table->string('element_type');
            $table->string('element_label');
            $table->string('element_value');
            $table->integer('element_status');
            $table->integer('sort_order');
            $table->boolean('element_required')->nullable();
            $table->tinyInteger('element_validate')->nullable();
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
        Schema::dropIfExists('elements');
    }
}
