<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\TaskController;

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProductController;


Route::get('products', [ProductController::class, 'index']);
Route::get('products/Edit/{id}/', [ProductController::class, 'edit']);
Route::post('products/Store', [ProductController::class, 'store']);
Route::get('products/Delete/{id}', [ProductController::class, 'destroy']);


Route::get('/form',[ArticleController::class, 'showForm']);
Route::post('/upload-article',[ArticleController::class, 'uploadArticle']);

Route::get('tasks', [TaskController::class, 'index']);
Route::get('taskEdit/{id}/', [TaskController::class, 'edit']);
Route::post('taskStore', [TaskController::class, 'store']);
Route::post('taskStore2', [TaskController::class, 'store2']);

Route::get('taskDelete/{id}', [TaskController::class, 'destroy']);

// Route::get('/', function () {
//     return view('home.homepage');
// });
use App\Http\Controllers\EmployeeController;
Route::get('/ajax', function () {
    return view('admin.home');
});
Route::post('/store', [EmployeeController::class, 'store'])->name('store');
Route::get('/getall', [EmployeeController::class, 'getall'])->name('getall');
Route::get('/employee/{id}/edit', [EmployeeController::class, 'edit'])->name('edit');
Route::post('/employee/update', [EmployeeController::class, 'update'])->name('update');
Route::delete('/employee/delete', [EmployeeController::class, 'delete'])->name('delete');

Route::get('/',[Admincontroller::class,'homepage']);


Route::get('/home',[Admincontroller::class,'index'])->name('home');
Route::get('/add_post',[Admincontroller::class,'add_post']);
Route::post('/post_page',[Admincontroller::class,'post_page']);
Route::get('/show_post', [Admincontroller::class,'show_post']);
Route::get('/delete_post/{id}', [Admincontroller::class, 'delete_post']);
Route::get('/edit_post/{id}',[Admincontroller::class,'edit_post']);
Route::post('/update_post/{id}',[Admincontroller::class, 'update_post']);
Route::get('/create_post',[Admincontroller::class,'create_post'])->name('create_post');
Route::post('/create_post_store',[Admincontroller::class,'create_post_store']);
Route::get('/my_posts',[Admincontroller::class,'my_posts'])->name('my_posts');
Route::get('/user_edit_post/{id}',[Admincontroller::class,'user_edit_post']);
Route::get('/accept_post/{id}',[Admincontroller::class, 'accept_post']);
Route::get('/reject_post/{id}',[Admincontroller::class, 'reject_post']);





