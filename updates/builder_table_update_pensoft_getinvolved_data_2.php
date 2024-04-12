<?php namespace Pensoft\GetInvolved\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftGetinvolvedData2 extends Migration
{
    public function up()
    {
        Schema::table('pensoft_getinvolved_data', function($table)
        {
            $table->integer('interest_id')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_getinvolved_data', function($table)
        {
            $table->integer('interest_id')->nullable(false)->change();
        });
    }
}
