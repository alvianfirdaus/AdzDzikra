<!-- Main Sidebar Container -->
<link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
<link rel="stylesheet" href="{{ asset('dist/css/adminlte.css') }}">
<body class="hold-transition sidebar-mini">
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img src="{{ asset('/') }}dist/img/adzdzikra.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Ponpes Adz-Dzikra</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('/') }}dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Admin</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Table Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('table', ['table' => 'admin']) }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Admin</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('table', ['table' => 'panitia']) }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Panitia</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('table', ['table' => 'user']) }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Wali Santri</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.pendaftar') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Calon Siswa</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.siswa') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-graduate"></i>
                        <p>Siswa</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.pengumuman') }}" class="nav-link">
                        <i class="nav-icon fas fa-bullhorn"></i>
                        <p>Pengumuman</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.pembayaran') }}" class="nav-link">
                        <i class="nav-icon fas fa-wallet"></i>
                        <p>Pembayaran</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.gallery') }}" class="nav-link">
                        <i class="nav-icon fas fa-images"></i>
                        <p>Pengaturan Galeri</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
</body>
