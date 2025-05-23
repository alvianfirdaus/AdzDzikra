@extends('layouts.userapp')
<title>Pembayaran user | Adz-Dzikra </title>
<link rel="icon" href="{{ asset('dist/img/adzdzikra.png') }}">
@extends('layouts.usersidebar')
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->

<body class="hold-transition sidebar-mini">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ asset('/') }}dist/img/adzdzikra.png" alt="AdminLTELogo" height="170"
            width="195">
    </div>
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                            class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd"
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a class="nav-link" href="{{ route('user.profile') }}">
                            <th>{{ Auth::user()->name }}</th>
                        </a>
                        <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <div style="margin-left: 250px">
            <section class="content">
                <div class="container-fluid">
                    <h1>Pembayaran Dashboard</h1>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table table-bordered">
                                @if (!empty($pembayarans) && count($pembayarans) > 0)
                                    @if ($message = Session::get('success'))
                                        <div class="alert alert-success">
                                            <p>{{ $message }}</p>
                                        </div>
                                    @endif
                                    <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Name Wali</th>
                                            <th>Jenjang Pendidikan</th>
                                            <th>Pembayaran</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pembayarans as $pembayaran)
                                            <tr>
                                                <td rowspan="{{ $pembayaran->pendaftar->name }}">{{ $pembayaran->pendaftar->name }}</td>
                                                <td rowspan="{{ $pembayaran->pendaftar->name_wali }}">{{ $pembayaran->pendaftar->name_wali }}</td>
                                                <td rowspan="{{ $pembayaran->pendaftar->jenjangPend }}">{{ $pembayaran->pendaftar->jenjangPend }}</td>
                                                <td>
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Jenis Pembayaran</th>
                                                                <th>Jumlah</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                    <td>Uang pendaftaran</td>
                                                                    <td>{{ $pembayaran->jml_up }}</td>
                                                                    <td>{{ $pembayaran->sts_up }}</td>
                                                                    <td>
                                                                    @if ($pembayaran->sts_up == 'bayar')
                                                                        <a class="btn btn-primary" href="#"
                                                                            data-toggle="modal"
                                                                            data-target="#uploadUp{{ $pembayaran->id }}">Unggah</a>
                                                                    @elseif ($pembayaran->sts_up == 'invalid')
                                                                        <a class="btn btn-warning" href="#"
                                                                            data-toggle="modal"
                                                                            data-target="#uploadUp{{ $pembayaran->id }}">Ubah</a>
                                                                    @elseif ($pembayaran->sts_up == 'verifikasi')
                                                                        <a href="{{ route('pembayaran.showuser', $pembayaran->id) }}"
                                                                            class="btn btn-primary">Lihat</a>
                                                                    @elseif ($pembayaran->sts_up == 'terbayar')
                                                                        <a href="{{ route('pembayaran.showuser', $pembayaran->id) }}"
                                                                            class="btn btn-primary">Lihat</a>
                                                                    @endif
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Uang Pangkal Sekolah</td>
                                                                    <td>{{ $pembayaran->jumlah }}</td>
                                                                    <td>{{ $pembayaran->status }}</td>
                                                                    <td>
                                                                    @if ($pembayaran->status == 'bayar')
                                                                        <a class="btn btn-primary" href="#"
                                                                            data-toggle="modal"
                                                                            data-target="#uploadPembayaran{{ $pembayaran->id }}">Unggah</a>
                                                                    @elseif ($pembayaran->status == 'invalid')
                                                                        <a class="btn btn-warning" href="#"
                                                                            data-toggle="modal"
                                                                            data-target="#uploadPembayaran{{ $pembayaran->id }}">Ubah</a>
                                                                    @elseif ($pembayaran->status == 'verifikasi')
                                                                        <a href="{{ route('pembayaran.showuser', $pembayaran->id) }}"
                                                                            class="btn btn-primary">Lihat</a>
                                                                    @elseif ($pembayaran->status == 'terbayar')
                                                                        <a href="{{ route('pembayaran.showuser', $pembayaran->id) }}"
                                                                            class="btn btn-primary">Lihat</a>
                                                                    @endif
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Uang Personal Sekolah</td>
                                                                    <td>{{ $pembayaran->jml_perssek }}</td>
                                                                    <td>{{ $pembayaran->sts_perssek }}</td>
                                                                    <td>
                                                                    @if ($pembayaran->sts_perssek == 'bayar')
                                                                        <a class="btn btn-primary" href="#"
                                                                            data-toggle="modal"
                                                                            data-target="#uploadPerssek{{ $pembayaran->id }}">Unggah</a>
                                                                    @elseif ($pembayaran->sts_perssek == 'invalid')
                                                                        <a class="btn btn-warning" href="#"
                                                                            data-toggle="modal"
                                                                            data-target="#uploadPerssek{{ $pembayaran->id }}">Ubah</a>
                                                                    @elseif ($pembayaran->sts_perssek == 'verifikasi')
                                                                        <a href="{{ route('pembayaran.showuser', $pembayaran->id) }}"
                                                                            class="btn btn-primary">Lihat</a>
                                                                    @elseif ($pembayaran->sts_perssek == 'terbayar')
                                                                        <a href="{{ route('pembayaran.showuser', $pembayaran->id) }}"
                                                                            class="btn btn-primary">Lihat</a>
                                                                    @endif
                                                                        
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Uang Pangkal Pondok</td>
                                                                    <td>{{ $pembayaran->jml_pangpon }}</td>
                                                                    <td>{{ $pembayaran->sts_pangpon }}</td>
                                                                    <td>
                                                                    @if ($pembayaran->sts_pangpon == 'bayar')
                                                                        <a class="btn btn-primary" href="#"
                                                                            data-toggle="modal"
                                                                            data-target="#uploadPangpon{{ $pembayaran->id }}">Unggah</a>
                                                                    @elseif ($pembayaran->sts_pangpon == 'invalid')
                                                                        <a class="btn btn-warning" href="#"
                                                                            data-toggle="modal"
                                                                            data-target="#uploadPangpon{{ $pembayaran->id }}">Ubah</a>
                                                                    @elseif ($pembayaran->sts_pangpon == 'verifikasi')
                                                                        <a href="{{ route('pembayaran.showuser', $pembayaran->id) }}"
                                                                            class="btn btn-primary">Lihat</a>
                                                                    @elseif ($pembayaran->sts_pangpon == 'terbayar')
                                                                        <a href="{{ route('pembayaran.showuser', $pembayaran->id) }}"
                                                                            class="btn btn-primary">Lihat</a>
                                                                    @endif
                                                                        
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Uang Personal Pondok</td>
                                                                    <td>{{ $pembayaran->jml_perpon }}</td>
                                                                    <td>{{ $pembayaran->sts_perpon }}</td>
                                                                    <td>
                                                                    @if ($pembayaran->sts_perpon == 'bayar')
                                                                        <a class="btn btn-primary" href="#"
                                                                            data-toggle="modal"
                                                                            data-target="#uploadPerpon{{ $pembayaran->id }}">Unggah</a>
                                                                    @elseif ($pembayaran->sts_perpon == 'invalid')
                                                                        <a class="btn btn-warning" href="#"
                                                                            data-toggle="modal"
                                                                            data-target="#uploadPerpon{{ $pembayaran->id }}">Ubah</a>
                                                                    @elseif ($pembayaran->sts_perpon == 'verifikasi')
                                                                        <a href="{{ route('pembayaran.showuser', $pembayaran->id) }}"
                                                                            class="btn btn-primary">Lihat</a>
                                                                    @elseif ($pembayaran->sts_perpon == 'terbayar')
                                                                        <a href="{{ route('pembayaran.showuser', $pembayaran->id) }}"
                                                                            class="btn btn-primary">Lihat</a>
                                                                    @endif
                                                                        
                                                                    </td>
                                                                </tr>
                                                            
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @include('user.edit.uploadUp')
                                        @include('user.edit.uploadPembayaran')
                                        @include('user.edit.uploadPerssek')
                                        @include('user.edit.uploadPangpon')
                                        @include('user.edit.uploadPerpon')
                                    </tbody>
                                </table>


                                    {{ $pembayarans->links() }}
                                @else
                                    <p>Tidak ada pendaftar yang tersedia.</p>
                                @endif
                            </div>
                            {{-- <img src="/ppdb/bayar.png" alt="foto bank" width="700px"> <br><br> --}}
                        </div>
                        <div class="row">
                            <!-- Left col -->
                            <section class="col-lg-7 connectedSortable">
                                <!-- Custom tabs (Charts with tabs)-->
                        </div>
                    </div>
                </div>
        </div>
    </div>

    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>

    @extends('admin.footer')
    <!-- /.control-sidebar -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('/') }}plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('/') }}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE -->
    <script src="{{ asset('/') }}dist/js/adminlte.js"></script>
    <!-- OPTIONAL SCRIPTS -->
    <script src="{{ asset('/') }}plugins/chart.js/Chart.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('/') }}dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('/') }}dist/js/pages/dashboard3.js"></script>
</body>

</html>
