<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnOptionAndTypeToSegmentTable extends Migration
{
    public function up()
    {
        Schema::table('segments', function($table) {
            $table->string('option')->nullable()->after('segment_name');
            $table->string('type')->default('segment')->after('segment_name');
        });
    }
    
    public function down()
    {
        Schema::table('segments', function($table) {
            $table->dropColumn('option');
            $table->dropColumn('type');
        });
    }
}
