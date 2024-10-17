<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/css/adminlte.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                        <i class="fas fa-bars"></i>
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <!-- User Profile -->
                <li class="nav-item d-flex align-items-center">
                    <img src="{{ asset('images/profilph.png') }}" class="img-circle mr-2" alt="User Image" style="width: 25px; height: 25px;">
                    <span class="text-dark font-weight-bold mr-4">Admin</span>
                    <a href="{{ route('logout') }}" class="btn btn-outline-danger btn-sm mr-3">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Sidebar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="{{ asset('images/logo-aftersunset.png') }}" alt="Brand Logo">
                <span class="brand-text font-weight-bold text-white">AfterSunset.idn</span>
            </a>

            <!-- Sidebar Menu -->
            <div class="sidebar">
                <nav class="mt-5">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p class="text-white">Beranda</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('order') }}" class="nav-link">
                                <i class="nav-icon fas fa-shopping-cart"></i>
                                <p class="text-white">Pemesanan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('history') }}" class="nav-link">
                                <i class="nav-icon fas fa-history"></i>
                                <p class="text-white">Riwayat</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-wallet"></i>
                                <p class="text-white">Keuangan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-utensils"></i>
                                <p class="text-white">Menu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-address-book"></i>
                                <p class="text-white">Karyawan</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>
        </div>

        <!-- Footer -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <strong>&copy; 2024 <a href="#">Rplbo</a>.</strong> All rights reserved.
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/js/adminlte.min.js"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
