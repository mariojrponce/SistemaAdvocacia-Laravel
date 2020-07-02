<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //INSERT NA TABELA GENERO
        DB::table('generos')->insert([
            'descricao' => 'Masculino'
        ]);
        DB::table('generos')->insert([
            'descricao' => 'Feminino'
        ]);
        DB::table('generos')->insert([
            'descricao' => 'Outros'
        ]);

        //INSERT NA TABELA USUÁRIOS
        DB::table('users')->insert([
            'name' => 'Advogado 1',
            'email' => 'advogado@gmail.com',
            'password' => '$2y$10$bV055Qye4UehBcqnb.jyvObjE.O08ws0N0H.nOQOC0.Z2Eu8N6vYG']);
    }
}
