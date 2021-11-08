<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SideerForClients extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();

        foreach (range(1, 5) as $index) {
            DB::table('clients')->insert([

                'idfirm' => $index,
                'idregitred' => $index+2


            ]);
        }
    }
}
