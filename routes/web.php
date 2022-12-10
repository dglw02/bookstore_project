<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('/home');
});

//user
Route::get('/highrating', function () {
    return view('highrating');
});

Route::get('/new', function () {
    return view('new');
});

Route::get('/allbooks', function () {
    return view('allbooks');
});

Route::get('/topsellers', function () {
    return view('topsellers');
});


Route::get('/education', function () {
    return view('category.education');
});
Route::get('/guide', function () {
    return view('category.guide');
});
Route::get('/manga', function () {
    return view('category.manga');
});
Route::get('/novel', function () {
    return view('category.novel');
});
Route::get('/philosophy', function () {
    return view('category.philosophy');
});

//Admin
Route::get('/admin/home',[AdminController::class,'viewHome']);
Route::get('/admin/products',[AdminController::class,'viewAllProducts']);
Route::get('/admin/user',[AdminController::class,'viewAllUsers']);
Route::get('/admin/order',[AdminController::class,'viewAllOrders']);
Route::get('/admin/category',[AdminController::class,'viewAllCategory']);
Route::get('/admin/dashboard',[AdminController::class,'viewDashboard']);
Route::get('/admin/settings',[AdminController::class,'viewProfile']);


//login
Route::get('/login',[LoginController::class,'viewLogin']);
Route::post('/login',[LoginController::class,'login']);
Route::post('/logout',[LoginController::class,'logout']);


//Books
Route::get('/',[BooksController::class,'showBooks']);
Route::get('/detail/{id}',[BooksController::class,'showDetail']);
