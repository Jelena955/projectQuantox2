<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SideerForInvoices extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


            DB::table('invoices')->insert([

                'idregitred' => 1,
                'idclient'=>2,
                'dateOfIssue'=>'2021-11-15',
                'DueDate'=>'2021-12-15',
                'idstatus'=>'2',
                'paid'=>0,
                'invTax'=>'5',
                'notes'=>'Something'
            ]);

        DB::table('invoices')->insert([

            'idregitred' => 4,
            'idclient'=>1,
            'dateOfIssue'=>'2021-11-10',
            'DueDate'=>'2021-12-10',
            'idstatus'=>'2',
            'paid'=>0,
            'invTax'=>'10',
            'notes'=>'Something'
        ]);

        DB::table('invoices')->insert([

            'idregitred' => 3,
            'idclient'=>3,
            'dateOfIssue'=>'2021-11-15',
            'DueDate'=>'2021-12-1',
            'idstatus'=>'2',
            'invTax'=>'5',
            'paid'=>500,
            'notes'=>'Something'
        ]);
        }

}
