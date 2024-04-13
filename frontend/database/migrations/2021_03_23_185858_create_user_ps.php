<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_ps', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('nome')->nullable();
            $table->string('cpf')->nullable();
            $table->string('rg')->nullable();
            $table->string('addressCEP')->nullable();
            $table->string('addressStreet')->nullable();
            $table->string('addressNumber')->nullable();
            $table->string('addressCity')->nullable();
            $table->string('addressState')->nullable();
            $table->string('addressContry')->nullable();
            $table->integer('gender')->nullable();
            $table->date('birthDate')->nullable();
            $table->string('qualificationIdentifier')->nullable();
            $table->string('qualificationName')->nullable();
            $table->string('speciality')->nullable();
            $table->date('qualificationDate')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_ps');
    }
}
