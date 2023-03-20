<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//======================Admin Area Start======================================
//User 
Route::get('/user_list', [UserController::class, 'user_list']);
Route::get('/insert/user', [UserController::class, 'insert_user']);
Route::post('/user/add', [UserController::class, 'user_add']);




//Category
Route::get('/category', [CategoryController::class, 'category_page']);
Route::post('/insert/category', [CategoryController::class, 'insert_category']);
Route::get('/category/delete/{category_id}', [CategoryController::class, 'delete_category']);
Route::get('/update/category/{category_id}', [CategoryController::class, 'update_category']);
Route::post('/edit/category', [CategoryController::class, 'edit_category']);

Route::get('/subcategory', [CategoryController::class, 'subcategory_page']);










//======================Admin Area Start======================================
