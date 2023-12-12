<?php

namespace App\Http\Controllers;

use App\Http\Resources\ResponseResource;
use App\Models\Diskon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DiskonController extends Controller
{
    public function index()
    {
        $diskons = Diskon::latest()->paginate(50);
        return new ResponseResource(true, "List diskon", $diskons);
    }

    public function show(Diskon $diskon)
    {
        return new ResponseResource(true, "Detail diskon", $diskon);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fashion' => 'nullable|integer',
            'otomotif' => 'nullable|integer',
            'toys_hobbies_a' => 'nullable|integer',
            'art' => 'nullable|integer',
            'toys_hobbies_b' => 'nullable|integer',
            'others_fmcg' => 'nullable|integer',
            'elektronic_art' => 'nullable|integer',
            'mainan_hv' => 'nullable|integer',
            'perlengkapan_bayi' => 'nullable|integer',
            'beauty' => 'nullable|integer',
            'electronic_hv' => 'nullable|integer',
        ]);

        if ($validator->fails()){
            return response()->json(['errors' => $validator->errors()], 422);
        };

        $diskon = Diskon::create($request->all());

        return new ResponseResource(true, "Diskon created successfully", $diskon);
    }

    public function update(Request $request, Diskon $diskon)
    {
        $validator = Validator::make($request->all(), [
            'fashion' => 'nullable|integer',
            'otomotif' => 'nullable|integer',
            'toys_hobbies_a' => 'nullable|integer',
            'art' => 'nullable|integer',
            'toys_hobbies_b' => 'nullable|integer',
            'others_fmcg' => 'nullable|integer',
            'elektronic_art' => 'nullable|integer',
            'mainan_hv' => 'nullable|integer',
            'perlengkapan_bayi' => 'nullable|integer',
            'beauty' => 'nullable|integer',
            'electronic_hv' => 'nullable|integer',
        ]);

        if ($validator->fails()){
            return response()->json(['errors' => $validator->errors()], 422);
        };

        $diskon->update($request->all());

        return new ResponseResource(true, "Diskon updated successfully", $diskon);
    }

    public function destroy(Diskon $diskon)
    {
        $diskon->delete();

        return new ResponseResource(true, "Diskon deleted successfully", null);
    }
}
