<?php

namespace App\Http\Controllers;

use App\Models\Diskon;
use App\Models\Up100k;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\ResponseResource;
use Illuminate\Support\Facades\Validator;

class Up100kController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $up100ks = Up100k::latest()->paginate(50);

        return new ResponseResource(true, "list harga di atas 100k", $up100ks);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $barcodeData = session('barcodeData');

        $request->merge([
            'no_resi_lama' => $barcodeData['data']['no_resi'], // Sesuaikan dengan struktur data sesi Anda
            'harga_lama' => $barcodeData['data']['harga'], // Sesuaikan dengan struktur data sesi Anda
            'no_resi_baru' => Str::random(strlen($barcodeData['data']['no_resi'])), // Sesuaikan dengan struktur data sesi Anda
        ]);

        // Log::info('Request Data:', $request->all());

        $validator = Validator::make($request->all(), [
            'nama_barang' => 'required',
            'diskon_id' => 'required',
            'kualitas_check' => 'required',
            'qty' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // $diskon = Diskon::find($request->sub_kategory);
        // $request['diskon'] = $diskon->diskon;
        $request['harga_baru'] = $request['harga_lama'] - ($request['harga_lama'] * ($request['diskon'] / 100));

        Log::info('Request Data:', $request->all());

        try {
            $insert = Up100k::create($request->all());
            session()->forget('barcodeData');
            return new ResponseResource(true, "Data berhasil ditambahkan", $insert);
        } catch (\Exception $e) {
            // Log detail eksepsi
            Log::error('Error in Up100k::create', [
                'error' => $e->getMessage(),
                'stackTrace' => $e->getTraceAsString()
            ]);
            return response()->json(['error' => 'Gagal menyimpan data.'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Up100k $up100k)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Up100k $up100k)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Up100k $up100k)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Up100k $up100k)
    {
        //
    }
}
