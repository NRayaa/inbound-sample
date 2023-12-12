<?php

use App\Http\Controllers\DiskonController;
use App\Http\Controllers\EkspedisiController;
use App\Models\Ekspedisi;
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
Route::get('/barcodeForm',  [EkspedisiController::class, 'barcode']);

