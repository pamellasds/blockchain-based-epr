<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVitalSign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vital_sign', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('observation_id')->references('id')->on('observation');
            $table->integer('value')->nullable();
            $table->string('period_start')->nullable();
            $table->string('body_site')->nullable();
            $table->string('method')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vital_sign');
    }
}
