<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalAccesses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_accesses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('id_register')->nullable();
            $table->integer('id_patiente')->nullable();
            $table->integer('id_doctor')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_accesses');
    }
}
