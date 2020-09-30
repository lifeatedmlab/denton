<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>EDE Laboratory</title>
    <link href="{{'assets/css/bootstrap.css'}}" rel="stylesheet">
    <link href="{{'assets/css/custom.css'}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@700&family=Source+Sans+Pro&display=swap"
          rel="stylesheet">
</head>
<body class="form-body">
<div class="container">
    <div class="form-container p-5 card">
        <div class="card-header">
            <h1 class="title">
                FORM <br> -REGISTRASI
            </h1>
            <h5 class="sub-title">
                ede laboratory open mind
            </h5>
{{--            <p class="p-subtitle">Minggu, 4 Oktober 2020</p>--}}
        </div>
        <div class="card-body">
            <div class="col-lg-8 col-md-8 col-sm-12">
                <form action="">
                    <div class="form-group form-content mt-4">
                        <label for="nama" class="mb-3">Nama</label>
                        <input type="text" class="form-control-lg form-control" id="nama" placeholder="Nama">
                    </div>
                    <div class="form-group form-content mt-4">
                        <label for="nim" class="mb-3">NIM</label>
                        <input type="number" class="form-control-lg form-control" id="nim" placeholder="1202190000">
                    </div>
                    <div class="form-group form-content mt-4">
                        <label for="email" class="mb-3">E-mail</label>
                        <input type="email" class="form-control-lg form-control" id="email" placeholder="name@domain.com">
                    </div>
                    <div class="form-group form-content mt-4">
                        <label for="angkatan" class="mb-3">Angkatan</label>
                        <select name="angkatan" id="angkatan" class="form-select-lg form-select">
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                        </select>
                    </div>
                    <div class="form-group form-content mt-5">
                        <button type="submit" class="btn btn-lg btn-primary btn-submit btn-block">SUBMIT</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


<script
        crossorigin="anonymous"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script crossorigin="anonymous" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

<script src="{{'assets/js/bootstrap.bundle.js'}}">

</script>
</body>
</html>
