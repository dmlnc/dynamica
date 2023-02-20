<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('utm_source')->nullable()->default(null);
            $table->string('utm_medium')->nullable()->default(null);
            $table->string('utm_term')->nullable()->default(null);
            $table->string('utm_content')->nullable()->default(null);
            $table->string('utm_campaign')->nullable()->default(null);
            $table->timestamps();
        });
    }
}
