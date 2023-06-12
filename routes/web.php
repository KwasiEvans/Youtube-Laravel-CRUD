<?php

use App\Http\Controllers\PostController;
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

Route::get('/',[PostController::class, 'index'])->name('home');
Route::post('/post', [PostController::class, 'post'])->name('post');
Route::delete('/delete-post/{id}',[PostController::class, 'delete'])->name('delete_post');

// edit posts
Route::get('/edit/{id}', [PostController::class, 'view_edit'])->name('edit');
Route::put('/edit-post/{id}', [PostController::class, 'edit'])->name('edit-post');