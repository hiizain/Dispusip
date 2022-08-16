<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="../assets/img/surabaya.png">
    <title>SIMBADA DISPUSIP Kota Surabaya</title>

    <!-- Custom fonts for this template -->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <div class="m-5 p-3">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-2 text-center">
                <img style="width: 60px" src="../assets/img/surabaya.png" alt="Logo Surabaya">
            </div>
            <div class="col-md-10 text-center">
                <h1 class="h3">Dinas Perpustakaan dan Kearsipan Kota Surabaya</h1>
                <h1 class="h6">Mall Pelayanan Publik Siola, Genteng, Kec. Genteng, Kota Surabaya, Jawa Timur - 60275</h1>
            </div>
        </div>
        <div class="pt-5">
            <table class="table table-bordered" align="center" id="" width="80%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="font-size: 12px" class="text-center">No.</th>
                        <th style="font-size: 12px" class="text-center">No Register</th>
                        <th style="font-size: 12px" class="text-center">Kode Barang</th>
                        <th style="font-size: 12px" class="text-center">Lokasi</th>
                        <th style="font-size: 12px" class="text-center">Nama Barang</th>
                        <th style="font-size: 12px" class="text-center">Satuan</th>
                        <th style="font-size: 12px" class="text-center">Merek</th>
                        <th style="font-size: 12px" class="text-center">Type</th>
                        <th style="font-size: 12px" class="text-center">Nilai Nominal</th>
                        <th style="font-size: 12px" class="text-center">Tahun Pengadaan</th>
                        <th style="font-size: 12px" class="text-center">Kondisi Barang</th>
                        <th style="font-size: 12px" class="text-center">Keberadaan Barang</th>
                        <th style="font-size: 12px" class="text-center">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($barang as $item)
                        <tr>
                            <td style="font-size: 12px" class="text-center">{{ $no }}</th>
                            <td style="font-size: 12px" class="text-center">{{ $item->NO_REGISTER }}</th>
                            <td style="font-size: 12px" class="text-center">{{ $item->KODE_BARANG }}</th>
                            <td style="font-size: 12px" class="text-center">{{ $item->lokasi->LOKASI }}</td>
                            <td style="font-size: 12px" class="text-center">{{ $item->NAMA_BARANG }}</th>
                            <td style="font-size: 12px" class="text-center">{{ $item->type->satuan->SATUAN }}</td>
                            <td style="font-size: 12px" class="text-center">{{ $item->merek->MEREK }}</td>
                            <td style="font-size: 12px" class="text-center">{{ $item->type->TYPE }}</td>
                            <td style="font-size: 12px" class="text-center">{{ "Rp " . number_format($item->HARGA,2,',','.') }}</td>
                            <td style="font-size: 12px" class="text-center">{{ $item->TAHUN_PENGADAAN }}</td>
                            @if ($item->KONDISI_BARANG === "1")
                                <td style="font-size: 12px" class="text-center">Baik</td>
                            @endif 
                            @if ($item->KONDISI_BARANG === "2")
                                <td style="font-size: 12px" class="text-center">Kurang Baik</td>
                            @endif 
                            @if ($item->KONDISI_BARANG === "3")
                                <td style="font-size: 12px" class="text-center">Rusak Berat</td>
                            @endif
                            @if ($item->KEBERADAAN_BARANG === "1")
                                <td style="font-size: 12px" class="text-center">Ada</td>
                            @else
                                <td style="font-size: 12px" class="text-center">Tidak Ada</td>
                            @endif
                            <td style="font-size: 12px" class="text-center">{{ $item->KETERANGAN }}</td>
                        </tr>
                    @php
                        $no++;
                    @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../assets/js/demo/datatables-demo.js"></script>
    <script src="../assets/js/aplikasi/petugas.js"></script>

    <script type="text/javascript">
        var css = '@page { size: landscape; }',
            head = document.head || document.getElementsByTagName('head')[0],
            style = document.createElement('style');

        style.type = 'text/css';
        style.media = 'print';

        if (style.styleSheet){
        style.styleSheet.cssText = css;
        } else {
        style.appendChild(document.createTextNode(css));
        }

        head.appendChild(style);

        window.print();
    </script>

</body>

</html>