<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestDemosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_demos', function (Blueprint $table) {
            $table->increments('id_reDemo');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('business_email');
            $table->string('phone_number');
            $table->string('company');
            $table->integer('company_size');
            $table->string('notes');
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
        Schema::dropIfExists('request_demos');
    }
}
