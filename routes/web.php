<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;











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
Route::post('/category/delete_all', [CategoryController::class, 'category_delete_all']);


Route::get('/subcategory', [CategoryController::class, 'subcategory_page']);
Route::post('/insert/subcategory', [CategoryController::class, 'subcategory_insert']);
Route::get('/subcategory/delete/{subcategory_id}', [CategoryController::class, 'delete_subcategory']);
Route::get('/update/subcategory/{subcategory_id}', [CategoryController::class, 'update_subcategory']);
Route::post('/edit/subcategory', [CategoryController::class, 'edit_subcategory']);


//edit profile
Route::get('/profile/edit', [ProfileController::class, 'profile_page']);
Route::post('/update/profile', [ProfileController::class, 'profile_update']);
Route::post('/update/password', [ProfileController::class, 'password_update']);
Route::post('/update/photo', [ProfileController::class, 'photo_update']);











//======================Admin Area Start======================================
