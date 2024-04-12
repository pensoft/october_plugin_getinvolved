<?php namespace Pensoft\GetInvolved\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftGetinvolvedData extends Migration
{
    public function up()
    {
        Schema::table('pensoft_getinvolved_data', function($table)
        {
            $table->text('interest')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_getinvolved_data', function($table)
        {
            $table->dropColumn('interest');
        });
    }
}
