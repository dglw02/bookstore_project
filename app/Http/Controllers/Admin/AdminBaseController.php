<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class AdminBaseController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');

    }
}
