<?php namespace Pensoft\GetInvolved\Updates;

use Schema;
use Illuminate\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreateDataTable Migration
 */
class CreateDataTable extends Migration
{
    public function up(): void
    {
        Schema::create('pensoft_getinvolved_data', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pensoft_getinvolved_data');
    }
}