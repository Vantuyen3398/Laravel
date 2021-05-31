<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;

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
    return view('admin/admin_layout');
});
Route::prefix('admin')->group(function() {
	Route::get('user/create', [UserController::class, 'create'])->name('admin.user.create');
	Route::post('user/create', [UserController::class, 'store'])->name('admin.user.store');
	Route::get('user/list_users', [UserController::class, 'show'])->name('admin.user.show');
});
