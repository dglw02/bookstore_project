<?php

namespace App\Http\Controllers\Admin;

use App\Models\Author;
use App\Models\Books;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminBooksController extends Controller
{
    public function create()
    {
        $categories = Category::get();
        $publishers = Publisher::get();
        $authors = Author::get();
        return view('admin.book.book_create', ['categories' => $categories, 'publishers' => $publishers, 'authors' => $authors]);
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
            'category_id' => 'required',
            'publisher_id' => 'required',
            'books_description' => 'required|max:5000',
            'books_author' => 'required',
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
