<?php

use App\Http\Controllers\DiskonController;
use App\Http\Controllers\EkspedisiController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\Under100kController;
use App\Http\Controllers\Up100kController;
use App\Models\Ekspedisi;
use App\Models\Up100k;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('ekspedisi', EkspedisiController::class );
Route::post('/generateExcel', [EkspedisiController::class, 'processExcelFiles'])->name('generate-excel');
Route::post('/mergeExcel', [EkspedisiController::class, 'mapAndMergeHeaders'])->name('merge-excel'); 
Route::resource('/diskons', DiskonController::class); 
Route::get('/barcodeForm',  [EkspedisiController::class, 'barcode']); //ini controller view untuk form
Route::resource('/under100k',  Under100kController::class,); //ini controller untuk post menyimpan data dari view
Route::resource('/up100k',  Up100kController::class,); 
Route::get('/reports', [ReportsController::class, 'index']);


