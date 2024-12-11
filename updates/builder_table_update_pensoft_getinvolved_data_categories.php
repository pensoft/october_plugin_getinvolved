<?php namespace Pensoft\GetInvolved\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftGetinvolvedDataCategories extends Migration
{
    public function up()
    {
        Schema::table('pensoft_getinvolved_data_categories', function($table)
        {
            $table->renameColumn('categories_id', 'category_id');
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_getinvolved_data_categories', function($table)
        {
            $table->renameColumn('category_id', 'categories_id');
        });
    }
}
