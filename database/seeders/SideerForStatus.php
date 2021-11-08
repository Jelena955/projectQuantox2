<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SideerForStatus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            'valueOfStatus'=>'Paid',

        ]);
        DB::table('statuses')->insert([
            'valueOfStatus'=>'Unpaid',

        ]);
        DB::table('statuses')->insert([
            'valueOfStatus'=>'In progress',

        ]);
    }
}
