<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProcedurePessoa extends Migration
{
    public function up()
    {
        DB::unprepared('CREATE OR REPLACE FUNCTION pessoa_registro()
        RETURNS trigger AS $registro_trigger$
        BEGIN
        INSERT INTO pessoa_auditoria
        (utilizador, data_criacao)
        VALUES
        (current_user, current_timestamp);
        RETURN NEW;
        END;
        $registro_trigger$ language plpgsql;');
    }
    public function down()
    {
        DB::unprepared('DROP TRIGGER `pessoa_registro`');
    }
}
