<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',32);
            $table->string('email',32)->unique();
            $table->string('phone',32)->unique()->nullable();
            $table->string('password',64);
            $table->integer('user_status');
            $table->integer('id_parent')->default(0);
            $table->integer('id_group')->nullable();
            $table->integer('id_company')->nullable();
            $table->integer('id_role')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
