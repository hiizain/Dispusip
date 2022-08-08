<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

<<<<<<< Updated upstream
    <link rel="icon" href="../assets/img/surabaya.png">
=======
    <link rel="icon" href="assets/img/surabaya.png">
>>>>>>> Stashed changes
    <title>Login SIMBADA</title>

    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-img">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-6 col-md-5 mt-5">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row justify-content-center align-items-center mt-4">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900">Aplikasi SIMBADA</h1>
                                <h1 class="h5 text-gray-700 mb-4">DISPUSIP Kota Surabaya</h1>
                            </div>
                        </div>
                        <!-- Nested Row within Card Body -->
                        <div class="col">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-lg-12">
                                    <div class="row h-100 justify-content-center align-items-center">
                                        <img style="width: 100px" src="assets/img/surabaya.png" alt="Gambar">
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center align-items-center">
                                <div class="col-lg-12">
                                    <div class="p-5">

                                        @if(session()->has('loginError'))
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                {{ session('loginError') }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif

                                        {{-- <form action="{{ route('postlogin') }}" class="user" method="post"> --}}
                                        <form action="/login-proses" class="user" method="post">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <div class="form-group">
                                                <input type="text" name="nip" class="form-control form-control-user"
                                                    id="nip" aria-describedby="emailHelp"
                                                    placeholder="NIP" required value="{{ old('nip') }}">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password" class="form-control form-control-user"
                                                    id="password" placeholder="Password" required>
                                            </div>
                                            <button class="btn btn-primary btn-user btn-block" type="submit">Log in</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        {{-- </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row h-100 justify-content-center align-items-center">
                                    <img src="assets/img/surabaya.png" alt="Gambar">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <a href="index.html" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </a>
                                    </form>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>

</body>

</html>