<?php namespace Pensoft\GetInvolved\Updates;

use Schema;
use Illuminate\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftGetinvolvedData3 extends Migration
{
    public function up(): void
    {
        Schema::table('pensoft_getinvolved_data', function(Blueprint $table)
        {
            $table->smallInteger('project_events')->nullable()->default(0);
            $table->smallInteger('external_events')->nullable()->default(0);
        });
    }

    public function down(): void
    {
        Schema::table('pensoft_getinvolved_data', function(Blueprint $table)
        {
            $table->dropColumn('project_events');
            $table->dropColumn('external_events');
        });
    }
}