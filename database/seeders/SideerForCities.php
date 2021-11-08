<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\State;

class SideerForCities extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();

        foreach (range(1,20) as $index) {
            DB::table('cities')->insert([

                'cityname' => $faker->city


            ]);


        }
            }







}
