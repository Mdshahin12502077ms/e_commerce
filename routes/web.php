<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cat_controller;
use App\Http\Controllers\subcatController;
use App\Http\Controllers\home;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::post('/insert',[cat_controller::class, 'insert']);
Route::get('/create_cat',[cat_controller::class, 'createcat']);
Route::get('/show_cat',[cat_controller::class, 'show']);
Route::get('/cat_edit/{id}',[cat_controller::class, 'edit']);
Route::post('/update',[cat_controller::class, 'update']);
Route::get('/cat_delete/{id}',[cat_controller::class, 'delete']);
//subcat
Route::get('/create_subcat',[subcatController::class, 'show_subcat']);
Route::post('/insertSubCat',[subcatController::class, 'insert']);
// Route::get('/sub_cat_edit/{id}',[subcatController::class, 'edit']);
// Route::post('/update',[subcatController::class, 'update']);
// Route::get('/sub_cat_delete/{id}',[subcatController::class, 'delete']);

//home controller
Route::get('/home_page',[home::class, 'home']);
Route::get('/Product_details/cat_ajax/{id}',[ProductController::class, 'cat_ajax']);

Route::resource('/Product_details',ProductController::class);





