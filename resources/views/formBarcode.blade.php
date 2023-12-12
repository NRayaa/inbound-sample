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
    <center>
        <form action="/barcodeForm" method="get">
            <div class="form-group">
                <label for="barcode">Barcode:</label>
                <input type="text" class="form-control" id="barcode" name="barcode">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

    </center>



    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <center>
                            <h3>form 1</h3>
                        </center>

                        <form action="/inputBarcode" method="POST">

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="subkategori1" name="subkategori1">
                                <label class="form-check-label" for="subkategori1">Sub Kategori 1 </label>
                            </div>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="lolos1" name="lolos1">
                                <label class="form-check-label" for="lolos1">Lolos.</label>
                            </div>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="rusak1" name="rusak1">
                                <label class="form-check-label" for="rusak1"> Rusak.</label>
                            </div>


                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control"
                                    id="name"value="{{ $data['nama'] ?? '' }}">
                            </div>

                            <div class="form-group">
                                <label for="price">Price:</label>
                                <input type="text" class="form-control" id="price"
                                    value="{{ $data['harga'] ?? '' }}">
                            </div>
                            <div class="form-group">
                                <label for="sub_kategory1">sub_kategory1:</label>
                                <input type="text" class="form-control" id="sub_kategory1"
                                    value="{{ $data['sub_kategory1'] ?? '' }}">
                            </div>

                            <div class="form-group">
                                <label for="discount">Discount:</label>
                                <input type="text" class="form-control" id="discount" name="discount"
                                    value="{{ $data['diskon'] ?? '' }}">
                            </div>

                            <div class="form-group">
                                <label for="price_after_discount">Price after Discount:</label>
                                <input type="text" class="form-control" id="price_after_discount"
                                    name="price_after_discount">
                            </div>
                            <button type="submit" class="btn btn-primary">Input</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <center>
                            <h3>form 2</h3>
                        </center>


                        <form action="/inputBarcode2" method="POST">

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="subkategori1" name="subkategori1">
                                <label class="form-check-label" for="subkategori1">Sub Kategori 1.</label>
                            </div>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="tag_warna1" name="tag_warna1">
                                <label class="form-check-label" for="tag_warna1">Warna 1</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="tag_warna2" name="tag_warna2">
                                <label class="form-check-label" for="tag_warna2">Warna 2</label>
                            </div>


                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="lolos2" name="lolos2">
                                <label class="form-check-label" for="lolos2">Lolos.</label>
                            </div>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="rusak2" name="rusak2">
                                <label class="form-check-label" for="rusak2"> Rusak.</label>
                            </div>

                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control"
                                    id="name"value="{{ $data1['nama'] ?? '' }}">
                            </div>

                            <div class="form-group">
                                <label for="price">Price:</label>
                                <input type="text" class="form-control" id="price"
                                    value="{{ $data1['harga'] ?? '' }}">
                            </div>

                           

                            <div class="form-group">
                                <label for="sub_kategory2">sub kategory</label>
                                <input type="text" class="form-control" id="sub_kategory2"
                                    name="sub_kategory2">
                            </div>
                            <button type="submit" class="btn btn-primary">Check</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const checkboxLolos1 = document.getElementById('lolos1');
            const checkboxRusak1 = document.getElementById('rusak1');
            const checkboxLolos2 = document.getElementById('lolos2');
            const checkboxRusak2 = document.getElementById('rusak2');
            const tagWarna1 = document.getElementById('tag_warna1');
            const tagWarna2 = document.getElementById('tag_warna2');
    
            checkboxLolos1.addEventListener('change', function () {
                if (this.checked) {
                    checkboxRusak1.checked = false;
                }
            });
    
            checkboxRusak1.addEventListener('change', function () {
                if (this.checked) {
                    checkboxLolos1.checked = false;
                }
            });
            checkboxLolos2.addEventListener('change', function () {
                if (this.checked) {
                    checkboxRusak2.checked = false;
                }
            });
    
            checkboxRusak2.addEventListener('change', function () {
                if (this.checked) {
                    checkboxLolos2.checked = false;
                }
            });
            tagWarna1.addEventListener('change', function () {
                if (this.checked) {
                    tagWarna1.checked = false;
                }
            });
            tagWarna2.addEventListener('change', function () {
                if (this.checked) {
                    tagWarna2.checked = false;
                }
            });
        });
    </script>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    

</body>

</html>
