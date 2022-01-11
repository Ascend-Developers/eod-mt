<?php

use App\Http\Controllers\RegionController;
use App\Http\Controllers\SiteController;
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
    return redirect('/login');
});

Auth::routes(['register' => false]);

// Route::get('/logout', 'LoginController@getLogout')->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('user/list', [App\Http\Controllers\UserController::class, 'index'])->name('user.list');
Route::get('user/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
Route::post('user/store', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
Route::get('user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::PATCH('user/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
Route::delete('user/delete/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');


Route::resource('region', RegionController::class);

Route::resource('site', SiteController::class);

Route::resource('module', 'ModuleController');
Route::get('module/delete/{module}', 'ModuleController@moduleDelete')->name('module.delete');