@extends('admin.app')
<title>Pembayaran Panitia | Adz-Dzikra</title>
<link rel="icon" href="{{ asset('dist/img/adzdzikra.png') }}">
@extends('panitia.sidebar')

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
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
                        <a class="nav-link" href="{{ route('panitia.profile') }}">
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

        <div style="margin-left: 250px">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Pembayaran Calon Siswa</h1>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="content transition">
                <div class="container-fluid dashboard">
                    <div class="col-12">
                        <div class="card">
                            <section class="content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="box">
                                            <div class="card-body">
                                                <div class="box-header with-border">
                                                    <h6 class="box-title">Detail Pembayaran</h6>
                                                    <form action="{{ route('searchPPembayaran') }}" method="GET" class="box-tools">
                                                        <div class="input-group">
                                                            <input type="text" name="search" class="form-control" placeholder="Search">
                                                            <div class="input-group-btn">
                                                                <button type="submit" class="btn btn-primary">Cari</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                
                                                <div class="box-body">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Name Wali</th>
                                                                <th>Jenjang Pendidikan</th>
                                                                <th>Status Pembayaran</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($pembayarans as $pembayaran)
                                                                <tr>
                                                                    <td>{{ $pembayaran->pendaftar->name }}</td>
                                                                    <td>{{ $pembayaran->pendaftar->name_wali }}</td>
                                                                    <td>{{ $pembayaran->pendaftar->jenjangPend }}</td>
                                                                    <td>
                                                                        @php
                                                                            $statuses = [
                                                                                $pembayaran->status,
                                                                                $pembayaran->sts_perssek,
                                                                                $pembayaran->sts_pangpon,
                                                                                $pembayaran->sts_perpon,
                                                                                $pembayaran->sts_up
                                                                            ];
                                                                            if (count(array_unique($statuses)) === 1 && $statuses[0] === 'terbayar') {
                                                                                $status_pembayaran = 'Lunas';
                                                                                $badge = 'badge-success';
                                                                            }  elseif (in_array('bayar', $statuses) && in_array('terbayar', $statuses)) {
                                                                                $status_pembayaran = 'Mengangsur';
                                                                                $badge = 'badge-warning';
                                                                            } elseif (in_array('verifikasi', $statuses)) {
                                                                                $status_pembayaran = 'Mengangsur';
                                                                                $badge = 'badge-warning';
                                                                            } else {
                                                                                $status_pembayaran = 'Belum Lunas';
                                                                                $badge = 'badge-danger';
                                                                            }
                                                                        @endphp
                                                                        <span class="badge {{ $badge }}">{{ $status_pembayaran }}</span>
                                                                    </td>
                                                                    <td>
                                                                        <a href="{{ route('pembayaran.show', $pembayaran->id) }}" class="btn btn-info">Lihat</a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    <div class="container">
                                                        <div class="d-flex align-items-center" style="height: 50px">
                                                            <div class="col-lg-10">
                                                                <a href="/panitia/dashboard" class="btn btn-primary btn-icon">
                                                                    <i class="fas fa-arrow-left"></i> Kembali
                                                                </a>
                                                            </div>
                                                            <div class="col-lg-2">
                                                                {{ $pembayarans->links() }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @extends('admin.footer')

    <script src="{{ asset('/') }}plugins/jquery/jquery.min.js"></script>
    <script src="{{ asset('/') }}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('/') }}dist/js/adminlte.js"></script>
    <script src="{{ asset('/') }}plugins/chart.js/Chart.min.js"></script>
    <script src="{{ asset('/') }}dist/js/demo.js"></script>
    <script src="{{ asset('/') }}dist/js/pages/dashboard3.js"></script>
</body>

<style>
    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
    }
</style>
