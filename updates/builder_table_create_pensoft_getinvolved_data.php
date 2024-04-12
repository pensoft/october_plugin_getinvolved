<?php namespace Pensoft\GetInvolved\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePensoftGetinvolvedData extends Migration
{
    public function up()
    {
        Schema::create('pensoft_getinvolved_data', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->text('name');
            $table->string('email');
            $table->string('affiliation')->nullable();
            $table->integer('country_id');
            $table->string('country')->nullable();
            $table->string('main_language')->nullable();
            $table->string('second_language')->nullable();
            $table->integer('interest_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('pensoft_getinvolved_data');
    }
}
