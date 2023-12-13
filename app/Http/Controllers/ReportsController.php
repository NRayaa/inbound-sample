<?php

namespace App\Http\Controllers;

use App\Http\Resources\ResponseResource;
use App\Models\Up100k;
use App\Models\Under100k;
use App\Models\ResultFilter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    public function index()
    {
        $jumlahDataAwal = ResultFilter::count();

        //up100k
        $totalItemUp100k = Up100k::count();

        $qcCountUp100k = Up100k::query()
            ->select('kualitas_check', DB::raw('count(*) as total'))
            ->groupBy('kualitas_check')->get()->pluck('total', 'kualitas_check');

        // $diskontUp100k = Up100k::query()
        //     ->select('diskon_id', DB::raw('count(*) as total'))
        //     ->groupBy('diskon_id')
        //     ->get()
        //     ->pluck('total', 'diskon_id');

        $diskontUp100k = Up100k::query()
            ->join('diskons', 'up100ks.diskon_id', '=', 'diskons.id')
            ->select('diskons.nama as nama', 'diskons.id as diskon_id', DB::raw('count(up100ks.id) as total'))
            ->groupBy('diskons.id', 'diskons.nama')
            ->get()
            ->keyBy('diskon_id')
            ->map(function ($item) {
                return ['sub_diskon' => $item->nama, 'total' => $item->total];
            });



        //under100k
        $totalItemUnder100k = Under100k::count();

        // $warnaUnder100k = Under100k::query()->select('tag_warna_id', DB::raw('count(*) as total'))
        // ->groupBy('tag_warna_id')->get()->pluck('total', 'tag_warna_id');

        $warnaUnder100k = Under100k::query()
            ->join('tag_warnas', 'under100ks.tag_warna_id', '=', 'tag_warnas.id')
            ->select('tag_warnas.nama as warna', 'tag_warnas.id as tag_warna_id', DB::raw('count(under100ks.id) as total'))
            ->groupBy('tag_warnas.id', 'tag_warnas.nama')
            ->get()
            ->keyBy('tag_warna_id')
            ->map(function ($item) {
                return ['nama_warna' => $item->warna, 'total' => $item->total];
            });


        $qcCountUnder100k = Under100k::query()
            ->select('kualitas_check', DB::raw('count(*) as total'))
            ->groupBy('kualitas_check')->get()->pluck('total', 'kualitas_check');

        $diskontUnder100k = Under100k::query()
            ->join('diskons', 'under100ks.diskon_id', '=', 'diskons.id')
            ->select('diskons.nama as nama', 'diskons.id as diskon_id', DB::raw('count(under100ks.id) as total'))
            ->groupBy('diskons.id', 'diskons.nama')
            ->get()
            ->keyBy('diskon_id')
            ->map(function ($item) {
                return ['sub_diskon' => $item->nama, 'total' => $item->total];
            });

        // $diskontUnder100k = Under100k::query()
        //     ->select('diskon_id', DB::raw('count(*) as total'))
        //     ->groupBy('diskon_id')
        //     ->get()
        //     ->pluck('total', 'diskon_id');

        //data akhir
        $jumlahDataAkhir = $totalItemUnder100k + $totalItemUp100k;

        // Menggabungkan dan menjumlahkan totalnya
        $countKualitas = [];
        $countDiskon = [];

        //count kualitas check

        foreach ($qcCountUp100k as $kualitas => $count) {
            $countKualitas[$kualitas] = $count + ($qcCountUnder100k[$kualitas] ?? 0);
        }

        foreach ($qcCountUnder100k as $kualitas => $count) {
            if (!isset($countKualitas[$kualitas])) {
                $countKualitas[$kualitas] = $count;
            }
        }

        //count diskon

        foreach ($diskontUp100k as $diskonId => $countUp) {
            // dd([
            //     'diskonId' => $diskonId,
            //     'countFromUp100k' => $count, // Ini harusnya integer
            //     'countFromUnder100k' => $diskontUnder100k[$diskonId] ?? 0, // Ini juga harusnya integer
            // ]);
            // $countDiskon[$diskonId] = $countUp + ($diskontUnder100k[$diskonId]['total'] ?? 0);
            $countDiskon[$diskonId] = $countUp + ($diskontUnder100k[$diskonId] ?? 0);
        }

        foreach ($diskontUnder100k as $diskonId => $count) {
            if (!isset($countDiskon[$diskonId])) {
                $countDiskon[$diskonId] = $count;
            }
        }

        //api
        // return new ResponseResource(true, "list data laporan", [
        //     'jumlah_data_awal' => $jumlahDataAwal,
        //     'jumlah_data_akhir' => $jumlahDataAkhir,
        //     'jumlah_berdasarkan_kualitas_check' => $countKualitas,
        //     'jumlah_berdasarkan_diskon' => $countDiskon,
        //     'jumlah_berdasarkan_tag_warna' => $warnaUnder100k,
        // ]);

        // //view
        // dd([
        //     'jumlahDataAwal' => $jumlahDataAwal,
        //     'jumlahDataAkhir' => $jumlahDataAkhir,
        //     'countKualitas' => $countKualitas,
        //     'countDiskon' => $countDiskon,
        //     'warnaUnder100k' => $warnaUnder100k,
        // ]);
        return view('reports', [
            'jumlahDataAwal' => $jumlahDataAwal,
            'jumlahDataAkhir' => $jumlahDataAkhir,
            'countKualitas' => $countKualitas,
            'countDiskon' => $countDiskon,
            'warnaUnder100k' => $warnaUnder100k,
        ]);
    }
}
