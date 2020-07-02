<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProcedureGetPessoa extends Migration
{

    public function up()
    {
        DB::unprepared('CREATE OR REPLACE FUNCTION getPessoa(varchar) RETURNS pessoas AS $$
        SELECT * FROM pessoas WHERE nome = $1;
        $$ LANGUAGE SQL;');
    }

    public function down()
    {
        DB::unprepared('DROP PROCEDURE `getPessoa`');
    }
}
