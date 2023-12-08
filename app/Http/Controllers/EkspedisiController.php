<?php

namespace App\Http\Controllers;

use App\Models\Ekspedisi;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Http\Resources\ResponseResource;
use App\Models\ResultFiter;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\Reader\Exception as ReaderException;


class EkspedisiController extends Controller
{



    public function index()
    {
        $resultmerge = ResultFiter::all();

        return view('result', compact('resultmerge'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inputExcel');
    }

    public function processExcelFiles(Request $request): Response
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

            $header = []; // Reset header di sini

            try {
                $spreadsheet = IOFactory::load($filePath);
                $sheet = $spreadsheet->getActiveSheet();

                // Membaca header
                foreach ($sheet->getRowIterator(1, 1) as $row) {
                    $cellIterator = $row->getCellIterator();
                    $cellIterator->setIterateOnlyExistingCells(false);

                    foreach ($cellIterator as $cell) {
                        $value = $cell->getValue();
                        // Tambahkan hanya jika value bukan null dan bukan string kosong
                        if (!is_null($value) && $value !== '') {
                            $header[] = $value;
                        }
                    }
                }

                // Menyimpan header dengan nama file
                $headers[$fileName] = $header;

                foreach ($sheet->getRowIterator(2) as $row) {
                    $rowData = [];
                    $cellIterator = $row->getCellIterator();
                    $cellIterator->setIterateOnlyExistingCells(false);

                    foreach ($cellIterator as $cell) {
                        $value = $cell->getValue();
                        // Tambahkan nilai ke rowData hanya jika tidak null
                        if (!is_null($value)) {
                            $rowData[] = $value;
                        }
                    }

                    // Pastikan jumlah elemen sama sebelum menggunakan array_combine
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
        // return new ResponseResource(true, "berhasil", $headers);
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

        // Pemetaan header yang diberikan oleh pengguna
        $headerMappings = $request->input('headerMappings');

        // Inisialisasi array untuk hasil akhir
        $mergedData = [
            'no_resi' => [],
            'nama' => [],
            'qty' => [],
            'harga' => []
        ];


        // Ambil semua data dari tabel ekspedisis
        $ekspedisiData = Ekspedisi::all()->map(function ($item) {
            return json_decode($item->data, true);
        });

        // dd($ekspedisiData);

        // Looping melalui setiap header yang dipilih pengguna dan ekstrak data
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

            // Membuat entri baru
            $resultEntry = new ResultFiter([
                'no_resi' => $noResi,
                'nama' => $nama,
                'qty' => $qty,
                'harga' => $harga
            ]);

            // Menyimpan entri ke database
            $resultEntry->save();
        }


        return response()->json(['message' => 'Data has been merged and saved successfully.']);
    }

    public function barcode(Request $request)
    {
        $data = collect();
        $data1 = collect(); 
        if ($request->has('barcode1') && !empty($request->barcode1)) {
            $data = ResultFiter::where('no_resi', $request->barcode1)->latest()->first();

        } elseif ($request->has('barcode2') && !empty($request->barcode2)) {
            $data1 = ResultFiter::where('no_resi', $request->barcode2)->latest()->first();

        }
        return view('formBarcode', ['data' => $data, 'data1' => $data1]); // Kembalikan kedua set data ke view

    
    }
    
}
