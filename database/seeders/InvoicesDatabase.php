<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvoicesDatabase extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('Invoices')->insert(
            [
                [
                    'invoices_name'=>'day 1',
                    'invoices_description'=>'from Oxford',
                    'user_id'=>'1'
                ],
                [
                    'invoices_name'=>'day 1',
                    'invoices_description'=>'from MacMillian',
                    'user_id'=>'1'
                ],
                [
                    'invoices_name'=>'day 1',
                    'invoices_description'=>'from Jameson',
                    'user_id'=>'1'
                ],
            ]);
    }
}
