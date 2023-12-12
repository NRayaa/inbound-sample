<?php

namespace App\Http\Controllers;

use App\Models\Under100k;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Resources\ResponseResource;
use Illuminate\Support\Facades\Validator;

class Under100kController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $under100ks = Under100k::latest()->paginate(50);
        return new ResponseResource(true, "list barang harga dibawah 100k", $under100ks);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

  

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $barcodeData = session('barcodeData');
    
        $request->merge([
            'no_resi_lama' => $barcodeData->no_resi,
            'qty' => $barcodeData->qty,
            'nama' => $barcodeData->nama,
            'price' => $barcodeData->price,
            'no_resi_baru' => Str::random(strlen($barcodeData->no_resi))
        ]);
    
        $validator = Validator::make($request->all(), [
            'tag_warna' => 'required',
            'nama_barang' => 'required',
            'qty' => 'required|numeric',
            'harga_lama' => 'required',
            'sub_kategory' => 'required',
            'harga_baru' => 'required',
            'kualitas_check' => 'required'
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        try {
            $insert = Under100k::create($request->all());
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal menyimpan data.'], 500);
        }
    
        session()->forget('barcodeData');
    
        return new ResponseResource(true, "Data berhasil ditambahkan", $insert);
    }

    /**
     * Display the specified resource.
     */
    public function show(Under100k $under100k)
    {
        return new ResponseResource(true, "data", $under100k);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Under100k $under100k)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Under100k $under100k)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Under100k $under100k)
    {
        //
    }
}

