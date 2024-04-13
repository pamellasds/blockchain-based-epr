<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObservation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('observation', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('register_id')->references('id')->on('register');
            $table->integer('status')->nullable();
            $table->string('id_patient')->nullable();
            $table->date('period_start')->nullable();
            $table->date('period_end')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('observation');
    }
}