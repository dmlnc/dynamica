<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLkpDataAndDamagesListToServiceFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_forms', function (Blueprint $table) {
            $table->json('lkp_data')->nullable()->default(null);
            $table->json('damages_list')->nullable()->default(null);
            // $table->text('recommendation')->nullable()->default(null);  // Добавлено новое поле
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
            $table->dropColumn('lkp_data');
            $table->dropColumn('damages_list');
            // $table->dropColumn('recommendation');  // Удаление нового поля
        });
    }
}
