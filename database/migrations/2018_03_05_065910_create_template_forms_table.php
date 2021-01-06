<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemplateFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('template_forms', function (Blueprint $table) {
            $table->increments('id_template');
            $table->string('name_template');
            $table->string('image')->nullable();
            $table->longText('source')->nullable();
            $table->longText('form_backend')->nullable();
            $table->integer('id_user');
            $table->integer('status_public');
            $table->string('file_html')->nullable();
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
        Schema::dropIfExists('template_forms');
    }
}
