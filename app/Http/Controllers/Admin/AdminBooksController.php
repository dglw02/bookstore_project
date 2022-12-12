<?php

namespace App\Http\Controllers\Admin;

use App\Models\Books;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminBooksController extends Controller
{


// Xoa 1 sp theo id
    function delete($books_id)
    {
        DB::table('books')->where('books_id', $books_id)->delete();
        return redirect()->route('admin.book');
    }

    // View: Tao san pham
    function create()
    {
        return view('admin.book.book_create');
    }

    // Ko co giao dien: them san pham
    function save(Request $request)
    {
        // Lay du lieu
        $name = $request->get('bookName');
        $book_category = $request->get('bookCategory');
        $book_publisher = $request->get('bookPublisher');
        $description = $request->get('bookDescription');
        $book_author = $request->get('bookAuthor');
        $quantity = $request->get('bookQuantity');
        $image = $request->get('bookImage');
        $price = $request->get('bookPrice');
        $isbn = $request->get('bookIsbn');


        // Insert
        DB::table('books')->insert(
            ['books_name' => $name,
                'category_id' => $book_category,
                'publisher_id' => $book_publisher,
                'books_description' => $description,
                'books_author' => $book_author,
                'books_quantity' => $quantity,
                'books_image' => $image,
                'books_price' => $price,
                'books_ISBN' => $isbn
            ]
        );
        // Chuyen huong ve trang home
        return redirect()->route('admin.book');

    }

    // View
    function edit($books_id)
    {
        $book = DB::table('books')->where('books_id', $books_id);
        if ($book == null) {
            return redirect()->route('error');
        }
        return view('admin.book.book_edit', ['books' => $book]);
    }

    // ko co giao dien
    function update(Request $request, $books_id)
    {
        $name = $request->get('bookName');
        $book_category = $request->get('bookCategory');
        $book_publisher = $request->get('bookPublisher');
        $description = $request->get('bookDescription');
        $book_author = $request->get('bookAuthor');
        $quantity = $request->get('bookQuantity');
        $image = $request->get('bookImage');
        $price = $request->get('bookPrice');
        $isbn = $request->get('bookIsbn');

        DB::table('books')->where('books_id', $books_id)
            ->update(['books_name' => $name,
                'category_id' => $book_category,
                'publisher_id' => $book_publisher,
                'books_description' => $description,
                'books_author' => $book_author,
                'books_quantity' => $quantity,
                'books_image' => $image,
                'books_price' => $price,
                'books_ISBN' => $isbn]);
        return redirect()->back();
    }




}
