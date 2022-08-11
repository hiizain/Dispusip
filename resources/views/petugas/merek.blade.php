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

<body id="page-top" onload="form()">

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
                    <i class="fas fa-tag"></i>
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
                                @php
                                    use Illuminate\Support\Facades\Auth;
                                    use App\User;
                                    use App\Type;
                                    $nip = Auth::user()->nip;
                                    $user = User::where('nip', $nip)->first();
                                @endphp
                                <div>
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 normal"><?= $user->NAMA; ?></span><br>
                                    <span class="mr-2 d-none d-lg-inline text-gray-500 small"><?= $user->role->ROLE;?></span>
                                </div>
                                <img class="img-profile rounded-circle"
                                    src="../assets/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
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

                    <div class="">
                        <div class="p-5">
                            @if(session()->has('tambahSuccess'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('tambahSuccess') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if(session()->has('tambahError'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('tambahError') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if (count($errors) > 0)
                            <div class="row alert alert-danger">
                                <div class="col-md-11">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                            @endif
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Tambahkan Merk!</h1>
                            </div>
                            <form action="/add-merek" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="lokasi" value="{{ $lokasi->KODE_LOKASI }}">
                                <div class="form-group row">
                                    <div class="col-sm-4 mt-2">
                                        <h1 class="h6">Merek</h1>
                                    </div>
                                    <div class="col-sm-1 mt-2">
                                        <h1 class="h6">:</h1>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control form-control-user text-center" id="exampleFirstName"
                                            placeholder="Merek" name="merek">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <a href="/admin-merek" class="btn btn-danger btn-user btn-block">
                                            Batal
                                        </a>
                                    </div>
                                    <div class="col-sm-6">
                                        <button type="submit" name="submit" class="btn btn-success btn-user btn-block">
                                            Tambah
                                        </button>
                                    </div>
                                </div>
                                <hr>
                            </form>
                        </div>
                    </div>
                    
                    <div class="cek">
                    
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
