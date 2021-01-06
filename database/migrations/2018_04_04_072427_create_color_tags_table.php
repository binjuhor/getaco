<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColorTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('color_tags', function (Blueprint $table) {
            $table->increments('id_color');
            $table->string('color_name');
            $table->string('color_content');
            $table->integer('id_tag');
            $table->timestamps();
        });
        DB::table('color_tags')->insert([
                'id_tag' => 0,
                'color_name' => 'Default',
                'color_content' => 'label tag_label_default',
            ]
        );
        DB::table('color_tags')->insert([
                'id_tag' => 0,
                'color_name' => 'Checked',
                'color_content' => 'label tag_label_checked',
            ]
        );
        DB::table('color_tags')->insert([
                'id_tag' => 0,
                'color_name' => 'Primary',
                'color_content' => 'label tag_label_primary',
            ]
        );
        DB::table('color_tags')->insert([
                'id_tag' => 0,
                'color_name' => 'Success',
                'color_content' => 'label tag_label_success',
            ]
        );
        DB::table('color_tags')->insert([
                'id_tag' => 0,
                'color_name' => 'Info',
                'color_content' => 'label tag_label_info',
            ]
        );
        DB::table('color_tags')->insert([
                'id_tag' => 0,
                'color_name' => 'Warning',
                'color_content' => 'label tag_label_warning',
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('color_tags');
    }
}
