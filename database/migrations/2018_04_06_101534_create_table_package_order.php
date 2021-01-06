<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePackageOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_order', function (Blueprint $table) {
            $table->increments('id_order');
            $table->string('name_order');
            $table->string('phone_order');
            $table->string('email_order');
            $table->string('pay_order');
            $table->integer('id_package');
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
        Schema::dropIfExists('package_order');
    }
}
