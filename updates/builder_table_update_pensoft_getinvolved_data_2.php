<?php namespace Pensoft\GetInvolved\Updates;

use Schema;
use Illuminate\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftGetinvolvedData2 extends Migration
{
    public function up(): void
    {
        Schema::table('pensoft_getinvolved_data', function(Blueprint $table)
        {
            $table->integer('interest_id')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('pensoft_getinvolved_data', function(Blueprint $table)
        {
            $table->integer('interest_id')->nullable(false)->change();
        });
    }
}