<?php

namespace App\Http\Controllers\Admin;

use App\Models\Books;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminBooksController extends Controller
{
    public function create()
    {
        return view('admin.book.book_create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storeData = $request->validate([
            'books_name' => 'required|max:255',
            'category_id' => 'required|numeric',
            'publisher_id' => 'required|numeric',
            'books_description' => 'required|max:5000',
            'books_author' => 'required|numeric',
            'books_quantity' => 'required|numeric',
            'books_image' => 'required|max:500',
            'books_price' => 'required|numeric',
            'books_ISBN' => 'required|numeric',
        ]);
        $book = Books::create($storeData);
        return redirect('/admin/products')->with('completed', 'Book has been saved!');
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
        return view('admin.book.book_edit', compact('book'));
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
            'category_id' => 'required|numeric',
            'publisher_id' => 'required|numeric',
            'books_description' => 'required|max:5000',
            'books_author' => 'required|numeric',
            'books_quantity' => 'required|numeric',
            'books_image' => 'required|max:500',
            'books_price' => 'required|numeric',
            'books_ISBN' => 'required|numeric',
        ]);
        Books::where($books_id)->update($updateData);
        return redirect('/admin/products')->with('completed', 'Book has been updated');
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
        return redirect('/admin/products')->with('completed', 'Author has been deleted');
    }




}
