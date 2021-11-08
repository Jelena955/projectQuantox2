<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class SideerForFirms extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();
        foreach (range(1,75) as $index){
            DB::table('firms')->insert([
                'pib'=>rand(100000010,999999999),
            'name'=>$faker->company,
            'idnumber'=>rand(111111,999999),
           'adress'=>$faker->address,
      'accountnumber' =>$faker->creditCardNumber,
                'mail'=>$faker->companyEmail



            ]);

        }
    }
}
