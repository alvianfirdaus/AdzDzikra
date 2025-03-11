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
                                        <td>
                                            <form
                                                action="{{ route('pembayaran.updatebktup', $pembayaran->id) }}"
                                                method="POST" class="update-form"
                                                data-pembayaran-id="{{ $pembayaran->id }}">
                                                @csrf
                                                @method('PUT')
                                                <select name="sts_up" class="form-control"
                                                    onchange="submitForm(this)">
                                                    <option value="bayar"
                                                        {{ $pembayaran->sts_up === 'bayar' ? 'selected' : '' }}>
                                                        Bayar</option>
                                                    <option value="verifikasi"
                                                        {{ $pembayaran->sts_up === 'verifikasi' ? 'selected' : '' }}>
                                                        Verifikasi</option>
                                                    <option value="invalid"
                                                        {{ $pembayaran->sts_up === 'invalid' ? 'selected' : '' }}>
                                                        Invalid</option>
                                                    <option value="terbayar"
                                                        {{ $pembayaran->sts_up === 'terbayar' ? 'selected' : '' }}>
                                                        Terbayar</option>
                                                </select>
                                                    <button type="submit"
                                                    class="btn btn-primary"
                                                    style="display: none;">u</button>
                                            </form>
                                            <script>
                                                function submitForm(selectElement) {
                                                var form = selectElement.parentNode;
                                                form.querySelector('button[type="submit"]')
                                                    .click();
                                                }
                                            </script>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Uang Pangkal Sekolah</td>
                                        <td>{{ number_format($pembayaran->jumlah, 0, ',', '.') }}</td>
                                        <td>
                                        @if ($pembayaran->bukti_pembayaran)
                                            <img src="{{ asset('storage/' . $pembayaran->bukti_pembayaran) }}" height="75px" width="100px" alt="Bukti Pembayaran">
                                        @else
                                            <span>Belum Dibayar</span>
                                        @endif
                                        </td>
                                        <td>
                                            <form
                                                action="{{ route('pembayaran.update', $pembayaran->id) }}"
                                                method="POST" class="update-form"
                                                data-pembayaran-id="{{ $pembayaran->id }}">
                                                @csrf
                                                @method('PUT')
                                                <select name="status" class="form-control"
                                                    onchange="submitForm(this)">
                                                    <option value="bayar"
                                                        {{ $pembayaran->status === 'bayar' ? 'selected' : '' }}>
                                                        Bayar</option>
                                                    <option value="verifikasi"
                                                        {{ $pembayaran->status === 'verifikasi' ? 'selected' : '' }}>
                                                        Verifikasi</option>
                                                    <option value="invalid"
                                                        {{ $pembayaran->status === 'invalid' ? 'selected' : '' }}>
                                                        Invalid</option>
                                                    <option value="terbayar"
                                                        {{ $pembayaran->status === 'terbayar' ? 'selected' : '' }}>
                                                        Terbayar</option>
                                                </select>
                                                    <button type="submit"
                                                    class="btn btn-primary"
                                                    style="display: none;">Update</button>
                                            </form>
                                            <script>
                                                function submitForm(selectElement) {
                                                var form = selectElement.parentNode;
                                                form.querySelector('button[type="submit"]')
                                                    .click();
                                                }
                                            </script>
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
                                        <td>
                                            <form
                                                action="{{ route('pembayaran.updatebktperssek', $pembayaran->id) }}"
                                                method="POST" class="update-form"
                                                data-pembayaran-id="{{ $pembayaran->id }}">
                                                @csrf
                                                @method('PUT')
                                                <select name="sts_perssek" class="form-control"
                                                    onchange="submitForm(this)">
                                                    <option value="bayar"
                                                        {{ $pembayaran->sts_perssek === 'bayar' ? 'selected' : '' }}>
                                                        Bayar</option>
                                                    <option value="verifikasi"
                                                        {{ $pembayaran->sts_perssek === 'verifikasi' ? 'selected' : '' }}>
                                                        Verifikasi</option>
                                                    <option value="invalid"
                                                        {{ $pembayaran->sts_perssek === 'invalid' ? 'selected' : '' }}>
                                                        Invalid</option>
                                                    <option value="terbayar"
                                                        {{ $pembayaran->sts_perssek === 'terbayar' ? 'selected' : '' }}>
                                                        Terbayar</option>
                                                </select>
                                                    <button type="submit"
                                                    class="btn btn-primary"
                                                    style="display: none;">Update</button>
                                            </form>
                                            <script>
                                                function submitForm(selectElement) {
                                                var form = selectElement.parentNode;
                                                form.querySelector('button[type="submit"]')
                                                    .click();
                                                }
                                            </script>
                                        </td>
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
                                        <td>
                                        <form
                                                action="{{ route('pembayaran.updatebktpangpon', $pembayaran->id) }}"
                                                method="POST" class="update-form"
                                                data-pembayaran-id="{{ $pembayaran->id }}">
                                                @csrf
                                                @method('PUT')
                                                <select name="sts_pangpon" class="form-control"
                                                    onchange="submitForm(this)">
                                                    <option value="bayar"
                                                        {{ $pembayaran->sts_pangpon === 'bayar' ? 'selected' : '' }}>
                                                        Bayar</option>
                                                    <option value="verifikasi"
                                                        {{ $pembayaran->sts_pangpon === 'verifikasi' ? 'selected' : '' }}>
                                                        Verifikasi</option>
                                                    <option value="invalid"
                                                        {{ $pembayaran->sts_pangpon === 'invalid' ? 'selected' : '' }}>
                                                        Invalid</option>
                                                    <option value="terbayar"
                                                        {{ $pembayaran->sts_pangpon === 'terbayar' ? 'selected' : '' }}>
                                                        Terbayar</option>
                                                </select>
                                                    <button type="submit"
                                                    class="btn btn-primary"
                                                    style="display: none;">Update</button>
                                            </form>
                                            <script>
                                                function submitForm(selectElement) {
                                                var form = selectElement.parentNode;
                                                form.querySelector('button[type="submit"]')
                                                    .click();
                                                }
                                            </script>
                                        </td>
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
                                        <td>
                                            <form
                                                action="{{ route('pembayaran.updatebktperpon', $pembayaran->id) }}"
                                                method="POST" class="update-form"
                                                data-pembayaran-id="{{ $pembayaran->id }}">
                                                @csrf
                                                @method('PUT')
                                                <select name="sts_perpon" class="form-control"
                                                    onchange="submitForm(this)">
                                                    <option value="bayar"
                                                        {{ $pembayaran->sts_perpon === 'bayar' ? 'selected' : '' }}>
                                                        Bayar</option>
                                                    <option value="verifikasi"
                                                        {{ $pembayaran->sts_perpon === 'verifikasi' ? 'selected' : '' }}>
                                                        Verifikasi</option>
                                                    <option value="invalid"
                                                        {{ $pembayaran->sts_perpon === 'invalid' ? 'selected' : '' }}>
                                                        Invalid</option>
                                                    <option value="terbayar"
                                                        {{ $pembayaran->sts_perpon === 'terbayar' ? 'selected' : '' }}>
                                                        Terbayar</option>
                                                </select>
                                                    <button type="submit"
                                                    class="btn btn-primary"
                                                    style="display: none;">Update</button>
                                            </form>
                                            <script>
                                                function submitForm(selectElement) {
                                                var form = selectElement.parentNode;
                                                form.querySelector('button[type="submit"]')
                                                    .click();
                                                }
                                            </script>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                            <div class="col-lg-10">
                                <a href="/panitia/pembayaran" class="btn btn-primary btn-icon">
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
