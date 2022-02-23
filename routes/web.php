<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WaitingTimeController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\LabCheckListController;
use App\Http\Controllers\RapidAntigenSiteAuditController;
use App\Http\Controllers\ShipmentController;

use Illuminate\Support\Facades\Route;
use ArielMejiaDev\LarapexCharts\LarapexChart;
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

Route::get('/home', [HomeController::class, 'index'])->name('home');



Route::get('reg', [HelperController::class, 'registerPage'])->name('register');
Route::post('reg/data', [HelperController::class, 'register'])->name('registerData');

Route::resource('user', UserController::class)->middleware('auth');
Route::get('userExport', [UserController::class, 'export'])->name('user.export')->middleware('auth');

Route::resource('region', RegionController::class)->middleware('auth');
Route::get('regionExport', [RegionController::class, 'export'])->name('region.export')->middleware('auth');

Route::resource('site', SiteController::class)->middleware('auth');
Route::get('siteExport', [SiteController::class, 'export'])->name('site.export')->middleware('auth');


Route::resource('item', ItemController::class)->middleware('auth');
Route::get('itemExport', [ItemController::class, 'export'])->name('item.export')->middleware('auth');


Route::get('eod/create', [InventoryController::class, 'create'])->name('eod.create')->middleware('auth');
Route::post('eod/store', [InventoryController::class, 'store'])->name('eod.store')->middleware('auth');
Route::get('eod/index', [InventoryController::class, 'submissions'])->name('eod.index')->middleware('auth');
Route::get('eod/site', [InventoryController::class, 'site'])->name('eod.site')->middleware('auth');
Route::get('eodExport', [InventoryController::class, 'export'])->name('eod.export')->middleware('auth');
Route::get('/eod/dashboard', [InventoryController::class, 'dashboard'])->name('eod.dashboard')->middleware('auth');


Route::get('waiting/siteTracker', [WaitingTimeController::class, 'siteTracker'])->name('siteTracker');
Route::resource('waiting', WaitingTimeController::class)->middleware('auth');
Route::get('waitingExport', [WaitingTimeController::class, 'export'])->name('waiting.export')->middleware('auth');
// Route::get('trackingExport', [WaitingTimeController::class, 'trackingExport'])->name('tracking.export')->middleware('auth');

Route::get('check', [WaitingTimeController::class, 'check'])->name('check');


Route::resource('module', ModuleController::class)->middleware('auth');
Route::get('moduleExport', [ModuleController::class, 'export'])->name('module.export')->middleware('auth');

Route::resource('ratsas', RapidAntigenSiteAuditController::class)->middleware('auth');
Route::get('ratsasExport', [RapidAntigenSiteAuditController::class, 'export'])->name('ratsa.export')->middleware('auth');

Route::resource('shipment', ShipmentController::class)->middleware('auth');
Route::get('shipmentExport', [ShipmentController::class, 'export'])->name('shipment.export')->middleware('auth');

Route::resource('checklist', LabCheckListController::class)->middleware('auth');
Route::get('checklistExport', [LabCheckListController::class, 'export'])->name('checklist.export')->middleware('auth');


