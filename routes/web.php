<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\BlogPostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/blog',[BlogPostController::class,'index'])->name('blog.index');
Route::get('/blog/{blogPost}',[BlogPostController::class,'show'])->name('blog.show');

Route::get('/blog/create/post',[BlogPostController::class,'create']);
Route::post('/blog/create/post',[BlogPostController::class,'store'])->name('blog.store');
Route::get('/blog/{blogPost}/edit',[BlogPostController::class,'edit'])->name('blog.edit');
Route::put('/blog/{blogPost}/edit',[BlogPostController::class,'update'])->name('blog.update');
Route::delete('/blog/{blogPost}',[BlogPostController::class,'destroy']);