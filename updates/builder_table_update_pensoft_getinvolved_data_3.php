<?php namespace Pensoft\GetInvolved\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftGetinvolvedData3 extends Migration
{
    public function up()
    {
        Schema::table('pensoft_getinvolved_data', function($table)
        {
            $table->smallInteger('project_events')->nullable()->default(0);
            $table->smallInteger('external_events')->nullable()->default(0);
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_getinvolved_data', function($table)
        {
            $table->dropColumn('project_events');
            $table->dropColumn('external_events');
        });
    }
}
