<?php namespace Pensoft\GetInvolved\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftGetinvolvedInterest extends Migration
{
    public function up()
    {
        Schema::table('pensoft_getinvolved_interest', function($table)
        {
            $table->smallInteger('sort_order')->default(1);
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_getinvolved_interest', function($table)
        {
            $table->dropColumn('sort_order');
        });
    }
}
