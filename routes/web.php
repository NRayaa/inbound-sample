<?php

use App\Models\Up100k;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Up100kController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\EkspedisiController;
use App\Http\Controllers\Under100kController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('ekspedisi', EkspedisiController::class);

Route::get('inputExcel', function(){
    return view('inputExcel');
});

Route::post('/generateExcel', [EkspedisiController::class, 'processExcelFiles'])->name('generate-excel');

Route::post('/mergeExcel', [EkspedisiController::class, 'mapAndMergeHeaders'])->name('merge-excel'); 

Route::get('/barcodeForm',  [EkspedisiController::class, 'barcode']);//ini controller view untuk form
Route::resource('/under100k',  Under100kController::class,); //ini controller untuk post menyimpan data dari view
Route::resource('/up100k',  Up100kController::class);
Route::get('/reports', [ReportsController::class, 'index']);


// Route::post('/generate', [EkspedisiController::class, 'processExcelFile']); 
