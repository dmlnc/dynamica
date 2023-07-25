<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceFieldsTable extends Migration
{
    public function up()
    {
        Schema::create('service_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->decimal('section', 8, 1);
            $table->enum('type', ['field', 'subfield']);
            $table->enum('input', ['select', 'text']);
            $table->json('values')->nullable();
            $table->integer('parent_id')->unsigned()->nullable();
            $table->tinyInteger('required');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('service_fields');
    }
}
