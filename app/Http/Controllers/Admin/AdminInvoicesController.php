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





use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AdminInvoicesController extends Controller
{
    //
    public function create()
    {
        $categories = Category::get();
        $publishers = Publisher::get();
        $authors = Author::get();
        $books = Books::get();
        return view('admin.invoice.invoices_create', ['categories' => $categories, 'publishers' => $publishers, 'authors' => $authors,'books' => $books]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     function detail($orders_id)
     {
         $order = Order::findOrFail($orders_id);
         $order_details = OrderDetails::where('orders_id', $orders_id)->get();
         $cities = City::get();
         return view('admin.invoice.invoices_detail', compact('order_details', 'order'), ['cities' => $cities]);
     }



    public function store(Request $request)
    {
        $storeData = $request->validate([
            'books_name' => 'required|max:255',
            'books_name' => 'required|max:255',
            'books_description' => 'required|max:5000',
            'books_quantity' => 'required|numeric',
            'books_price' => 'required|numeric',
            
        ]);
        $invoice = Invoice::create($storeData);
        alert()->success('Success','Invoice have been created.');
        return redirect('/admin/invoice/all-invoice');
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
