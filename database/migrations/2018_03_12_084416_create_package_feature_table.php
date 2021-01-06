<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackageFeatureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_feature', function (Blueprint $table) {
            $table->increments('id_feature');
            $table->integer('id_package');
            $table->string('name');
            $table->string('images')->nullable();
            $table->string('status')->default('yes');
            $table->string('sort_order');
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
        Schema::dropIfExists('package_feature');
    }
}
