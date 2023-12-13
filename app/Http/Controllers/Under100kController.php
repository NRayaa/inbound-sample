<?php

namespace App\Http\Controllers;

use App\Models\Under100k;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\ResponseResource;
use App\Models\TagWarna;
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
            'no_resi_lama' => $barcodeData['data1']['no_resi'], // Sesuaikan dengan struktur data sesi Anda
            'harga_lama' => $barcodeData['data1']['harga'], // Sesuaikan dengan struktur data sesi Anda
            'no_resi_baru' => Str::random(strlen($barcodeData['data1']['no_resi'])), // Sesuaikan dengan struktur data sesi Anda
        ]);

        // Log::info('Request Data:', $request->all());


        $validator = Validator::make($request->all(), [
            'tag_warna_id' => 'required',
            'nama_barang' => 'required',
            'diskon_id' => 'required',
            'harga_baru' => 'required',
            'kualitas_check' => 'required',
            'qty' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $tag_warna = TagWarna::find($request['tag_warna_id']);
        $request['harga_baru'] = $tag_warna->harga;



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
    public function edit(Request $request, Under100k $under100k)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Under100k $under100k)
    {
        $validator = Validator::make($request->all(), [
            'tag_warna_id' => 'required',
            'nama_barang' => 'required',
            'diskon_id' => 'required',
            'kualitas_check' => 'required',
            'qty' => 'required|integer',
            'generate_resi_baru' => 'nullable|boolean'
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        
        $updateData = $request->except(['generate_resi_baru', 'no_resi_baru']); 
        $tag_warna = TagWarna::find($request->tag_warna_id);

        $updateData['harga_baru'] = $tag_warna->harga;
    
        // Generate token baru apabila di checklist
        if ($request->filled('generate_resi_baru')) {
            $updateData['no_resi_baru'] = Str::random(strlen($under100k->no_resi_baru));
        }
    
        try {
           
            $under100k->update($updateData);
    
            return new ResponseResource(true, "Data berhasil di edit", $under100k);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan saat mengedit data.'], 500);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Under100k $under100k)
    {
        $under100k->delete();
        return new ResponseResource(true, "berhasil di hapus", $under100k);
    }
}
