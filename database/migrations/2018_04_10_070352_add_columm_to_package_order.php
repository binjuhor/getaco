<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColummToPackageOrder extends Migration
{
    
    public function up()
    {
        Schema::table('package_order', function (Blueprint $table) {
            $table->integer('id_variable');
            $table->float('total_pay');
        });
    }

    public function down()
    {
        Schema::table('package_order', function (Blueprint $table) {
            $table->dropColumn('id_variable');
            $table->dropColumn('total_pay');
        });
    }
}
