<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\CategoriesController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\AdminLoginController;

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

Route::get('/', [AdminLoginController::class, 'showLogin'])->name('admin.showLogin');
Route::post('/', [AdminLoginController::class, 'login'])->name('admin.login');

Route::prefix('admin/user')->group(function() {
	Route::get('create', [UserController::class, 'create'])->name('admin.user.create');
	Route::post('create', [UserController::class, 'store'])->name('admin.user.store');
	Route::get('list_users', [UserController::class, 'show'])->name('admin.user.show');
	Route::get('delete/{id}', [UserController::class, 'destroy'])->name('admin.user.destroy');
	Route::get('edit/{id}',[UserController::class, 'edit'])->name('admin.user.edit');
	Route::post('edit',[UserController::class, 'update'])->name('admin.user.update');
});
Route::prefix('admin/category')->group(function() {
	Route::get('create', [CategoriesController::class, 'create'])->name('admin.category.create');
	Route::post('create', [CategoriesController::class, 'store'])->name('admin.category.store');
	Route::get('list_cate', [CategoriesController::class, 'show'])->name('admin.category.show');
	Route::get('delete/{cat_id}', [CategoriesController::class, 'destroy'])->name('admin.category.destroy');
});
Route::prefix('admin/product')->group(function() {
	Route::get('create', [ProductController::class, 'create'])->name('admin.product.create');
	Route::post('create', [ProductController::class, 'store'])->name('admin.product.store');
	Route::get('list_pd', [ProductController::class, 'show'])->name('admin.product.show');
	Route::get('delete/{product_id}', [ProductController::class, 'destroy'])->name('admin.product.destroy');
	Route::get('edit/{product_id}',[ProductController::class, 'edit'])->name('admin.product.edit');
	Route::post('edit',[ProductController::class, 'update'])->name('admin.product.update');
});