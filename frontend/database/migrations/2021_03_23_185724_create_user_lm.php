<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserLm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_lm', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('nome_js')->nullable();
            $table->string('nr_cnpj')->nullable();
            $table->string('addressCEP')->nullable();
            $table->string('addressStreet')->nullable();
            $table->string('addressNumber')->nullable();
            $table->string('addressCity')->nullable();
            $table->string('addressState')->nullable();
            $table->string('addressContry')->nullable();
            $table->string('nr_inscricao_conselho')->nullable();
            $table->string('nome_responsavel')->nullable();
            $table->string('nr_cpf_responsavel')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_lm');
    }
}
