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
            ['invoices_name' => $invoices_name,'user_id' => $user_id,'invoices_description' => $invoices_description,'invoices_total' => $total]
         );
         $Invoices = DB::table('Invoices')
             ->select('Invoices.*')
             ->where('Invoices.invoices_total', $total)
             ->where('Invoices.invoices_name', $invoices_name)
             ->where('Invoices.user_id', $user_id)
             ->where('Invoices.invoices_description', $invoices_description)
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





    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $books_id
     * @return \Illuminate\Http\Response
     */
    public function edit($books_id)
    {
        $book = Books::findOrFail($books_id);
        $categories = Category::get();
        $publishers = Publisher::get();
        $authors = Author::get();
        return view('admin.book.book_edit', compact('book'), [
            'categories' => $categories, 'publishers' => $publishers, 'authors' => $authors
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $books_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $books_id)
    {
        $updateData = $request->validate([
            'books_name' => 'required|max:255',
            'category_id' => 'required',
            'publisher_id' => 'required',
            'books_description' => 'required|max:5000',
            'books_author' => 'required',
            'books_quantity' => 'required|numeric',
            'books_image' => 'required|max:500',
            'books_price' => 'required|numeric',
            'books_ISBN' => 'required|numeric',
        ]);
        Books::where('books_id',"=",$books_id)->update($updateData);
        alert()->success('Success','Book have been updated.');
        return redirect('/admin/products');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $books_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($books_id)
    {
        $book = Books::findOrFail($books_id);
        $book->delete();
        alert()->success('Success','Book have been deleted.');
        return redirect('/admin/products');
    }
}
