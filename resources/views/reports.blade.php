<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div>
        <label for="kualitas_check">Status Tidak Lolos QC:</label>
        <select name="kualitas_check" id="kualitas_check">
            <option value="discrepancy">Discrepancy</option>
            <option value="damage">Damage</option>
            <option value="abnormal">Abnormal</option>
            <option value="tk">TK - Tanpa Keterangan</option>
        </select>
    </div>
    <table>
        <tr>
            <th>Jumlah Data Awal</th>
            <td>{{ $jumlahDataAwal }}</td>
        </tr>
        <tr>
            <th>Jumlah Data Akhir</th>
            <td>{{ $jumlahDataAkhir }}</td>
        </tr>

        {{-- Kualitas Check --}}
        <tr>
            <th colspan="2">Jumlah Berdasarkan Kualitas Check</th>
        </tr>
        @foreach ($countKualitas as $kualitas => $jumlah)
            <tr>
                <td>{{ ucfirst($kualitas) }}</td>
                <td>{{ $jumlah }}</td>
            </tr>
        @endforeach

        {{-- Diskon --}}
        <tr>
            <th colspan="2">Jumlah Berdasarkan Diskon</th>
        </tr>
        @foreach ($countDiskon as $diskonId => $diskon)
        {{-- @dd(["diskonId" => $diskonId, "countDiskon" => $countDiskon, "diskon" => $diskon]); --}}
            <tr>
                <td>{{ $diskon['sub_diskon'] }}</td>
                <td>{{ $diskon['total'] }}</td>
            </tr>
        @endforeach

        {{-- Tag Warna --}}
        <tr>
            <th colspan="2">Jumlah Berdasarkan Tag Warna</th>
        </tr>
        @foreach ($warnaUnder100k as $warnaId => $warna)
            <tr>
                <td>{{ $warna['nama_warna'] }}</td>
                <td>{{ $warna['total'] }}</td>
            </tr>
        @endforeach
    </table>

</body>

</html>
