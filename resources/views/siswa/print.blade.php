<!DOCTYPE html>
<html>

<head>
    <title>PDF Siswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="row justify-content-center align-items-center">
        <table border="0" width="100%" style="text-align:center;">
            <tbody>
                <tr>
                    <td align="left"><img src="dist/img/adzdzikra.png" width="100px" alt="adz dzikra"></td>
                    <td align="center" width="150%">
                        <div>
                            <span style="font-family: 'Times New Roman'; font-size:16pt">YAYASAN PONDOK
                                PESANTREN</span><br>
                            <span
                                style="font-family: 'Times New Roman'; font-size:16pt"><strong>Adz-Dzikra</strong></span><br>
                            <span style="font-family: 'Times New Roman'; font-size:14pt">Jl. Udang Windu No.35,
                                Tukangkayu, Kec. Banyuwangi, Kabupaten Banyuwangi, Jawa Timur 68416</span><br>
                            <h6><a target="_blank"
                                    href="#">nama.domain</a>
                        </div>
                    </td>
                    <td> 
                        @if ($siswa->pendaftar->jenjangPend == 'SMP')
                            <img src="dist/img/smpkader.png" width="100px" alt="SMP Kader">
                        @elseif ($siswa->pendaftar->jenjangPend == 'MA')
                            <img src="dist/img/makader.png" width="120px" alt="MA Kader">
                        @else
                            <img src="dist/img/adzdzikra" width="120px" alt="Default Logo">
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
        <hr style="height:10px; border:0; border-top:3px double #000000">
        <div style="text-align: center">
            <h3>Bukti Lolos Pendaftaran Siswa {{ $siswa->pendaftar->jenjangPend }}</h3><br>
            <div style="text-align: right">
                
            </div>
        </div>
        <div style="display: flex; align-items: flex-start; justify-content: center;">
        <div style="flex: 1; padding-right: 40px;">
            <h6>A. KETERANGAN PRIBADI</h6>
            <table border="0" cellspacing="0" cellpadding="2" style="width: 100%; border-collapse: collapse; font-size: 14px;">
                <tr>
                    <td style="width: 50%; font-weight: bold;">1. Nama Lengkap</td>
                    <td style="width: 8%;">:</td>
                    <td style="width: 40%;">{{ $siswa->pendaftar->name }}</td>
                    <td style="width: 25%;" rowspan="4" align="center">
                        @if (!empty($siswa->pendaftar->foto))
                            <img src="{{ public_path('storage/' . $siswa->pendaftar->foto) }}" height="120px"
                                style="border-radius: 10px; border: 1px solid black;">
                        @else
                            <p style="text-align: center;">Foto Tidak Tersedia</p>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">2. NIK/NISN</td>
                    <td>:</td>
                    <td>{{ $siswa->pendaftar->nik }}</td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">3. Jenis Kelamin</td>
                    <td>:</td>
                    <td>{{ $siswa->pendaftar->jenKel }}</td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">4. Tempat/Tanggal Lahir</td>
                    <td>:</td>
                    <td>{{ $siswa->pendaftar->tempatLahir }}, {{ $siswa->pendaftar->tglLahir }}</td>
                </tr>
            </table>
            <br>
            <h6>B. KETERANGAN ALAMAT</h6>
            <table border="0" cellspacing="0" cellpadding="2" style="width: 100%; border-collapse: collapse; font-size: 14px;">
                <tr>
                    <td style="width: 30%; font-weight: bold;">1. Alamat Lengkap</td>
                    <td style="width: 5%;">:</td>
                    <td style="width: 40%;">{{ $siswa->pendaftar->alamat }}</td>
                </tr>
            </table>
            <br>
            <h6>C. KETERANGAN WALI</h6>
            <table border="0" cellspacing="0" cellpadding="2" style="width: 100%; border-collapse: collapse; font-size: 14px;">
                <tr>
                    <td style="width: 30%; font-weight: bold;">1. Nama Wali</td>
                    <td style="width: 5%;">:</td>
                    <td style="width: 40%;">{{ $siswa->pendaftar->name_wali }}</td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">2. Tanggal Lahir</td>
                    <td>:</td>
                    <td>{{ $siswa->pendaftar->user->tglLahir }}</td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">3. No Hp Aktif</td>
                    <td>:</td>
                    <td>{{ $siswa->pendaftar->user->noHp }}</td>
                </tr>
            </table>
            <br>
            <h6>D. HASIL SELEKSI</h6>
            <table border="1" cellspacing="0" cellpadding="5" style="width: 100%; border-collapse: collapse; font-size: 14px; text-align: center;">
                <tr style="background-color: rgba(173, 216, 230, 0.7); font-weight: bold;">
                    <td style="width: 30%;">Nama Santri</td>
                    <td style="width: 25%;">Jenjang Pendidikan Dipilih</td>
                    <td style="width: 20%;">Status Pembayaran</td>
                    <td style="width: 25%;">Status Seleksi</td>
                </tr>
                <tr>
                    <td>{{ $siswa->pendaftar->name }}</td>
                    <td>{{ $siswa->pendaftar->jenjangPend }}</td>
                    <td>
                    @if ($siswa->pendaftar->pembayaran->isNotEmpty())
                                                                    @foreach ($siswa->pendaftar->pembayaran as $pembayaran)
                                                                        @php
                                                                            // Mengambil semua status dari satu item pembayaran
                                                                            $statuses = [
                                                                                $pembayaran->status,
                                                                                $pembayaran->sts_perssek,
                                                                                $pembayaran->sts_pangpon,
                                                                                $pembayaran->sts_perpon,
                                                                                $pembayaran->sts_up
                                                                            ];

                                                                            // Hitung jumlah masing-masing status
                                                                            $jumlah_terbayar = count(array_filter($statuses, fn($s) => $s === 'terbayar'));
                                                                            $jumlah_verifikasi = count(array_filter($statuses, fn($s) => $s === 'verifikasi'));
                                                                            $jumlah_bayar = count(array_filter($statuses, fn($s) => $s === 'bayar' || $s === 'invalid'));
                                                                        @endphp

                                                                        @if ($jumlah_terbayar === count($statuses))
                                                                            <span class="badge badge-success">Lunas</span>
                                                                        @elseif ($jumlah_verifikasi > 0)
                                                                            <a class="btn btn-warning">Mengangsur</a>
                                                                        @elseif ($jumlah_bayar === count($statuses))
                                                                            <a class="btn btn-danger">Belum Lunas</a>
                                                                        @else
                                                                            {{ implode(', ', $statuses) }}
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                    </td>
                    <td>{{ $siswa->pendaftar->status }}</td>
                </tr>
            </table>
            <table border="0" cellspacing="0" cellpadding="5" style="width: 100%; border-collapse: collapse; font-size: 14px; text-align: center; margin-top: 20px;">
            <tr>
                <td style="width: 50%; text-align: center;">Banyuwangi, … / … / 202..</td>
                
                    
                </td>
                <td style="width: 50%; text-align: center;"></td>
            </tr>
            <tr>
                <td style="width: 50%; text-align: center;">Orang Tua/Wali</td>
                <td style="width: 50%; text-align: center;">Panitia PPDB</td>
            </tr>
            <tr>
                <td style="height: 60px;"></td>
                <td></td>
            </tr>
            <tr>
                <td style="text-align: center;">(………………………)</td>
                <td style="text-align: center;">(………………………)</td>
            </tr>
        </table>

        
        

        </div>
    <div>
    </div>
</div>     
</body>

</html>
