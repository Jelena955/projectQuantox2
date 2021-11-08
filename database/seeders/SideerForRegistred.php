<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SideerForRegistred extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('registreds')->insert([

                'idfirm' => $index,
                'password'=>$faker->password,
                'active'=>rand(0,1)


            ]);
        }
    }
}
