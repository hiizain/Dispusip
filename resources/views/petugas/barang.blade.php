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

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon">
                    <img style="width: 40px" src="../assets/img/surabaya.png" alt="">
                    {{-- <i class="fas fa-hand-holding-medical"></i> --}}
                </div>
                <div class="sidebar-brand-text mx-3">PETUGAS SIMBADA</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            {{-- <li class="nav-item">
                <a class="nav-link" href="/petugas-barang/{{ $lokasi->KODE_LOKASI }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li> --}}

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Petugas
            </div>
            <li class="nav-item">
                <a href="/petugas-barang-input/{{ $lokasi->KODE_LOKASI }}" class="nav-link" id="urlBarangInput">
                    <i class="fas fa-laptop-medical"></i>
                    <span>Input Barang</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a href="/petugas-barang/{{ $lokasi->KODE_LOKASI }}" class="nav-link" id="urlBarang">
                    <i class="fas fa-th-list"></i>
                    <span>Barang</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/petugas-merek/{{ $lokasi->KODE_LOKASI }}">
                    <i class="fas fa-map-marked-alt"></i>
                    <span>Tambah Merek</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/petugas-lokasi">
                    <i class="fas fa-map-marked-alt"></i>
                    <span>Ganti Lokasi</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php
                                    use Illuminate\Support\Facades\Auth;
                                    use App\User;
                                    $nip = Auth::user()->nip;
                                    $user = User::where('nip', $nip)->first();
                                ?>
                                <div>
                                    <span class="mr-2 d-none d-lg-inline text-gray-800 normal"><?= $user->NAMA; ?></span><br>
                                    <span class="mr-2 d-none d-lg-inline text-gray-500 small"><?= $user->jabatan->JABATAN ?></span>
                                </div>
                                <img class="img-profile rounded-circle"
                                    src="../assets/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                {{-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div> --}}
                                <form action="/logout" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button class="dropdown-item" href="/logout">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="row justify-content-center">
                        <div class="col-sm-5 pt-3">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">{{ $lokasi->LOKASI }}</h1>
                            </div>
                        </div>
                    </div>

                    @if(session()->has('updateSuccess'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('updateSuccess') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if(session()->has('updateError'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('updateError') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col-sm-6 py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Tabel Data Barang</h6>
                                </div>
                                
                                <div class="col-sm-6 py-2">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    
                                    <a href="/cetak-barang/{{ $lokasi->KODE_LOKASI }}" target="blank" class="btn btn-primary">Cetak Semua Data <i class="fas fa-print"></i></a>
                                    <a href="/cetak-barang/{{ $lokasi->KODE_LOKASI }}" target="blank" class="btn btn-primary">Cetak Data Pertanggal <i class="fas fa-print"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th class="text-center">No Register</th>
                                            <th class="text-center">Kode Barang</th>
                                            <th class="text-center">Lokasi</th>
                                            <th class="text-center">Nama Barang</th>
                                            <th class="text-center">Satuan</th>
                                            <th class="text-center">Gambar</th>
                                            <th class="text-center">Merek</th>
                                            <th class="text-center">Type</th>
                                            <th class="text-center">Nilai Nominal</th>
                                            <th class="text-center">Tahun Pengadaan</th>
                                            <th class="text-center">Kondisi Barang</th>
                                            <th class="text-center">Keberadaan Barang</th>
                                            <th class="text-center">Keterangan</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th class="text-center">No Register</th>
                                            <th class="text-center">Kode Barang</th>
                                            <th class="text-center">Lokasi</th>
                                            <th class="text-center">Nama Barang</th>
                                            <th class="text-center">Satuan</th>
                                            <th class="text-center">Gambar</th>
                                            <th class="text-center">Merek</th>
                                            <th class="text-center">Type</th>
                                            <th class="text-center">Nilai Nominal</th>
                                            <th class="text-center">Tahun Pengadaan</th>
                                            <th class="text-center">Kondisi Barang</th>
                                            <th class="text-center">Keberadaan Barang</th>
                                            <th class="text-center">Keterangan</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
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
                                                <th class="text-center">
                                                    <img onclick="modalBarang(this.src)" width="120" height="80" src="../storage/img-barang/{{ $item->PATH_FOTO }}" alt="">
                                                </th>
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
                                                <th>
                                                    <a href="/petugas-barang-edit{{$item->NO_REGISTER}}/{{ $lokasi->KODE_LOKASI }}"><button type="button" class="btn btn-warning tombol"><i class="fas fa-light fa-pen"></i></button></a>
                                                </th>
                                            </tr>
                                        @php
                                            $no++;
                                        @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="modal fade bd-example-modal-lg" id="modalPreview" tabindex="-1" aria-labelledby="modalPreview" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content" id="modalBarang">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Gambar Barang</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <img id="imgModalBarang" style="height: 430px;" src="" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Aplikasi Inventaris DISPUSIP KOTA SURABAYA 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

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

</body>

</html>