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

// Route::get('/logout', 'LoginController@getLogout')->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('user', UserController::class);
Route::resource('region', RegionController::class);
Route::resource('site', SiteController::class);

Route::resource('item', ItemController::class);

Route::get('eod/create', [InventoryController::class, 'create'])->name('eod.create');
Route::post('eod/store', [InventoryController::class, 'store'])->name('eod.store');
Route::get('eod/index', [InventoryController::class, 'submissions'])->name('eod.index');
Route::get('eod/site', [InventoryController::class, 'site'])->name('eod.site');


Route::resource('module', 'ModuleController');
Route::get('module/delete/{module}', 'ModuleController@moduleDelete')->name('module.delete');
Route::resource('waiting', WaitingTimeController::class);
Route::resource('module', ModuleController::class);
