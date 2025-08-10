<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
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

Route::middleware(['auth'])->group(function () {
Route::controller(PortfolioController::class)->group(function(){
    Route::get('portfolio', 'index' )->name('portfolio.index');
    Route::get('create/portfolio', 'create' )->name('portfolio.create');
    Route::post('store/portfolio', 'store' )->name('portfolio.store');
    Route::get('edit/portfolio/{id}', 'edit' )->name('portfolio.edit');
    Route::get('delete/portfolio/{id}', 'destroy' )->name('portfolio.delete');
    Route::post('update/portfolio', 'update' )->name('portfolio.update');
});
});

Route::middleware(['auth'])->group(function () {
Route::controller(PermissionController::class)->group(function(){
    Route::get('permission', 'index' )->name('permission.index');
    Route::get('create/permission', 'create' )->name('permission.create');
    Route::post('store/permission', 'store' )->name('permission.store');
    Route::get('edit/permission/{id}', 'edit' )->name('permission.edit');
    Route::get('delete/permission/{id}', 'destroy' )->name('permission.delete');
    Route::post('update/permission', 'update' )->name('permission.update');
});
});

Route::middleware(['auth'])->group(function () {
Route::controller(RoleController::class)->group(function(){
    Route::get('role', 'index' )->name('role.index');
    Route::get('create/role', 'create' )->name('role.create');
    Route::post('store/role', 'store' )->name('role.store');
    Route::get('edit/role/{id}', 'edit' )->name('role.edit');
    Route::get('delete/role/{id}', 'destroy' )->name('role.delete');
    Route::post('update/role', 'update' )->name('role.update');

    Route::get('roles/give-permission/{id}', 'givePermissiontoRole' )->name('give-permission');
    Route::post('roles/add-permission/{id}', 'addPermissiontoRole' )->name('add-permission');
});
});
require __DIR__.'/auth.php';
