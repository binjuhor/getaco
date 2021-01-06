<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnDeleteToTableAttribute extends Migration
{
    public function up()
    {
        Schema::table('customer_attribute', function($table) {
            $table->integer('delete')->default(0)->after('sort_order');
        });
    }
    
    public function down()
    {
        Schema::table('customer_attribute', function($table) {
            $table->dropColumn('delete');
        });
    }
}
