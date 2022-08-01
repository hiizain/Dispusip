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
                    <span class="mr-2 d-none d-lg-inline text-gray-600 normal"><?= $user->NAMA; ?></span><br>
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user->jabatan->JABATAN ?></span>
                </div>
                
                <img class="img-profile rounded-circle"
                    src="assets/img/undraw_profile.svg">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
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
                <div class="dropdown-divider"></div>
                <form action="/logout" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button class="dropdown-item">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </button>
                </form>
            </div>
        </li>

    </ul>

</nav>
<!-- End of Topbar -->