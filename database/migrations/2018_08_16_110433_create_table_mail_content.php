<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMailContent extends Migration
{
   public function up()
    {
        Schema::create('mail_content', function (Blueprint $table) {
            $table->increments('id_content');
            $table->integer('id_company');
            $table->string('mail_address')->nullable();
            $table->string('mail_pass')->nullable();
            $table->string('mail_config')->nullable();
            $table->string('mail_name');
            $table->string('mail_subject');
            $table->string('mail_content');
            $table->string('mail_type');
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
        Schema::dropIfExists('mail_content');
    }
}
