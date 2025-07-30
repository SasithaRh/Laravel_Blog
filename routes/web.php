<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
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

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
Route::controller(BlogCategoryController::class)->group(function(){
    Route::get('blog_category', 'index' )->name('blog');
    Route::get('create/blog_category', 'create' )->name('category.create');
    Route::post('store/blog_category', 'store' )->name('category.store');
    Route::get('edit/blog_category/{id}', 'edit' )->name('category.edit');
    Route::get('delete/blog_category/{id}', 'destroy' )->name('category.delete');
    Route::post('update/blog_category', 'update' )->name('category.update');
});
});

Route::middleware(['auth'])->group(function () {
Route::controller(BlogController::class)->group(function(){
    Route::get('blog', 'index' )->name('blog.index');
    Route::get('create/blog', 'create' )->name('blog.create');
    Route::post('store/blog', 'store' )->name('blog.store');
    Route::get('edit/blog/{id}', 'edit' )->name('blog.edit');
    Route::get('delete/blog/{id}', 'destroy' )->name('blog.delete');
    Route::post('update/blog', 'update' )->name('blog.update');
});
});
require __DIR__.'/auth.php';
