<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
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
    return view('frontend.index');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['role:super-admin|admin','auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
Route::controller(BlogCategoryController::class)->group(function(){
    Route::get('blog_category', 'index' )->name('category.index')->middleware(['role:super-admin|admin','permission:View  Blog Category']);
    Route::get('create/blog_category', 'create' )->name('category.create')->middleware(['role:super-admin|admin','permission:Create Blog Category']);
    Route::post('store/blog_category', 'store' )->name('category.store')->middleware(['role:super-admin|admin','permission:Create Blog Category']);
    Route::get('edit/blog_category/{id}', 'edit' )->name('category.edit')->middleware(['role:super-admin|admin','permission:Update  Blog Category']);
    Route::get('delete/blog_category/{id}', 'destroy' )->name('category.delete')->middleware(['role:super-admin|admin','permission:Delete Blog Category']);
    Route::post('update/blog_category', 'update' )->name('category.update')->middleware(['role:super-admin|admin','permission:Update  Blog Category']);
});
});

Route::middleware(['auth'])->group(function () {
Route::controller(BlogController::class)->group(function(){
    Route::get('blog', 'index' )->name('blog.index')->middleware(['role:super-admin|admin','permission:View Blog']);
    Route::get('create/blog', 'create' )->name('blog.create')->middleware(['role:super-admin|admin','permission:Create Blog']);
    Route::post('store/blog', 'store' )->name('blog.store')->middleware(['role:super-admin|admin','permission:Create Blog']);
    Route::get('edit/blog/{id}', 'edit' )->name('blog.edit')->middleware(['role:super-admin|admin','permission:Update Blog']);
    Route::get('delete/blog/{id}', 'destroy' )->name('blog.delete')->middleware(['role:super-admin|admin','permission:Delete Blog']);
    Route::post('update/blog', 'update' )->name('blog.update')->middleware(['role:super-admin|admin','permission:Update Blog']);
});
});

Route::middleware(['auth'])->group(function () {
Route::controller(PortfolioController::class)->group(function(){
    Route::get('portfolio', 'index' )->name('portfolio.index')->middleware(['role:super-admin|admin','permission:View Portfolio']);
    Route::get('create/portfolio', 'create' )->name('portfolio.create')->middleware(['role:super-admin|admin','permission:Create Portfolio']);
    Route::post('store/portfolio', 'store' )->name('portfolio.store')->middleware(['role:super-admin|admin','permission:Create Portfolio']);
    Route::get('edit/portfolio/{id}', 'edit' )->name('portfolio.edit')->middleware(['role:super-admin|admin','permission:Update Portfolio']);
    Route::get('delete/portfolio/{id}', 'destroy' )->name('portfolio.delete')->middleware(['role:super-admin|admin','permission:Delete Portfolio']);
    Route::post('update/portfolio', 'update' )->name('portfolio.update')->middleware(['role:super-admin|admin','permission:Update Portfolio']);
});
});

Route::middleware(['auth'])->group(function () {
Route::controller(PermissionController::class)->group(function(){
    Route::get('permission', 'index' )->name('permission.index')->middleware(['role:super-admin|admin','permission:View Permission']);
    Route::get('create/permission', 'create' )->name('permission.create')->middleware(['role:super-admin|admin','permission:Create Permission']);
    Route::post('store/permission', 'store' )->name('permission.store')->middleware(['role:super-admin|admin','permission:Create Permission']);
    Route::get('edit/permission/{id}', 'edit' )->name('permission.edit')->middleware(['role:super-admin|admin','permission:Update Permission']);
    Route::get('delete/permission/{id}', 'destroy' )->name('permission.delete')->middleware(['role:super-admin|admin']);
    Route::post('update/permission', 'update' )->name('permission.update')->middleware(['role:super-admin|admin','permission:Update Permission']);
});
});

Route::middleware(['auth'])->group(function () {
Route::controller(RoleController::class)->group(function(){
    Route::get('role', 'index' )->name('role.index')->middleware(['role:super-admin|admin','permission:View Role']);
    Route::get('create/role', 'create' )->name('role.create')->middleware(['role:super-admin|admin','permission:Create Role']);
    Route::post('store/role', 'store' )->name('role.store')->middleware(['role:super-admin|admin','permission:Create Role']);
    Route::get('edit/role/{id}', 'edit' )->name('role.edit')->middleware(['role:super-admin|admin','permission:Update Role']);
    Route::get('delete/role/{id}', 'destroy' )->name('role.delete')->middleware(['role:super-admin|admin','permission:Delete Role']);
    Route::post('update/role', 'update' )->name('role.update')->middleware(['role:super-admin|admin','permission:Update Role']);

    Route::get('roles/give-permission/{id}', 'givePermissiontoRole' )->name('give-permission')->middleware(['role:super-admin|admin','permission:Give Permission to Role']);
    Route::post('roles/add-permission/{id}', 'addPermissiontoRole' )->name('add-permission')->middleware(['role:super-admin|admin','permission:Add Permission to Role']);
});
});

Route::middleware(['auth'])->group(function(){
    Route::controller(UserController::class)->group(function(){
        Route::get('admin/logout', 'destroy' )->name('admin.logout');
    Route::get('user', 'index' )->name('user.index');
    Route::get('edit/user/{id}', 'edit' )->name('user.edit');
    Route::get('delete/user/{id}', 'destroy' )->name('user.delete');
    Route::post('update/user', 'update' )->name('user.update');
});
});
require __DIR__.'/auth.php';
