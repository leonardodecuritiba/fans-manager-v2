<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fans', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id'); //Será inserido assim que os dados de usuário forem cadastrados
            $table->unsignedInteger('club_id'); //Será inserido de acordo com o id do clube proveniente do formulário
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('club_id')->references('id')->on('clubs')->onDelete('cascade');

            $table->string('name',200); //Obrigatório
            $table->string('cpf',20); //Obrigatório/Único
            $table->boolean('sex'); //0: Feminino; 1: Masculino
            $table->date('birthday'); //YYYY-MM-DD ou DD-MM-YYYY ou DD/MM/YYYY vamos combinar
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fans');
    }
}
