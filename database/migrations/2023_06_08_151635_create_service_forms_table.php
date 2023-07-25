<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_forms', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('status', ['draft', 'not finished', 'diagnostic', 'published']);
            $table->integer('brand_id')->unsigned();
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->integer('model_id')->unsigned();
            $table->foreign('model_id')->references('id')->on('car_models')->onDelete('cascade');
            $table->integer('color_id')->unsigned();
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');
            $table->string('vin');
            $table->text('comment')->nullable();
            $table->bigInteger('diagnost_id')->nullable()->unsigned();
            $table->foreign('diagnost_id')->references('id')->on('users')->onDelete('cascade');
            // $table->bigInteger('seller_id')->nullable()->unsigned();
            // $table->foreign('seller_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('company_id')->nullable()->unsigned();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_forms');
    }
};
