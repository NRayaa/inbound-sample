<?php

use App\Http\Controllers\EkspedisiController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::resource('ekspedisi', EkspedisiController::class);

Route::get('inputExcel', function(){
    return view('inputExcel');
});

Route::post('/generateExcel', [EkspedisiController::class, 'processExcelFiles'])->name('generate-excel');

Route::post('/mergeExcel', [EkspedisiController::class, 'mapAndMergeHeaders'])->name('merge-excel'); 

Route::get('/barcodeForm',  [EkspedisiController::class, 'barcode']);

Route::post('/barcodeForm',  [EkspedisiController::class, 'barcodeSubmit'])->name('form-barcode');

// Route::post('/generate', [EkspedisiController::class, 'processExcelFile']); 
