<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ColorTagController extends Controller
{


public function updatecolortag(){
   DB::table('color_tags')->where('id_tag',0)->delete();
        DB::table('color_tags')->insert([
                'id_tag' => 0,
                'id_color' => 1,
                'color_name' => 'Default',
                'color_content' => 'label tag_label_default',
            ]
        );
        DB::table('color_tags')->insert([
                'id_tag' => 0,
                'id_color' => 2,
                'color_name' => 'Checked',
                'color_content' => 'label tag_label_checked',
            ]
        );
        DB::table('color_tags')->insert([
                'id_tag' => 0,
                'id_color' => 3,
                'color_name' => 'Primary',
                'color_content' => 'label tag_label_primary',
            ]
        );
        DB::table('color_tags')->insert([
                'id_tag' => 0,
                'id_color' => 4,
                'color_name' => 'Success',
                'color_content' => 'label tag_label_success',
            ]
        );
        DB::table('color_tags')->insert([
                'id_tag' => 0,
                'id_color' => 5,
                'color_name' => 'Info',
                'color_content' => 'label tag_label_info',
            ]
        );
        DB::table('color_tags')->insert([
                'id_tag' => 0,
                'id_color' => 6,
                'color_name' => 'Warning',
                'color_content' => 'label tag_label_warning',
            ]
        );

        echo "OK";
      }           

}
