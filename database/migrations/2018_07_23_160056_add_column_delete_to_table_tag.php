<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnDeleteToTableTag extends Migration
{
    public function up()
    {
        Schema::table('tags', function($table) {
            $table->integer('delete')->default(0)->after('tag_name');
        });
    }
    
    public function down()
    {
        Schema::table('tags', function($table) {
            $table->dropColumn('tag_name');
        });
    }
}
