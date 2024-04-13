<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPatient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_patient', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('nome')->nullable();
            $table->string('cpf')->nullable();
            $table->string('rg')->nullable();
            $table->string('contactRelationship')->nullable();
            $table->string('contactName')->nullable();
            $table->string('contactStreet')->nullable();
            $table->string('contactNumber')->nullable();
            $table->string('contactCity')->nullable();
            $table->string('addressNumber')->nullable();
            $table->string('addressCEP')->nullable();
            $table->string('addressCity')->nullable();
            $table->string('addressState')->nullable();
            $table->string('addressContry')->nullable();
            $table->integer('maritalStatus')->nullable();
            $table->integer('gender')->nullable();
            $table->date('birthDate')->nullable();
            $table->string('language')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_patient');
    }
}
