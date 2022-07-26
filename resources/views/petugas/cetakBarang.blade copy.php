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
            border: 1px solid #000000;
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <title>Cetak Data Barang</title>
</head>
<body>
    <div class="form-group">
        <p align="center"><b>Laporan Data Barang</b></p>
        <?php
                                    use Illuminate\Support\Facades\Auth;
                                    use App\User;
                                    $nip = Auth::user()->nip;
                                    $user = User::where('nip', $nip)->first();
                                ?>
                                <div class="form-group row">
                                    <div class="col-md-1"align="right">Nama</div>
                                    <div class="col-md-1"align="right">:</div>
                                    <div class="col-md-1"align="left"><?= $user->NAMA; ?></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"align="right">Sebagai</div>
                                    <div class="col-md-1"align="right">:</div>
                                    <div class="col-md-1"align="left"><?= $user->role->ROLE;?></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"align="right">Jabatan</div>
                                    <div class="col-md-1"align="right">:</div>
                                    <div class="col-md-1"align="left"><?= $user->jabatan->JABATAN; ?></div>
                                </div>
                                <br>
        <table class="static" align="center" rules="all" border="1px" style="width:95%;">
            <tr>
                <th class="text-center">No.</th>
                <th class="text-center">No Register</th>
                <th class="text-center">Kode Barang</th>
                <th class="text-center">Lokasi</th>
                <th class="text-center">Nama Barang</th>
                <th class="text-center">Satuan</th>
                <th class="text-center">Merek</th>
                <th class="text-center">Type</th>
                <th class="text-center">Nilai Nominal</th>
                <th class="text-center">Tahun Pengadaan</th>
                <th class="text-center">Kondisi Barang</th>
                <th class="text-center">Keberadaan Barang</th>
                <th class="text-center">Keterangan</th>
            </tr>
            @php
                $no = 1;
            @endphp
            @foreach ($barang as $item)
            <tr>
                <td class="text-center">{{ $no }}</td>
                <td class="text-center">{{ $item->NO_REGISTER }}</td>
                <td class="text-center">{{ $item->KODE_BARANG }}</td>
                <td class="text-center">{{ $item->lokasi->LOKASI }}</td>
                <td class="text-center">{{ $item->NAMA_BARANG }}</td>
                <td class="text-center">{{ $item->type->satuan->SATUAN }}</td>
                <td class="text-center">{{ $item->merek->MEREK }}</td>
                <td class="text-center">{{ $item->type->TYPE }}</td>
                <td class="text-center">{{ "Rp " . number_format($item->HARGA,2,',','.') }}</td>
                <td class="text-center">{{ $item->TAHUN_PENGADAAN }}</td>
                @if ($item->KONDISI_BARANG === "1")
                    <td class="text-center">Baik</td>
                @endif 
                @if ($item->KONDISI_BARANG === "2")
                    <td class="text-center">Kurang Baik</td>
                @endif 
                @if ($item->KONDISI_BARANG === "3")
                    <td class="text-center">Rusak Berat</td>
                @endif
                @if ($item->KEBERADAAN_BARANG === "1")
                    <td class="text-center">Ada</td>
                @else
                    <td class="text-center">Tidak Ada</td>
                @endif
                <td class="text-center">{{ $item->KETERANGAN }}</td>
            </tr>
            @php
                $no++;
            @endphp
            @endforeach
        </table>
    </div>
    
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>