<?php

namespace App\Http\Controllers;

use Log;
// use Illuminate\Support\Facades\DB;
use App\Models\Ekspedisi;
use App\Models\ResultFilter;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Http\Resources\ResponseResource;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\Reader\Exception as ReaderException;


class EkspedisiController extends Controller
{



    public function index()
    {
        $resultmerge = ResultFilter::all();

        //view
        return view('result', compact('resultmerge'));

        //api
        // return new ResponseResource(true, "list data merge", $resultmerge);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inputExcel');
    }

    public function processExcelFiles(Request $request)
    {
        $request->validate([
            'files.*' => 'required|file|mimes:xlsx,xls'
        ]);

        $files = $request->file('files');
        $headers = [];
        $templateHeaders = ["no_resi", "nama", "qty", "harga"];

        foreach ($files as $file) {
            $filePath = $file->getPathname();
            $fileName = $file->getClientOriginalName();

            $header = []; 

            try {
                $spreadsheet = IOFactory::load($filePath);
                $sheet = $spreadsheet->getActiveSheet();

                foreach ($sheet->getRowIterator(1, 1) as $row) {
                    $cellIterator = $row->getCellIterator();
                    $cellIterator->setIterateOnlyExistingCells(false);

                    foreach ($cellIterator as $cell) {
                        $value = $cell->getValue();
                        if (!is_null($value) && $value !== '') {
                            $header[] = $value;
                        }
                    }
                }

                $headers[$fileName] = $header;

                foreach ($sheet->getRowIterator(2) as $row) {
                    $rowData = [];
                    $cellIterator = $row->getCellIterator();
                    $cellIterator->setIterateOnlyExistingCells(false);

                    foreach ($cellIterator as $cell) {
                        $value = $cell->getValue();
                        if (!is_null($value)) {
                            $rowData[] = $value;
                        }
                    }

                    if (count($header) == count($rowData)) {
                        $jsonRowData = json_encode(array_combine($header, $rowData));
                        Ekspedisi::create(['data' => $jsonRowData]);
                    }
                }
            } catch (ReaderException $e) {
                return back()->with('error', 'Error processing file: ' . $e->getMessage());
            }
        }

        return response()->view('excelData', ['headers' => $headers, 'templateHeaders' => $templateHeaders]);

        // return new ResponseResource(true, "berhasil", ['headers' => $headers,  'templateHeaders' =>$templateHeaders]);
    }

    public function mapAndMergeHeaders(Request $request)
    {
        // Validasi input request
        $validator = Validator::make($request->all(), [
            'headerMappings' => 'required|array',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $headerMappings = $request->input('headerMappings');

        //contoh untuk nanti di api aja
        // $headerMappings = [
        //     'no_resi' => ['AWB'],
        //     'nama' => ['Desc'],
        //     'qty' => ['NO'],
        //     'harga' => ['Value']
        // ];


        $mergedData = [
            'no_resi' => [],
            'nama' => [],
            'qty' => [],
            'harga' => []
        ];


        $ekspedisiData = Ekspedisi::all()->map(function ($item) {
            return json_decode($item->data, true);
        });

        // dd($ekspedisiData);

        foreach ($headerMappings as $templateHeader => $selectedHeaders) {
            foreach ($selectedHeaders as $userSelectedHeader) {
                // Kumpulkan nilai untuk header yang dipilih dari semua baris ekspedisi
                $ekspedisiData->each(function ($dataItem) use ($userSelectedHeader, &$mergedData, $templateHeader) {
                    if (isset($dataItem[$userSelectedHeader])) {
                        array_push($mergedData[$templateHeader], $dataItem[$userSelectedHeader]);
                    }
                });
            }
        }

        foreach ($mergedData['no_resi'] as $index => $noResi) {
            $nama = $mergedData['nama'][$index] ?? null;
            $qty = $mergedData['qty'][$index] ?? null;
            $harga = $mergedData['harga'][$index] ?? null;

            $resultEntry = new ResultFilter([
                'no_resi' => $noResi,
                'nama' => $nama,
                'qty' => $qty,
                'harga' => $harga
            ]);
            $resultEntry->save();
        }

        //view
        return response()->json(['message' => 'Data has been merged and saved successfully.']);

        //api
        // return new ResponseResource(true, "berhasil menggabungkan data", $resultEntry);
    }

    public function barcode(Request $request)
    {
        $data = collect();
        $data1 = collect(); 
        if ($request->has('barcode') && !empty($request->barcode)) {
            $exec = ResultFilter::where('no_resi', $request->barcode)->latest()->first();
            if($exec['harga'] > 100000) {
                $data = $exec;
            }else {
                $data1 = $exec;
            }
        }
        session(["barcodeData" => ['data' => $data, 'data1' => $data1]]);
        

        return new ResponseResource(true, "data", [$data, $data1]); 
        // return view('formBarcode', ['data' => $data, 'data1' => $data1]); // Kembalikan kedua set data ke view
        
    }
    
}
