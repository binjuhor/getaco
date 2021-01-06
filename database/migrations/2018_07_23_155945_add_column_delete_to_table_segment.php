<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnDeleteToTableSegment extends Migration
{
    public function up()
    {
        Schema::table('segments', function($table) {
            $table->integer('delete')->default(0)->after('segment_name');
        });
    }
    
    public function down()
    {
        Schema::table('segments', function($table) {
            $table->dropColumn('delete');
        });
    }
}
