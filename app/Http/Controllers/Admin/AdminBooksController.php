<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminBooksController extends Controller
{
    public function index()
    {
        return view('admin.book.index');

    }
}
