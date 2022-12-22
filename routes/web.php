<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SortBooksController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\AdminBooksController;
use App\Http\Controllers\Admin\AdminOrdersController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminAuthorController;
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

Route::get('/logins', function () {
    return view('/logins');
});

//user;

Route::get('/new', function () {
    return view('new');
});

Route::get('/allbooks', function () {
    return view('allbooks');
});


//Admin
Route::get('/admin/home',[AdminController::class,'viewHome']);
Route::get('/admin/category',[AdminController::class,'viewAllCategory']);
Route::get('/admin/author',[AdminController::class,'viewAllAuthor']);
Route::get('/admin/products',[AdminController::class,'viewAllProducts'])->name('admin.book');
Route::get('/admin/user',[AdminController::class,'viewAllUsers']);
Route::get('/admin/order',[AdminController::class,'viewAllOrders']);
Route::get('/admin/dashboard',[AdminController::class,'viewDashboard']);
Route::get('/admin/settings',[AdminController::class,'viewProfile']);

//admin san pham
// Them 1 san pham: view
Route::get('/admin/products/create', [AdminBooksController::class, 'create']);
// Them sp: xu ly => ko co giao dien
Route::post("/admin/products/create", [AdminBooksController::class, 'store']);
// Sua 1 san pham: view
Route::get("/admin/products/{books_id}/edit", [AdminBooksController::class, 'edit']);
// Cap nhat sp => ko co giao dien
Route::put("/admin/products/{books_id}/edit", [AdminBooksController::class, 'update']);
// Xoa 1 san pham
Route::delete("/admin/products/{book}/delete", [AdminBooksController::class, 'destroy']);

//admin category
// Them 1 san pham: view
Route::get('/admin/category/create', [AdminCategoryController::class, 'create']);
// Them sp: xu ly => ko co giao dien
Route::post("/admin/category/create", [AdminCategoryController::class, 'store']);
// Sua 1 san pham: view
Route::get("/admin/category/{category_id}/edit", [AdminCategoryController::class, 'edit']);
// Cap nhat sp => ko co giao dien
Route::put("/admin/category/{category_id}/edit", [AdminCategoryController::class, 'update']);
// Xoa 1 san pham
Route::delete("/admin/category/{category_id}/delete", [AdminCategoryController::class, 'destroy']);

//admin author
// Them 1 san pham: view
Route::get('/admin/author/create', [AdminAuthorController::class, 'create']);
// Them sp: xu ly => ko co giao dien
Route::post("/admin/author/create", [AdminAuthorController::class, 'store']);
// Sua 1 san pham: view
Route::get("/admin/author/{author_id}/edit", [AdminAuthorController::class, 'edit']);
// Cap nhat sp => ko co giao dien
Route::put("/admin/author/{author_id}/edit", [AdminAuthorController::class, 'update']);
// Xoa 1 san pham
Route::delete("/admin/author/{author_id}/delete", [AdminAuthorController::class, 'destroy']);

//admin orders
Route::get('/admin/order/detail', [AdminOrdersController::class, 'detail']);
Route::delete("/admin/order/{orders_id}/delete", [AdminOrdersController::class, 'destroy']);




//register
Route::get('/register', [LoginController::class, 'createUser']);
Route::post('/register', [LoginController::class, 'storeUser']);
//login
Route::get('/login',[LoginController::class,'viewLogin']);
Route::post('/login',[LoginController::class,'login']);
Route::get('/logout',[LoginController::class,'logout']);


//Books
Route::get('/',[BooksController::class,'showBooks']);
Route::get('/allbooks',[SortBooksController::class,'allBooks']);
Route::get('/detail/{id}',[BooksController::class,'showDetail']);
Route::get('search',[BooksController::class,'search']);
Route::get('new',[BooksController::class,'newestBook']);

//Category
Route::get('/category',[BooksController::class,'allCategory']);
Route::get('/category/{category_name}',[SortBooksController::class,'productsByCategory']);

//cart
Route::post('/cart/{id}',[BooksController::class,'addCart']);
Route::delete("/cart/{id}/delete", [BooksController::class, 'deleteCart']);
Route::get('/cartlist',[BooksController::class,'cartList']);
