<?php namespace Pensoft\GetInvolved\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreateDataTable Migration
 */
class CreateDataTable extends Migration
{
    public function up()
    {
        Schema::create('pensoft_getinvolved_data', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pensoft_getinvolved_data');
    }
}
