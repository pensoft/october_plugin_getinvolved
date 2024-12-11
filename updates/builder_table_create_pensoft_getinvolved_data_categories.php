<?php namespace Pensoft\GetInvolved\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePensoftGetinvolvedDataCategories extends Migration
{
    public function up()
    {
        Schema::create('pensoft_getinvolved_data_categories', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->integer('categories_id');
            $table->integer('data_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('pensoft_getinvolved_data_categories');
    }
}
