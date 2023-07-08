<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\Models\Books;
use App\Models\Invoice;



use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminInvoicesController extends Controller
{
    function create()
    {
        $user = Auth::user();
        if ($user->isAdmin == 1) {
            return view('admin/invoice/invoices_create');
        } else {
            return view('admin/invoice');
        }
    }

    function index()
    {
        $invoices = DB::table('invoices')
            ->orderByDesc('invoices.invoices_id')
            ->get();
        return view('admin/invoice/all-invoice', ['invoices' => $invoices]);
    }


    public function store(Request $request)
    {


        $invoices_date = $request->get('invoices_date');
        $invoices_name = $request->get('invoices_name');
        $books_id = $request->input('books_id');
        $invoices_detail_quantity = $request->get('invoices_detail_quantity');
        $invoices_detail_price = $request->get('invoices_detail_price');
        $count = count($books_id);
        $total = 0;
        for ($i = 0; $i < $count; $i++) {
            $total = $total + ($invoices_detail_price[$i] * $invoices_detail_quantity[$i]);
        }
        DB::table('Invoices')->insert(
            ['invoices_name' => $invoices_name, 'invoices_total' => $total, 'invoices_date' => $invoices_date]
        );
        $Invoices = DB::table('Invoices')
            ->select('Invoices.*')
            ->where('Invoices.invoices_total', $total)
            ->where('Invoices.invoices_name', $invoices_name)
            ->where('Invoices.invoices_date', $invoices_date)
            ->get();
        foreach ($Invoices as $Invoice) {
            for ($i = 0; $i < $count; $i++) {
                DB::table('Invoices_Detail')->insert(
                    [
                        'invoices_id' => $Invoice->invoices_id, 'books_id' => $books_id[$i], 'invoices_detail_quantity' => $invoices_detail_quantity[$i],
                        'invoices_detail_price' => $invoices_detail_price[$i],
                    ]
                );
            }
        }
        return redirect('admin/invoice');
    }


    public function edit($invoices_id)
    {
        $user = Auth::user();
        if ($user->isAdmin == 1) {
            $invoice = Invoice::findOrFail($invoices_id);
            $invoice = DB::table('Invoices')
                ->where('Invoices.invoices_id', $invoice->invoices_id)
                ->get();

            $invoiceDetails = DB::table('Invoices_Detail')
                ->select('Invoices_Detail.*')
                ->get();
//            dd($invoiceDetails);
            return view('admin/invoice/invoices_edit', ['invoices' => $invoice], ['invoiceDetails' => $invoiceDetails]);
        } else {
            return view('common/error');
        }
    }

    function update(Request $request, $invoices_id)
    {

        $invoices_date = $request->get('invoices_date');
        $invoices_name = $request->get('invoices_name');
        $books_id = $request->input('books_id');
        $invoices_detail_quantity = $request->get('invoices_detail_quantity');
        $invoices_detail_price = $request->get('invoices_detail_price');
        $count = count($books_id);
        $total = 0;
        for ($i = 0; $i < $count; $i++) {
            $total = $total + ($invoices_detail_price[$i] * $invoices_detail_quantity[$i]);
        }
        DB::table('Invoices')->where('invoices_id',$invoices_id)
            ->update(['invoices_date' => $invoices_date, 'invoices_total' => $total, 'invoices_name' => $invoices_name]);
        $invoiceDetails = DB::table('InvoiceDetails')
            ->select('InvoiceDetails.*')
            ->where('InvoiceDetails.invoices_id')
            ->get();
        $i = 0;
        foreach ($invoiceDetails as $invoiceDetail) {
            DB::table('Invoices_Detail')->where('id', $invoiceDetail->invoices_detail_id)
                ->update([
                    'books_id' => $books_id[$i], 'invoices_detail_quantity' => $invoices_detail_quantity[$i],
                    'invoices_detail_price' => $invoices_detail_price[$i]
                ]);
            $i++;
        }
        if ($count > $i) {

                for ($t = $i; $t < $count; $t++) {
                    DB::table('Invoices_Detail')->insert(
                        [
                            'invoices_id' => $invoices_id, 'books_id' => $books_id[$t], 'invoices_detail_quantity' => $invoices_detail_quantity[$t],
                            'invoices_detail_price' => $invoices_detail_price[$t]
                        ]
                    );
                }
            }
        return redirect('admin/invoice/invoices_edit');
        }




    function show($invoices_id)
    {
        $invoice = Invoice::findOrFail($invoices_id);
        $invoiceDetails = DB::table('invoices_detail')
            ->join('Books', 'invoices_detail.books_id', '=', 'Books.books_id')
            ->select('invoices_detail.*', 'Books.books_name', 'Books.books_ISBN')
            ->where('invoices_detail.invoices_id', $invoices_id)->orderByDesc('invoices_detail.invoices_detail_id')
            ->get();

        return view('admin/invoice/invoices_detail', ['invoiceDetails' => $invoiceDetails], ['invoice' => $invoice]);
    }
    }

