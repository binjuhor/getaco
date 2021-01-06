<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id_company');
            $table->string('company_name')->nullable();
            $table->longText('company_description')->nullable();
            $table->string('company_address')->nullable();
            $table->string('company_phone')->nullable();
            $table->string('company_email')->nullable();
            $table->string('website')->nullable();
            $table->string('business_type')->nullable();
            $table->time('timezone')->nullable();
            $table->string('curency')->nullable();
            $table->integer('company_status');
            $table->integer('sort_order');
            $table->time('open_hour')->nullable();
            $table->time('closer_hour')->nullable();
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
        Schema::dropIfExists('companies');
    }
}
