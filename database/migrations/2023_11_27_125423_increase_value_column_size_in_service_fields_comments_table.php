<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IncreaseValueColumnSizeInServiceFieldsCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_fields_comments', function (Blueprint $table) {
            // Увеличиваем размер колонки value, например, до 500 символов
            $table->string('value', 500)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('service_fields_comments', function (Blueprint $table) {
            // Возвращаем размер колонки value к первоначальному (по умолчанию 255 символов)
            $table->string('value', 255)->change();
        });
    }
}

