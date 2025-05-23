@extends('layouts.userapp')
<title>Pembayaran Siswa | Adz Dzikra</title>
<link rel="icon" href="{{ asset('dist/img/adzdzikra.png') }}">

<body id="top-page">
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ asset('/') }}dist/img/adzdzikra.png" alt="AdminLTELogo" height="170" width="195">
    </div>
    <div class="wrapper">
        <nav class="navbar navbar-expand navbar-dark navbar-light">
            <img src="{{ asset('dist/img/adzdzikra.png') }}" height="40" width="45" style="margin-right: 10px" alt="AdminLTELogo">
            <h4 style="color: #fbfafa">Detail Pembayaran</h4>
        </nav>
        <br>
        <section class="content">
            <div class="container-fluid">
                <div class="inner">
                    <center>
                        <img src="/ppdb/bank1.png" alt="foto bank" style="width:75%; height:35%;"> <br><br>
                        @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                        <div class="container text-left">
                        <h5><strong>Profil</strong></h5>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Nama</th>
                                    <td>{{ $pembayaran->pendaftar->name }}</td>
                                </tr>
                                <tr>
                                    <th>Nama Wali</th>
                                    <td>{{ $pembayaran->pendaftar->name_wali }}</td>
                                </tr>
                                <tr>
                                    <th>Jenjang Pendidikan</th>
                                    <td>{{ $pembayaran->pendaftar->jenjangPend }}</td>
                                </tr>
                            </table>
                            <h5><strong>Detail Pembayaran</strong></h5>
                            <table class="table table-bordered">
                                <thead class="table-info">
                                    <tr>
                                        <th>Pembayaran</th>
                                        <th>Jumlah</th>
                                        <th>Bukti</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Uang Pendaftaran</td>
                                        <td>{{ number_format($pembayaran->jml_up, 0, ',', '.') }}</td>
                                        <td>
                                        @if ($pembayaran->bkt_up)
                                            <img src="{{ asset('storage/' . $pembayaran->bkt_up) }}" height="75px" width="100px" alt="Bukti Pembayaran">
                                        @else
                                            <span>Belum Dibayar</span>
                                        @endif
                                        </td>
                                        <td>{{ $pembayaran->sts_up }} </td>
                                    </tr>
                                    <tr>
                                        <td>Uang Pangkal Sekolah</td>
                                        <td>{{ number_format($pembayaran->jumlah, 0, ',', '.') }}</td>
                                        <td>
                                        @if ($pembayaran->bukti_pembayaran)
                                            <img src="{{ asset('storage/' . $pembayaran->bukti_pembayaran) }}" height="75px" width="100px" alt="Belum Dibayar">
                                        @else
                                            <span>Belum Dibayar</span>
                                        @endif
                                        </td>
                                        <td> {{ $pembayaran->status }} 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Uang Personal Sekolah</td>
                                        <td>{{ number_format($pembayaran->jml_perssek, 0, ',', '.') }}</td>
                                        <td>
                                        @if ($pembayaran->bkt_perssek)
                                            <img src="{{ asset('storage/' . $pembayaran->bkt_perssek) }}" height="75px" width="100px" alt="Bukti Pembayaran">
                                        @else
                                            <span>Belum Dibayar</span>
                                        @endif
                                        </td>
                                        <td>{{ $pembayaran->sts_perssek }} </td>
                                    </tr>
                                    <tr>
                                        <td>Uang Pangkal Pondok</td>
                                        <td>{{ number_format($pembayaran->jml_pangpon, 0, ',', '.') }}</td>
                                        <td>
                                        @if ($pembayaran->bkt_pangpon)
                                            <img src="{{ asset('storage/' . $pembayaran->bkt_pangpon) }}" height="75px" width="100px" alt="Bukti Pembayaran">
                                        @else
                                            <span>Belum Dibayar</span>
                                        @endif
                                        </td>
                                        </td>
                                        <td>{{ $pembayaran->sts_pangpon }} </td>
                                    </tr>
                                    <tr>
                                        <td>Uang Personal Pondok</td>
                                        <td>{{ number_format($pembayaran->jml_perpon, 0, ',', '.') }}</td>
                                        <td>
                                        @if ($pembayaran->bkt_perpon)
                                            <img src="{{ asset('storage/' . $pembayaran->bkt_perpon) }}" height="75px" width="100px" alt="Bukti Pembayaran">
                                        @else
                                            <span>Belum Dibayar</span>
                                        @endif
                                        </td>
                                        <td>{{ $pembayaran->sts_perpon }} </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                            <div class="col-lg-10">
                                <a href="/user/dashboard/pembayaran" class="btn btn-primary btn-icon">
                                 <i class="fas fa-arrow-left"></i>
                                    Kembali
                                </a>
                            </div>
                        </div>
                    </center>
                </div>
            </div>
        </section>
    </div>
    <script src="{{ asset('/') }}plugins/jquery/jquery.min.js"></script>
    <script src="{{ asset('/') }}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('/') }}dist/js/adminlte.js"></script>
</body>
</html>
