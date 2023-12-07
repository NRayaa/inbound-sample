<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Result Merge</title>
</head>

<body>
    <table border="1">
        <!-- Header Row -->
        <tr>
            <th>NO_RESI</th>
            <th>NAMA</th>
            <th>QTY</th>
            <th>HARGA</th>
        </tr>
        <!-- Data Rows -->

        @foreach ($decodedResults as $result)
            <tr>
                <td>{{ isset($result['no_resi']) ? implode(', ', $result['no_resi']) : 'N/A' }}</td>
                <td>{{ isset($result['nama']) ? implode(', ', $result['nama']) : 'N/A' }}</td>
                <td>{{ isset($result['qty']) ? implode(', ', $result['qty']) : 'N/A' }}</td>
                <td>{{ isset($result['harga']) ? implode(', ', $result['harga']) : 'N/A' }}</td>

            </tr>
        @endforeach
    </table>
</body>

</html>
