<?php

use App\Http\Controllers\Admin\AdminChartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MailerController;
use App\Http\Controllers\SortBooksController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\AdminBooksController;
use App\Http\Controllers\Admin\AdminOrdersController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminAuthorController;
use App\Http\Controllers\Admin\AdminUsersController;
use App\Http\Controllers\Admin\AdminInvoicesController;
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
Route::get('/about', function () {
    return view('about');
});




//Admin
Route::get('/admin/home',[AdminController::class,'viewHome']);
Route::get('/admin/category',[AdminController::class,'viewAllCategory']);
Route::get('/admin/author',[AdminController::class,'viewAllAuthor']);
Route::get('/admin/products',[AdminController::class,'viewAllProducts'])->name('admin.book');
Route::get('/admin/user',[AdminController::class,'viewAllUsers']);
Route::get('/admin/admin',[AdminController::class,'viewAllAdmin']);
Route::get('/admin/order',[AdminController::class,'viewAllOrders']);
Route::get('/admin/dashboard',[AdminController::class,'viewDashboard']);
Route::get('/admin/settings',[AdminController::class,'viewProfile']);
Route::get('/admin/invoice',[AdminController::class,'viewAllInvoice']);

//Admin Books
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

//Admin Category
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

//Admin Author
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

//Admin User
Route::get("/admin/admin/{id}/edit", [AdminUsersController::class, 'edit']);
// Cap nhat sp => ko co giao dien
Route::put("/admin/admin/{id}/edit", [AdminUsersController::class, 'update']);
// Xoa 1 san pham
Route::delete("/admin/admin/{id}/delete", [AdminUsersController::class, 'destroy']);//DELETE

//Admin Orders
Route::get('/admin/order/{orders_id}/detail', [AdminOrdersController::class, 'detail']);
Route::put('/admin/order/{orders_id}/update', [AdminOrdersController::class, 'update']);
Route::delete("/admin/order/{orders_id}/delete", [AdminOrdersController::class, 'destroy']);
Route::get('/admin/completed-order', [AdminOrdersController::class, 'completedOrder']);
Route::get('/admin/approved-order', [AdminOrdersController::class, 'approvedOrder']);
Route::get('/admin/transported-order', [AdminOrdersController::class, 'transportedOrder']);
Route::get('/admin/canceled-order', [AdminOrdersController::class, 'canceledOrder']);

//Admin Chart
Route::get('/admin/orders_revenue', [AdminChartController::class, 'index']);
Route::get('/admin/day_revenue', [AdminChartController::class, 'index2']);

//Admin Invoices
Route::get('/admin/invoice', [AdminInvoicesController::class, 'index']);
Route::get('/admin/invoices/create', [AdminInvoicesController::class, 'create']);
Route::get('/admin/invoice/{id}/detail', [AdminInvoicesController::class, 'show']);
Route::post("/admin/invoices/create", [AdminInvoicesController::class, 'store']);
Route::get("/admin/invoice/{id}/edit", [AdminInvoicesController::class, 'edit']);
Route::put("/admin/invoice/{id}/edit", [AdminInvoicesController::class, 'update']);
Route::delete("/admin/invoice/{id}/delete", [AdminInvoicesController::class, 'destroy']);

//register
Route::get('/register', [LoginController::class, 'createUser']);
Route::post('/register', [LoginController::class, 'storeUser']);
//login
Route::get('/login',[LoginController::class,'viewLogin']);
Route::post('/login',[LoginController::class,'login']);
Route::post('/logout',[LoginController::class,'logout']);


//Books
Route::get('/',[BooksController::class,'showBooks']);
Route::get('/allbooks',[SortBooksController::class,'allBooks']);
Route::get('/detail/{books_id}',[BooksController::class,'showDetail']);
Route::get('search',[BooksController::class,'search']);
Route::get('new',[BooksController::class,'newestBook']);
Route::get('bestseller',[BooksController::class,'bestSeller']);
//Category
Route::get('/category',[BooksController::class,'allCategory']);
Route::get('/category/{category_name}',[SortBooksController::class,'productsByCategory']);

//cart
Route::post('/cart/{id}',[BooksController::class,'addCart']);
Route::delete("/cart/{id}/delete", [BooksController::class, 'deleteCart']);
Route::delete("/cart/deleteall", [BooksController::class, 'deleteAllCart']);
Route::get('/cartlist',[BooksController::class,'cartList']);
Route::post('/cart/{id}/update', [BooksController::class, 'updateCart']);

//Checkout
Route::get('checkout',[CheckOutController::class,'index']);
Route::get('checkoutonline',[CheckOutController::class,'index2']);
Route::post('get-states-by-countryx',[CheckOutController::class,'getDistrict']); //quan huyen
Route::post('get-cities-by-statex',[CheckOutController::class,'getWards']); //xa phuong
Route::post('place-order',[CheckOutController::class,'placeorder']);
Route::get('my-order',[UserController::class,'index']);
Route::get('vieworder/{orders_id}',[UserController::class,'view']);
Route::put("/vieworder/{orders_id}/delete-order", [UserController::class, 'deleteOrders']);
Route::post('/momo_payment',[CheckOutController::class,'momo']);

//Mailer
Route::get("email", [MailerController::class, "email"])->name("email");
Route::post("send-email", [MailerController::class, "composeEmail"])->name("send-email");



