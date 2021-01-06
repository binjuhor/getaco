<?php
use App\Permission_group;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePermisisonGroup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_group', function (Blueprint $table) {
            $table->increments('id_group');
            $table->string('name_group');
            $table->timestamps();
        });
        DB::table('permission_group')->insert(array(
           ['name_group'=>'Customer'],
           ['name_group'=>'Form'],
           ['name_group'=>'Report'],
           ['name_group'=>'User'],
           ['name_group'=>'Setting']
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permission_group');
    }
}
