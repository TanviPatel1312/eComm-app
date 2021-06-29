<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;

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

//Route::any('/', function () {
//    return view('register');
//});
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/{any}', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes();

Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::get('/home', [App\Http\Controllers\HomeController::class,'index'])->name('home');

Route::any('admin/dashboard',[DashboardController::class,"showdash"]);
Route::resource('admin/user','App\Http\Controllers\UserController');
Route::resource('admin/product','App\Http\Controllers\ProductController');
Route::resource('admin/category','App\Http\Controllers\CategoryController');
Route::resource('admin/size','App\Http\Controllers\SizeController');
Route::resource('admin/color','App\Http\Controllers\ColorController');
Route::resource('admin/categorybyproduct', 'App\Http\Controllers\CategoryByProductController');
Route::resource('admin/subcategory', 'App\Http\Controllers\SubCategoryController');
Route::resource('admin/aboutus', 'App\Http\Controllers\AboutUspageController');
Route::resource('admin/contactus', 'App\Http\Controllers\ContactUsController');
Route::resource('admin/productDetail','App\Http\Controllers\ProductDetailController');

//Auth::routes();
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

