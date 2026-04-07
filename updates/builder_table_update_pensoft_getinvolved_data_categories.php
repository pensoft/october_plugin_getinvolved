<?php namespace Pensoft\GetInvolved\Updates;

use Schema;
use Illuminate\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftGetinvolvedDataCategories extends Migration
{
    public function up(): void
    {
        Schema::table('pensoft_getinvolved_data_categories', function(Blueprint $table)
        {
            $table->renameColumn('categories_id', 'category_id');
        });
    }

    public function down(): void
    {
        Schema::table('pensoft_getinvolved_data_categories', function(Blueprint $table)
        {
            $table->renameColumn('category_id', 'categories_id');
        });
    }
}