<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->increments('id_coupon');
            $table->string('title_coupon');
            $table->integer('type_coupon');
            $table->integer('value_coupon');
            $table->string('code_coupon');
            $table->date('expiry_date');
            $table->string('note');
            $table->integer('coupon_status');
            $table->integer('limited');
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
        Schema::dropIfExists('coupons');
    }
}
