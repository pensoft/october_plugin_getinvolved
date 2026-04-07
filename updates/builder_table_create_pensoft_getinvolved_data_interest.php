<?php namespace Pensoft\GetInvolved\Updates;

use Schema;
use Illuminate\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePensoftGetinvolvedDataInterest extends Migration
{
    public function up(): void
    {
        Schema::create('pensoft_getinvolved_data_interest', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->integer('interest_id');
            $table->integer('data_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pensoft_getinvolved_data_interest');
    }
}