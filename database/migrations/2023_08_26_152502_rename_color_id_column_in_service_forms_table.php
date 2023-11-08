<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColorIdColumnInServiceFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_forms', function (Blueprint $table) {
            // Drop foreign key constraint
            $table->dropForeign(['color_id']);
    
            // Laravel documentation recommends doing the column renaming separately
        });
    
        Schema::table('service_forms', function (Blueprint $table) {
            // Rename column - make sure you have doctrine/dbal installed and up to date
            $table->renameColumn('color_id', 'color');
    
            // Add new columns
            $table->string('run');
            $table->text('recommendation')->nullable();
            // You mentioned has_lkp -> bool, but there's no code for it. 
            // Assuming you want to add a boolean column:
            $table->boolean('has_lkp')->default(false);
        });
    
        Schema::table('service_forms', function (Blueprint $table) {
            // Change data type of 'color' column to string if needed
            // This is done after renaming to avoid conflict
            $table->string('color')->change();
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('service_forms', function (Blueprint $table) {
            $table->renameColumn('color', 'color_id');
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');
            $table->dropColumn('run');
            $table->dropColumn('recommendation'); 
        });
        Schema::table('service_forms', function (Blueprint $table) {
            $table->integer('color_id')->change()->unsigned();
        });
    }
}
