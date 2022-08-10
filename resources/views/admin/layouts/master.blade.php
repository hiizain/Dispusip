<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="assets/img/surabaya.png">
    <title>SIMBADA DISPUSIP Kota Surabaya</title>

    <!-- Custom fonts for this template -->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
                <div class="sidebar-brand-text mx-3">ADMIN SIMBADA</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Admin
            </div>

            <!-- Nav Item - Master Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="/admin-barang">
                    {{-- <i class="fas fa-regular fa-book"></i> --}}
                    <i class="fas fa-th-list"></i>
                    <span>Barang</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin-lokasi">
                    <i class="fas fa-map-marked-alt"></i>
                    <span>Lokasi</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin-type">
                    <i class="fas fa-filter"></i>
                    <span>Tipe</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin-merek">
                    <i class="fas fa-filter"></i>
                    <span>Merk</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin-satuan">
                    <i class="fas fa-layer-group"></i>
                    <span>Satuan</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin-role">
                    <i class="fas fa-sitemap"></i>
                    <span>Role</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin-jabatan">
                    <i class="fas fa-network-wired"></i>
                    <span>Jabatan</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin-user">
                    <i class="fas fa-light fa-address-card"></i>
                    <span>User</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            {{-- <center>
            <a class="nav-link">
                <form action="/logout" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button class="btn btn-info">
                        <i class="fas fa-power-off"></i>
                        <span>Keluar Aplikasi</span>
                    </button>
                </form>
                </a>
        </center>   --}}
        </ul>
        
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                @include('../admin/partials/sidenavbar')

                <!-- Begin Page Content -->
                <div onload="toast()" class="container-fluid">

                    @yield('container')

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
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="assets/js/demo/datatables-demo.js"></script>
    <script src="assets/js/aplikasi/admin.js"></script>

</body>

</html>