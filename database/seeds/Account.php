<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Account extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('account')->insert([
           'Code'=>'AX033457454',
           'Balance' =>'3000000',
           'idUser' =>'1',
       ]);

        DB::table('account')->insert([
            'Code'=>'DS033427154',
            'Balance' =>'3110000',
            'idUser' =>'2',
        ]);

        DB::table('account')->insert([
            'Code'=>'VS0334578589',
            'Balance' =>'5100000',
            'idUser' =>'2',
        ]);

        DB::table('account')->insert([
            'Code'=>'KK033454213',
            'Balance' =>'3300000',
            'idUser' =>'3',
        ]);

        DB::table('account')->insert([
            'Code'=>'LK033457752',
            'Balance' =>'1000000',
            'idUser' =>'3',
        ]);

        DB::table('account')->insert([
            'Code'=>'WP032347454',
            'Balance' =>'2100000',
            'idUser' =>'4',
        ]);
    }
}
