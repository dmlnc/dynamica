<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceFieldsCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('service_fields_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('field_id')->unsigned();
            $table->foreign('field_id')->references('id')->on('service_fields')->onDelete('cascade');
            $table->integer('service_form_id')->unsigned();
            $table->foreign('service_form_id')->references('id')->on('service_forms')->onDelete('cascade');
            $table->string('value');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('service_fields_comments');
    }
}
