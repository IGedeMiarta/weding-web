<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="card">
            <form action="{{ route('acara.post') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <span class="mb-3">Mempelai Pria</span>
                            <br>
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="l_name">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Panggilan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="l_nickname">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Ayah</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="l_ayah">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Ibu</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="l_ibu">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <textarea name="l_alamat" class="form-control" cols="30" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <span class="mb-3">Mempelai Wanita</span>
                            <br>
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="p_name">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Panggilan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="p_nickname">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Ayah</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="p_ayah">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Ibu</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="p_ibu">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <textarea name="l_alamat" class="form-control" cols="30" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Alamat Acara</label>
                        <div class="col-sm-10">
                            <textarea name="alamat" class="form-control" cols="30" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Google Map Link</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="maps">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Waktu Acara</label>
                        <div class="col-sm-10">
                            <input type="datetime-local" class="form-control" name="waktu">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <input type="submit" class="btn btn-success" name="submit">
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
    </script>
</body>

</html>
