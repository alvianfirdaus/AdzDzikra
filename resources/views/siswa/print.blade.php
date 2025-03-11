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
                    <td align="left"><img src="dist/img/adzdzikra.png" width="130px" alt="Logo Shaleh"></td>
                    <td align="center" width="150%">
                        <div>
                            <span style="font-family: 'Times New Roman'; font-size:16pt">YAYASAN PONDOK
                                PESANTREN</span><br>
                            <span
                                style="font-family: 'Times New Roman'; font-size:16pt"><strong>Adz-Dzikra</strong></span><br>
                            <span style="font-family: 'Times New Roman'; font-size:14pt">Jl. Udang Windu No.35,
                                Tukangkayu, Kec. Banyuwangi, Kabupaten Banyuwangi, Jawa Timur 68416</span><br>
                            <h6><a target="_blank"
                                    href="#">nama.domain</a>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <hr style="height:10px; border:0; border-top:3px double #000000">
        <div style="text-align: center">
            <h3>Detail Profil Siswa</h3><br>
            <div style="text-align: center">
                @if (!empty($siswa->pendaftar->foto))
                    <img src="{{ public_path('storage/' . $siswa->pendaftar->foto) }}" height="150px"
                        style="border-radius: 10px;">
                @else
                    <p>404</p>
                @endif
            </div>
        </div>
        <br>

        <table class='table table-bordered' style="margin-left: -0.2%">
            <thead>
                @php $i=1 @endphp
                <tr>
                    <th>No</th>
                    <td>{{ $siswa->id }}</td>
                </tr>
                <tr>
                    <th>NIK</th>
                    <td>{{ $siswa->pendaftar->nik }}</td>
                </tr>
                <tr>
                    <th>NIS</th>
                    <td>{{ $siswa->nis }}</td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td>{{ $siswa->pendaftar->name }}</td>
                </tr>
                <tr>
                    <th>Nama Wali</th>
                    <td>{{ $siswa->pendaftar->name_wali }}</td>
                </tr>
                <tr>
                    <th>Nomor HP</th>
                    <td>{{ $siswa->pendaftar->user->noHp ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td>{{ $siswa->pendaftar->jenKel }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>{{ $siswa->pendaftar->alamat }}</td>
                </tr>
                <tr>
                    <th>Tanggal Lahir</th>
                    <td>{{ $siswa->pendaftar->tglLahir }}</td>
                </tr>
                <tr>
                    <th>Jenjang Pendidikan</th>
                    <td>{{ $siswa->pendaftar->jenjangPend }}</td>
                </tr>
                <tr>
                    <th>Tempat Lahir</th>
                    <td>{{ $siswa->pendaftar->tempatLahir }}</td>
                </tr>
            </thead>
        </table>
</body>

</html>
