<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscricaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscricaos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('usuarioId');
            $table->integer('editalId');
            $table->string('tipo');
            $table->string('declaracaoDeVinculo')->nullable();
            $table->string('historicoEscolar')->nullable();
            $table->string('programaDasDisciplinas')->nullable();
    				$table->string('curriculo')->nullable();
            $table->string('enem')->nullable();
    				$table->string('diploma')->nullable();
            $table->string('comprovante');
    				$table->string('curso');
    				$table->string('polo')->nullable();
    				$table->string('turno');
    				$table->string('cursoDeOrigem');
    				$table->string('instituicaoDeOrigem');
    				$table->string('naturezaDaIes');
            $table->string('endereco');
            $table->string('num');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('uf');
            $table->string('homologado')->nullable();
            $table->text('motivoRejeicao')->nullable();
            $table->string('homologadoDrca')->nullable();
            $table->float('coeficienteDeRendimento')->nullable();
            $table->integer('totalDisciplinas')->nullable();
            $table->float('nota')->nullable();
            $table->integer('classificacao')->nullable();
            $table->string('situacao')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inscricaos');
    }
}
