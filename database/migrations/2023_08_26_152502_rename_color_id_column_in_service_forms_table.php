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
            $table->dropForeign(['color_id']); // Удаление внешнего ключа
            $table->renameColumn('color_id', 'color'); // Переименование столбца
            $table->string('color')->change(); // Изменение типа данных на строку
            $table->string('run'); // Добавление нового столбца 'run'
            $table->text('recommendation')->nullable();
            // has_lkp -> bool

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
            $table->integer('color_id')->change()->unsigned();
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');
            $table->dropColumn('run');
            $table->dropColumn('recommendation'); 
        });
    }
}
