{{-- resources/views/your-form.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Styled Form</title>
    <!-- Include Bootstrap CSS from a CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <center><h3>form 1</h3></center>
                        <form action="/barcodeForm" method="get">
                            <div class="form-group">
                                <label for="barcode">Barcode:</label>
                                <input type="text" class="form-control" id="barcode" name="barcode1">
                            </div>
                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>
                        
                        <form action="/inputBarcode" method="POST">

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="subkategori1" name="subkategori1">
                                <label class="form-check-label" for="subkategori1">Sub Kategori 1 - Lolos.</label>
                            </div>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="subkategori2" name="subkategori2">
                                <label class="form-check-label" for="subkategori2">Sub Kategori 2 - Rusak.</label>
                            </div>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="subkategori3" name="subkategori3">
                                <label class="form-check-label" for="subkategori3">Sub Kategori 3</label>
                            </div>

                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name"value="{{ $data['nama'] ?? '' }}">
                            </div>

                            <div class="form-group">
                                <label for="price">Price:</label>
                                <input type="text" class="form-control" id="price" value="{{ $data['harga'] ?? '' }}">
                            </div>

                            <div class="form-group">
                                <label for="discount">Discount:</label>
                                <input type="text" class="form-control" id="discount" name="discount" value="{{ $data['diskon'] ?? '' }}">
                            </div>

                            <div class="form-group">
                                <label for="price_after_discount">Price after Discount:</label>
                                <input type="text" class="form-control" id="price_after_discount" name="price_after_discount" >
                            </div>
                            <button type="submit" class="btn btn-primary">Check</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <center><h3>form 2</h3></center>
                        <form action="/barcodeForm" method="get">
                            <div class="form-group">
                                <label for="barcode">Barcode:</label>
                                <input type="text" class="form-control" id="barcode" name="barcode2">
                            </div>
                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>
                        
                        <form action="/inputBarcode2" method="POST">

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="subkategori1" name="subkategori1">
                                <label class="form-check-label" for="subkategori1">Sub Kategori 1 - Lolos.</label>
                            </div>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="subkategori2" name="subkategori2">
                                <label class="form-check-label" for="subkategori2">Sub Kategori 2 - Rusak.</label>
                            </div>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="subkategori3" name="subkategori3">
                                <label class="form-check-label" for="subkategori3">Sub Kategori 3</label>
                            </div>

                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name"value="{{ $data1['nama'] ?? '' }}">
                            </div>

                            <div class="form-group">
                                <label for="price">Price:</label>
                                <input type="text" class="form-control" id="price" value="{{ $data1['harga'] ?? '' }}">
                            </div>

                            <div class="form-group">
                                <label for="discount">Discount:</label>
                                <input type="text" class="form-control" id="discount" name="discount" value="{{ $data['diskon'] ?? '' }}">
                            </div>

                            <div class="form-group">
                                <label for="price_after_discount">Price after Discount:</label>
                                <input type="text" class="form-control" id="price_after_discount" name="price_after_discount" >
                            </div>
                            <button type="submit" class="btn btn-primary">Check</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

</body>

</html>
