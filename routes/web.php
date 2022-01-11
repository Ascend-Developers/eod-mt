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
// Auth::routes();
// Route::get('/login', 'LoginController@login')->name('login');
// Route::post('/loginCheck', 'LoginController@loginCheck')->name('loginCheck');
// Route::get('/logout', 'LoginController@getLogout')->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('user', 'UserController');
Route::get('userExport', 'UserController@export');
Route::get('userGetDataTables', 'UserController@DataTables')->name('user.datatable');

Route::resource('region', RegionController::class);

Route::resource('site', SiteController::class);
// Route::get('siteGetDataTables', 'SiteController@DataTables')->name('site.datatable');
// Route::get('submition', 'VaccineSiteController@submition');
// Route::get('vaccineSubmitionGetDataTable', 'VaccineSiteController@DataTablesSubmition')->name('vaccine.submitiondatatable');
// Route::get('siteExport', 'SiteController@export');

Route::resource('module', 'ModuleController');
Route::get('module/delete/{module}', 'ModuleController@moduleDelete')->name('module.delete');
