<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumForToTableAttribute extends Migration
{
    public function up()
    {
        Schema::table('customer_attribute', function($table) {
            $table->integer('for')->default(1)->after('status');
        });
    }
    public function down()
    {
        Schema::table('customer_attribute', function($table) {
            $table->dropColumn('for');
        });
    }
}
