<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;





use App\Models\Author;
use App\Models\Books;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\City;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Invoice;
use App\Models\InvoiceDetails;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AdminInvoicesController extends Controller
{
    //
    public function create()
    {
        
        $books = Books::get();
        $invoices = Invoice::get();
        return view('admin.invoice.invoices_create', ['books' => $books,'invoices'=>$invoices]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     function index()
    {
        $invoices = DB::table('invoices')
            ->join('Users', 'invoices.user_id', '=', 'Users.id')
            ->select('invoices.*', 'Users.name')->orderByDesc('invoices.invoices_id')
            ->orderByDesc('invoices.invoices_id')
            ->get();
        return view('admin/invoice/all-invoice', ['invoices' => $invoices]);
    }



     public function store(Request $request)
     {
        
         $user_id = $request->get('user_id');
         $invoices_date = $request->get('invoices_date');
         $invoices_name = $request->get('invoices_name');
         $invoices_description = $request->get('invoices_description');
         $books_id = $request->input('books_id');
         $invoices_detail_quantity = $request->get('invoices_detail_quantity');
         $invoices_detail_price = $request->get('invoices_detail_price');
         $count = count($books_id);
         $total = 0;
         for ($i = 0; $i < $count; $i++) {
             $total = $total + ($invoices_detail_price[$i] * $invoices_detail_quantity[$i]);
         }
         DB::table('Invoices')->insert(
            ['invoices_name' => $invoices_name,'user_id' => $user_id,'invoices_description' => $invoices_description,'invoices_total' => $total,'invoices_date'=>$invoices_date]
         );
         $Invoices = DB::table('Invoices')
             ->select('Invoices.*')
             ->where('Invoices.invoices_total', $total)
             ->where('Invoices.invoices_name', $invoices_name)
             ->where('Invoices.user_id', $user_id)
             ->where('Invoices.invoices_description', $invoices_description)
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
        if ($user->isAdmin == 1 ) {
            $invoice = Invoice::findOrFail($invoices_id);
            $invoice = DB::table('Invoices')
                ->join('Users', 'Invoices.user_id', '=', 'Users.id')
                ->select('Invoices.*','Users.name')
                ->where('Invoices.invoices_id', $invoice->invoices_id)
                ->get();
            $invoiceDetails = DB::table('Invoices_Detail')
                ->select('Invoices_Detail.*')
                ->where('Invoices_Detail.invoices_id', $invoice->invoices_id)
                ->get();
            return view('admin/invoice/invoices_edit', ['invoices' => $invoice], ['invoices_detail' => $invoiceDetails]);
        } else {
            return view('common/error');
        }
    }

    function update(Request $request, $imp_id)
    {
         $user_id = $request->get('user_id');
         $invoices_date = $request->get('invoices_date');
         $invoices_name = $request->get('invoices_name');
         $invoices_description = $request->get('invoices_description');
         $books_id = $request->input('books_id');
         $invoices_detail_quantity = $request->get('invoices_detail_quantity');
         $invoices_detail_price = $request->get('invoices_detail_price');
         $count = count($books_id);
         $total = 0;
         for ($i = 0; $i < $count; $i++) {
             $total = $total + ($invoices_detail_price[$i] * $invoices_detail_quantity[$i]);
         }

        DB::table('Invoices')->where('invoices_id', $invoices_id)
            ->update(['user_id' => $user_id, 'invoices_date' => $invoices_date, 'invoices_total' => $total]);
        $invoiceDetails = DB::table('InvoiceDetails')
            ->select('InvoiceDetails.*')
            ->where('InvoiceDetails.invoices_id', $invoices_id)
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

}
