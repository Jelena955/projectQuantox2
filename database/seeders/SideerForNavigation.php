<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SideerForNavigation extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();

        DB::table('navigation')->insert([
                'namenav'=>'Profile',
                'link'=>'profile'
            ]);
        DB::table('navigation')->insert([
            'namenav'=>'Clients',
            'link'=>'clients'
        ]);
        DB::table('navigation')->insert([
            'namenav'=>'Invoices',
            'link'=>'invoices'
        ]);
    }
}
