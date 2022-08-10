<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <meta name="csrf-token" content="{{ csrf_token }}"> --}}
    <link rel="icon" href="../assets/img/surabaya.png">
    <style>
        table.static{
            position: relative;
            /* left: 3%; */
            border: 1px solid #b30b0b;
        }
    </style>
    <title>Cetak Data Barang</title>
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body>
    <div class="form-group">
        <p align="center"><b>Laporan Data Barang Per-Tanggal</b></p>   
    </div>
    
    <div class="car-body">
        <div class="input-group mb-3">
            <label for="label">Tanggal Awal</label>
            <input type="date" name="tglawal" id="tglawal" class="form-control">
        </div>
        <div class="input-group mb-3">
            <label for="label">Tanggal Akhir</label>
            <input type="date" name="tglakhir" id="tglakhir" class="form-control">

        </div>
        <div class="input-group mb-3">
            <a href="" onclick="this.href='/cetak-data-pertanggal'+document.getElementById('tglawal').value + '/' + document.getElementById('tglakhir').value" target="_blank" class="btn btn-primary col-md-12"> Cetak Data Pertanggal <i class="fas fa-print"></i></a> 
        </div>
    </div>
    
</body>
</html>