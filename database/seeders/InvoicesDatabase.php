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
                    'invoices_name'=>'James',
                    'invoices_total'=>'100000',
                    'invoices_date'=>'2023-01-01',
                ],
                [
                    'invoices_name'=>'James',
                    'invoices_total'=>'200000',
                    'invoices_date'=>'2023-01-02',
                ],
                [
                    'invoices_name'=>'James',
                    'invoices_total'=>'100000',
                    'invoices_date'=>'2023-02-03',
                ],
                [
                    'invoices_name'=>'James',
                    'invoices_total'=>'200000',
                    'invoices_date'=>'2023-03-04',
                ],
                [
                    'invoices_name'=>'James',
                    'invoices_total'=>'300000',
                    'invoices_date'=>'2023-04-05',
                ],
                [
                    'invoices_name'=>'James',
                    'invoices_total'=>'400000',
                    'invoices_date'=>'2023-05-06',
                ],
                [
                    'invoices_name'=>'James',
                    'invoices_total'=>'500000',
                    'invoices_date'=>'2023-06-07',
                ],
                [
                    'invoices_name'=>'James',
                    'invoices_total'=>'700000',
                    'invoices_date'=>'2023-07-08',
                ],
                [
                    'invoices_name'=>'James',
                    'invoices_total'=>'800000',
                    'invoices_date'=>'2023-08-09',
                ],
                [
                    'invoices_name'=>'James',
                    'invoices_total'=>'120000',
                    'invoices_date'=>'2023-09-10',
                ],
                [
                    'invoices_name'=>'James',
                    'invoices_total'=>'210000',
                    'invoices_date'=>'2023-10-11',
                ],
                [
                    'invoices_name'=>'James',
                    'invoices_total'=>'350000',
                    'invoices_date'=>'2023-11-12',
                ],
                [
                    'invoices_name'=>'James',
                    'invoices_total'=>'160000',
                    'invoices_date'=>'2023-12-13',
                ],
                [
                    'invoices_name'=>'James',
                    'invoices_total'=>'470000',
                    'invoices_date'=>'2023-01-14',
                ],
                [
                    'invoices_name'=>'James',
                    'invoices_total'=>'420000',
                    'invoices_date'=>'2023-02-15',
                ],
                [
                    'invoices_name'=>'James',
                    'invoices_total'=>'380000',
                    'invoices_date'=>'2023-03-16',
                ],
                [
                    'invoices_name'=>'James',
                    'invoices_total'=>'280000',
                    'invoices_date'=>'2023-04-17',
                ],
                [
                    'invoices_name'=>'James',
                    'invoices_total'=>'220000',
                    'invoices_date'=>'2023-05-18',
                ],
                [
                    'invoices_name'=>'James',
                    'invoices_total'=>'150000',
                    'invoices_date'=>'2023-06-19',
                ],
                [
                    'invoices_name'=>'James',
                    'invoices_total'=>'110000',
                    'invoices_date'=>'2023-07-20',
                ],
                [
                    'invoices_name'=>'James',
                    'invoices_total'=>'160000',
                    'invoices_date'=>'2023-07-21',
                ],
                [
                    'invoices_name'=>'James',
                    'invoices_total'=>'360000',
                    'invoices_date'=>'2023-08-22',
                ],

            ]);
    }
}
