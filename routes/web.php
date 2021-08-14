<?php

use Illuminate\Support\Facades\Route;
  
use App\Models\Pharm;
use App\Models\Drug;
use App\Http\Controllers\PharmController;
use App\Http\Controllers\DrugController;
use App\Http\Controllers\PharmDrugController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ProducerController;

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


Route::get('/', [PharmController::class, 'index'])->name('pharm-show');

Route::get('/pharm/create', [PharmController::class, 'index'])->name('pharm-create');
Route::post('/pharm/create', [PharmController::class, 'create']);
Route::get('/pharm/create/export', [PharmController::class, 'export'])->name('pharm-excel-export');
Route::post('/pharm/create/import', [PharmController::class, 'upload'])->name('pharm-excel-upload');
Route::get('/pharm/create/import', [PharmController::class, 'import'])->name('pharm-excel-import');


Route::get('/drug/create', [DrugController::class, 'index'])->name('drug-create');
Route::post('/drug/create', [DrugController::class, 'create']);
Route::get('/drug/create/export', [DrugController::class, 'export'])->name('drug-excel-export');
Route::post('/drug/create/import', [DrugController::class, 'upload'])->name('drug-excel-upload');
Route::get('/drug/create/import', [DrugController::class, 'import'])->name('drug-excel-import');


Route::get('/material/create', [MaterialController::class, 'index'])->name('material-create');
Route::post('/material/create', [MaterialController::class, 'create']);
Route::get('material/export/', [MaterialController::class, 'export']);
Route::post('material/import/', [MaterialController::class, 'import']);

Route::get('/producer/create', [ProducerController::class, 'index'])->name('producer-create');
Route::post('/producer/create', [ProducerController::class, 'create']);
Route::get('producer/export/', [ProducerController::class, 'export']);
Route::post('producer/import/', [ProducerController::class, 'import']);

Route::get('/drug/{id}', [PharmController::class, 'show_drug'])->name('search-drug');
Route::get('/pharm/{id}', [DrugController::class, 'show_pharm'])->name('search-pharm');

Route::get('/drug', [PharmController::class, 'index']);
Route::get('/pharm', [PharmController::class, 'index']);

Route::get('/tabledit/action/drug', [DrugController::class, 'index']);
Route::post('/tabledit/action/drug', [DrugController::class, 'action'])->name('tabledit_action_drug');


Route::get('/tabledit/action/pharm', [PharmController::class, 'index']);
Route::post('/tabledit/action/pharm', [PharmController::class, 'action'])->name('tabledit.action');
