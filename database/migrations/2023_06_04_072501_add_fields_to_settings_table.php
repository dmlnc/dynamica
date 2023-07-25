<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToSettingsTable extends Migration
{
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->foreignId('company_id')->nullable()->constrained();
            $table->string('asp_link')->nullable()->default(null);
            $table->string('export_link')->nullable()->default(null);
            $table->string('telegram_id')->nullable()->default(null);
            $table->integer('min_price')->default(0);
            $table->integer('max_price')->default(1);
        });
    }

    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropColumn(['company_id', 'asp_link', 'min_price', 'max_price', 'export_link', 'telegram_id']);
        });
    }
}
