<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VwPesoaGenero extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE VIEW vw_pessoa_genero AS
        SELECT p.nome, p.data_nascimento, g.descricao FROM pessoas p
        INNER JOIN generos g ON p.idgenero = g.id;');
    }


    public function down()
    {
        DB::unprepared('DROP VIEW `vw_pessoa_genero`');
    }
}
