<?php

use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WaitingTimeController;
use App\Http\Controllers\ModuleController;

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
// Auth::routes(['register' => false]);

// Route::get('/logout', 'LoginController@getLogout')->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('user', UserController::class)->middleware('auth');
Route::resource('region', RegionController::class)->middleware('auth');
Route::resource('site', SiteController::class)->middleware('auth');

Route::resource('item', ItemController::class)->middleware('auth');

Route::get('eod/create', [InventoryController::class, 'create'])->name('eod.create')->middleware('auth');
Route::post('eod/store', [InventoryController::class, 'store'])->name('eod.store')->middleware('auth');
Route::get('eod/index', [InventoryController::class, 'submissions'])->name('eod.index')->middleware('auth');
Route::get('eod/site', [InventoryController::class, 'site'])->name('eod.site')->middleware('auth');


Route::resource('module', 'ModuleController')->middleware('auth');
Route::get('module/delete/{module}', 'ModuleController@moduleDelete')->name('module.delete')->middleware('auth');
Route::resource('waiting', WaitingTimeController::class)->middleware('auth');
Route::resource('module', ModuleController::class)->middleware('auth');
