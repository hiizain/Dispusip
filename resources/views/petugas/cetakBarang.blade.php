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
            border: 1px solid #0b2ab3;
        }
    </style>
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
                                <div>
                                    <center>
                                    <span class="mr-2 d-none d-lg-inline text-gray-800 normal"><?= $user->NAMA; ?></span><br>
                                    <span class="mr-2 d-none d-lg-inline text-gray-500 small"><?= $user->role->ROLE;?></span>
                                    </center>
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
                <th class="text-center">{{ $no }}</th>
                <th class="text-center">{{ $item->NO_REGISTER }}</th>
                <th class="text-center">{{ $item->KODE_BARANG }}</th>
                <th class="text-center">{{ $item->lokasi->LOKASI }}</th>
                <th class="text-center">{{ $item->NAMA_BARANG }}</th>
                <th class="text-center">{{ $item->type->satuan->SATUAN }}</th>
                <th class="text-center">{{ $item->merek->MEREK }}</th>
                <th class="text-center">{{ $item->type->TYPE }}</th>
                <th class="text-center">{{ "Rp " . number_format($item->HARGA,2,',','.') }}</th>
                <th class="text-center">{{ $item->TAHUN_PENGADAAN }}</th>
                @if ($item->KONDISI_BARANG === "1")
                    <th class="text-center">Baik</th>
                @endif 
                @if ($item->KONDISI_BARANG === "2")
                    <th class="text-center">Kurang Baik</th>
                @endif 
                @if ($item->KONDISI_BARANG === "3")
                    <th class="text-center">Rusak Berat</th>
                @endif
                @if ($item->KEBERADAAN_BARANG === "1")
                    <th class="text-center">Ada</th>
                @else
                    <th class="text-center">Tidak Ada</th>
                @endif
                <th class="text-center">{{ $item->KETERANGAN }}</th>
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