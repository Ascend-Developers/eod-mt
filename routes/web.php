<?php

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

// Route::resource('user', 'UserController');
// Route::get('user/list', [App\Http\Controllers\UserController::class, 'index'])->name('userList');
// Route::get('user/list', [App\Http\Controllers\UserController::class, 'index'])->name('userList');
// Route::get('userExport', 'UserController@export');
// Route::get('userGetDataTables', 'UserController@DataTables')->name('user.datatable');

// Route::resource('region', 'RegionController');

// Route::resource('vaccineSite', 'VaccineSiteController');
// Route::get('submition', 'VaccineSiteController@submition');
// Route::get('vaccineGetDataTables', 'VaccineSiteController@DataTables')->name('vaccine.datatable');
// Route::get('vaccineSubmitionGetDataTable', 'VaccineSiteController@DataTablesSubmition')->name('vaccine.submitiondatatable');
// Route::get('vaccineSiteExport', 'VaccineSiteController@export');

// Route::resource('module', 'ModuleController');
// Route::get('module/delete/{module}', 'ModuleController@moduleDelete')->name('module.delete');
