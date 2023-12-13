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

                        <form action="/up100k" method="POST">
                            @csrf

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="sub_kategory1" name="diskon_id" value=1>
                                <label class="form-check-label" for="sub_kategory1">sub_kategory1</label>
                            </div>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="lolos1" name="kualitas_check" value="lolos">
                                <label class="form-check-label" for="lolos1">Lolos.</label>
                            </div>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="rusak1" name="kualitas_check" value="rusak">
                                <label class="form-check-label" for="rusak1"> Rusak.</label>
                            </div>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="discrepancy1" name="kualitas_check"
                                    value="discrepancy">
                                <label class="form-check-label" for="discrepancy1"> discrepancy1.</label>
                            </div>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="abnormal1" name="kualitas_check"
                                    value="abnormal">
                                <label class="form-check-label" for="abnormal1"> abnormal.</label>
                            </div>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="tk1" name="kualitas_check"
                                    value="tk">
                                <label class="form-check-label" for="tk1"> Tk.</label>
                            </div>


                            <div class="form-group">
                                <label for="nama">Nama:</label>
                                <input type="text" class="form-control" id="nama"value="{{ $data['nama'] ?? '' }}" name="nama_barang">
                            </div>

                            <div class="form-group">
                                <label for="price">Price:</label>
                                <input type="text" class="form-control" id="price" value="{{ $data['harga'] ?? '' }}" name="harga_lama">
                            </div>
                            <div class="form-group">
                                <label for="qty">qty:</label>
                                <input type="text" class="form-control" id="qty" value="{{ $data['qty'] ?? '' }}" name="qty">
                            </div>

                            <div class="form-group">
                                <label for="sub_kategory1">sub_kategory1:</label>
                                <input type="text" class="form-control" id="sub_kategory1" value="fashion">
                            </div>

                            <div class="form-group">
                                <label for="discount">Discount:</label>
                                <input type="text" class="form-control" id="discount" name="diskon" value=60 >
                            </div>

                            <div class="form-group">
                                <label for="price_after_discount">Price after Discount:</label>
                                <input type="text" class="form-control" id="price_after_discount" placeholder="disini nanti akan otomatis terisi">
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


                        <form action="/under100k" method="POST">
                            @csrf

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="sub_kategory" name="diskon_id" value=1>
                                <label class="form-check-label" for="sub_kategory">sub_kategory1</label>
                            </div>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="tag_warna1" name="tag_warna_id"
                                    value=1>
                                <label class="form-check-label" for="tag_warna1">Warna 1</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="tag_warna2" name="tag_warna_id"
                                    value=2>
                                <label class="form-check-label" for="tag_warna2">Warna 2</label>
                            </div>


                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="lolos2" name="kualitas_check"
                                    value="lolos">
                                <label class="form-check-label" for="lolos2">Lolos.</label>
                            </div>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="rusak2" name="kualitas_check"
                                    value="rusak">
                                <label class="form-check-label" for="rusak2"> Rusak.</label>
                            </div>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="discrepancy2"
                                    name="kualitas_check" value="discrepancy">
                                <label class="form-check-label" for="discrepancy2"> discrepancy2.</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="abnormal2" name="kualitas_check"
                                    value="abnormal">
                                <label class="form-check-label" for="abnormal2"> abnormal.</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="tk2" name="kualitas_check"
                                    value="tk">
                                <label class="form-check-label" for="tk2"> Tk.</label>
                            </div>

                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control"
                                    id="name"value="{{ $data1['nama'] ?? '' }}" name="nama_barang">
                            </div>


                            <div class="form-group">
                                <label for="qty">qty:</label>
                                <input type="text" class="form-control" id="qty"
                                    value="{{ $data1['qty'] ?? '' }}" name="qty">
                            </div>

                            {{-- <div class="form-group">
                                <label for="sub_kategory2">sub kategory</label>
                                <input type="text" class="form-control" id="sub_kategory2" name="sub_kategory">
                            </div> --}}

                            <div class="form-group">
                                <label for="harga_lama">Price:</label>
                                <input type="text" class="form-control" id="price"
                                    value="{{ old('harga_baru', $data1['harga'] ?? '') }}" name="harga_baru">

                            </div>
                            <button type="submit" class="btn btn-primary">Check</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkboxLolos1 = document.getElementById('lolos1');
            const checkboxRusak1 = document.getElementById('rusak1');
            const discrepancy1 = document.getElementById('discrepancy1');
            const abnormal1 = document.getElementById('abnormal1');
            const tk1 = document.getElementById('tk1');
            const checkboxLolos2 = document.getElementById('lolos2');
            const checkboxRusak2 = document.getElementById('rusak2');
            const discrepancy2 = document.getElementById('discrepancy2');
            const abnormal2 = document.getElementById('abnormal2');
            const tk2 = document.getElementById('tk2');
            const tagWarna1 = document.getElementById('tag_warna1');
            const tagWarna2 = document.getElementById('tag_warna2');

            checkboxLolos1.addEventListener('change', function() {
                if (this.checked) {
                    checkboxRusak1.checked = false;
                    discrepancy1.checked = false;
                    abnormal1.checked = false;
                    tk1.checked = false;
                }
            });
            checkboxLolos2.addEventListener('change', function() {
                if (this.checked) {
                    checkboxRusak2.checked = false;
                    discrepancy2.checked = false;
                    abnormal2.checked = false;
                    tk2.checked = false;
                }
            });

            checkboxRusak1.addEventListener('change', function() {
                if (this.checked) {
                    checkboxLolos1.checked = false;
                    discrepancy1.checked = false;
                    abnormal1.checked = false;
                    tk1.checked = false;
                }
            });
            checkboxRusak2.addEventListener('change', function() {
                if (this.checked) {
                    checkboxLolos2.checked = false;
                    discrepancy2.checked = false;
                    abnormal2.checked = false;
                    tk2.checked = false;
                }
            });

            discrepancy1.addEventListener('change', function() {
                if (this.checked) {
                    checkboxLolos1.checked = false;
                    checkboxRusak1.checked = false;
                    abnormal1.checked = false;
                    tk1.checked = false;
                }
            });
            discrepancy2.addEventListener('change', function() {
                if (this.checked) {
                    checkboxLolos2.checked = false;
                    checkboxRusak2.checked = false;
                    abnormal2.checked = false;
                    tk2.checked = false;
                }
            });

            abnormal1.addEventListener('change', function() {
                if (this.checked) {
                    checkboxLolos1.checked = false;
                    checkboxRusak1.checked = false;
                    discrepancy1.checked = false;
                    tk1.checked = false;
                }
            });
            abnormal2.addEventListener('change', function() {
                if (this.checked) {
                    checkboxLolos2.checked = false;
                    checkboxRusak2.checked = false;
                    discrepancy2.checked = false;
                    tk2.checked = false;
                }
            });

            tk1.addEventListener('change', function() {
                if (this.checked) {
                    checkboxLolos1.checked = false;
                    checkboxRusak1.checked = false;
                    discrepancy1.checked = false;
                    abnormal1.checked = false;
                }
            });
            tk2.addEventListener('change', function() {
                if (this.checked) {
                    checkboxLolos2.checked = false;
                    checkboxRusak2.checked = false;
                    discrepancy2.checked = false;
                    abnormal2.checked = false;
                }
            });

            tagWarna1.addEventListener('change', function() {
                if (this.checked) {
                    tagWarna2.checked = false;
                }
            });

            tagWarna2.addEventListener('change', function() {
                if (this.checked) {
                    tagWarna1.checked = false;
                }
            });
        });
    </script>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>



</body>

</html>
