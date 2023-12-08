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

        @foreach ($resultmerge as $result)
            <tr>
                <td>{{ $result['no_resi']}} </td>
                <td>{{ $result['nama'] }}</td>
                <td>{{ $result['qty']}}</td>
                <td>{{ $result['harga'] }}</td>

            </tr>
        @endforeach
    </table>
</body>

</html>
