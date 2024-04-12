<?php namespace Pensoft\GetInvolved\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePensoftGetinvolvedRecipients extends Migration
{
    public function up()
    {
        Schema::create('pensoft_getinvolved_recipients', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->string('name');
            $table->text('emails')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('pensoft_getinvolved_recipients');
    }
}
