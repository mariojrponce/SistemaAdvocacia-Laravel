<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LogTrigger extends Migration
{
    public function up()
    {
        DB::unprepared('CREATE TRIGGER log_trigger
        AFTER INSERT ON pessoas
        FOR EACH ROW
        EXECUTE PROCEDURE pessoa_registro();');
    }
    public function down()
    {
        DB::unprepared('DROP TRIGGER `log_trigger`');
    }
}
