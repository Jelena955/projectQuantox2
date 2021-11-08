<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SideerForOneArticle extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('one_article_invoices')->insert([

            'name' => 'Glass for vine',
            'description'=>'Something',
            'price'=>'20',
            'quantity'=>'2',
            'discount'=>0,
            'itemTax'=>0,
            'idinvoice'=>'1',

        ]);
        DB::table('one_article_invoices')->insert([

            'name' => 'Bottle for vine',
            'description'=>'Something',
            'price'=>'30',
            'quantity'=>'1',
            'discount'=>0,
            'itemTax'=>0,
            'idinvoice'=>'1',

        ]);
        DB::table('one_article_invoices')->insert([

            'name' => 'Table',
            'description'=>'Something',
            'price'=>'200',
            'quantity'=>'1',
            'discount'=>5,
            'itemTax'=>0,
            'idinvoice'=>'2',

        ]);

        DB::table('one_article_invoices')->insert([

            'name' => 'Dell Laptop',
            'description'=>'Something',
            'price'=>'600',
            'quantity'=>'1',
            'discount'=>0,
            'itemTax'=>2,
            'idinvoice'=>'3',

        ]);
    }
}
