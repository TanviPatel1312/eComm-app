<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;


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

Auth::routes();

Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::resource('register','App\Http\Controllers\RegisterController');
//Route::any('register',[RegisterController::class,"store"]);
//Route::any('insertdata',[RegisterController::class,"store"]);

Route::any('/dashboard',[DashboardController::class,"showdash"]);
Route::resource('user','App\Http\Controllers\UserController');
Route::resource('/product','App\Http\Controllers\ProductController');
Route::resource('category','App\Http\Controllers\CategoryController');
Route::resource('size','App\Http\Controllers\SizeController');
Route::resource('color','App\Http\Controllers\ColorController');
//Route::resource('product',[ProductController::class,'getsize']);


//Route::get('login',[loginController::class,"show"]);
//Route::post('validateUser',[loginController::class,"userlogin"]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
