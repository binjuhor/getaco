<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->increments('id_form');
            $table->integer('id_company')->nullable();
            $table->integer('id_template')->nullable();
            $table->string('form_name')->nullable();
            $table->longText('source')->nullable();
            $table->longText('form_backend')->nullable();
            $table->integer('form_status')->nullable();
            $table->string('display')->nullable();
            $table->string('name_file')->nullable();
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
        Schema::dropIfExists('forms');
    }
}
