@extends('layouts.source')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Selamat Datang</title>
    <link rel="stylesheet" href="real.css">
    <link rel="icon" type="image/icon" sizes="32x32" href="/landing/images/LogoShaleh.png">
</head>

<body id="top-page">
    {{-- Navbar Section (Elang) --}}
    <nav class="navbar navbar-expand-lg navbar-light fixed-top navbar-color">
        <div class="container">
            <img class="navbar-img" src="/landing/images/adzdzikra.png" sizes="32x32">
            <p class="navbar-logo-text">SMP-Adz-Dzikra</p>

            <!-- Button Mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Pengumuman</a>
                    </li>

                    <!-- Dropdown Pendidikan -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown">
                            Pendidikan
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('landing.sd') }}">Pendidikan SD</a></li>
                            <li>
                                <hr class="dropdown-divider" style="border-top: 1px solid rgba(255, 255, 255, 0.3);">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('landing.smp') }}">Pendidikan SMP</a></li>
                            <li>
                                <hr class="dropdown-divider" style="border-top: 1px solid rgba(255, 255, 255, 0.3);">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('landing.ma') }}">Pendidikan MA</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#caramendaftar">Cara Mendaftar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br>
    <br>
    <br>

    {{-- Isi Konten Disini --}}
    <section class="box-luar">
        <div class="border-dalam">
            <div class="text-konten">
                <h2>Judul Konten</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus tortor nulla, posuere et ex sed,
                    cursus malesuada odio. Fusce tempus nibh at justo eleifend, in tincidunt felis porta. Cras est
                    augue, fermentum sagittis neque ac, placerat faucibus urna. Donec sollicitudin condimentum purus,
                    sit amet sagittis est placerat eget. Donec aliquet nisi lorem, quis tempor lorem laoreet id. In
                    gravida vulputate nulla eget ultricies. Donec venenatis nisl vel quam sodales porttitor.
                    Pellentesque in pellentesque enim. Nam dignissim semper sem a condimentum. Duis ut enim augue.
                    Praesent sagittis faucibus urna, in iaculis lorem scelerisque eget. Sed molestie magna a finibus
                    pellentesque. Donec sed tristique magna, et tempor purus. Donec enim turpis, dignissim sed consequat
                    sed, vestibulum suscipit felis. Donec maximus leo eget libero iaculis pharetra.
                </p>
                <!-- Button Register -->
        <div class="button-container">
            <a href="{{ route('register') }}" class="btn-primary">Pendaftaran</a>
        </div>
    
            </div>
            <div class="gambar-konten">
                <img src="{{ asset('img/sd.jpg') }}" alt="Gambar SD">
            </div>
        </div>
    </section>

    <section class="visi-misi-container">
        <div class="visi">
            <h2>Visi</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus tortor nulla, posuere et ex sed,
                cursus malesuada odio. Fusce tempus nibh at justo eleifend, in tincidunt felis porta. Cras est
                augue, fermentum sagittis neque ac, placerat faucibus urna. Donec sollicitudin condimentum purus,
                sit amet sagittis est placerat eget. Donec aliquet nisi lorem, quis tempor lorem laoreet id. In
                gravida vulputate nulla eget ultricies. Donec venenatis nisl vel quam sodales porttitor.
                Pellentesque in pellentesque enim. Nam dignissim semper sem a condimentum. Duis ut enim augue.
                Praesent sagittis faucibus urna, in iaculis lorem scelerisque eget. Sed molestie magna a finibus
                pellentesque. Donec sed tristique magna, et tempor purus. Donec enim turpis, dignissim sed consequat
                sed, vestibulum suscipit felis. Donec maximus leo eget libero iaculis pharetra.</p>
        </div>
        <div class="misi">
            <h2>Misi</h2>
            <ul>
                <li>Misi 1 melakukan ini itu</li>
                <li>Misi 2 melakukan ini itu</li>
                <li>Misi 3 melakukan ini itu</li>
            </ul>
        </div>
    </section>

    <section id="caramendaftar">

        <br>
        <br>
        <br>
        <section id="caramendaftar">
            <div class="tengah">
                <div class="kolom">
                    <p class="deskripsi">Tutorial Pendaftaran</p>
                </div>
                <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0"width="534" height="300"
                    type="text/html"
                    src="https://www.youtube.com/embed/7Hr7sxQ6vUg?autoplay=0&fs=0&iv_load_policy=3&showinfo=0&rel=0&cc_load_policy=0&start=0&end=0&origin=https://youtubeembedcode.com">
                    <div><small><a href="https://youtubeembedcode.com/en">
                                <div><small><a href="https://youtubeembedcode.com/pl/">youtubeembedcode pl</a></small>
                                </div>
                                <div><small><a href="https://allabeviljas.se/">smslån som beviljar alla</a></small>
                                </div>
                                <div><small><a href="https://youtubeembedcode.com/pl/">youtubeembedcode pl</a></small>
                                </div>
                                <div><small><a href="https://skipborules.com/">skipborules.com</a></small></div>
                                <div><small><a href="https://youtubeembedcode.com/nl/">youtubeembedcode nl</a></small>
                                </div>
                                <div><small><a href="https://xn--snabbln5000-28a.com/lana-2000/">låna 2000</a></small>
                                </div>
                                <div><small><a
                                            href="https://youtubeembedcode.com/en">youtubeembedcode.com/en/</a></small>
                                </div>
                                <div><small><a href="https://nouc.se/sms-lan/handelsbanken/">sms lån
                                            handelsbanken</a></small>
                                </div>
                </iframe>
            </div>

            <br>
            <br>
            <br>
        </section>

        {{-- Footer Section (Elang) --}}
        <footer class="footer py-4" id="kaki">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy;Tim IT Kel2. 2023</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-light mx-2 ft-twitter" href="https://twitter.com/AnakSalehMalang?s=20"
                            aria-label="Twitter"></a>
                        <a class="btn btn-light mx-2 ft-facebook"
                            href="https://web.facebook.com/pages/Anak-Saleh-El-school/206693209353991"
                            aria-label="Facebook"></a>
                        <a class="btn btn-light mx-2 ft-instagram"
                            href="https://www.instagram.com/paudterpaduanaksalehmalang/?hl=id"
                            aria-label="Instagram"></a>
                    </div>

                    <div class="col-lg-4 text-lg-end">
                        <a class="link-light text-decoration-none me-3" href="#popup">Privacy Policy</a>
                        <div id="popup">
                            <div class="window">
                                <a href="#kaki" class="close-button" title="Close">X</a>
                                <h6>Privacy Policy</h6>
                                <p>
                                    <h7>memastikan bahwa hanya Anda yang dapat mengetahui password akun anda, dan tidak
                                        ada
                                        siapa pun di antaranya, bahkan developer pun. Hal ini karena, dengan enkripsi
                                        secara
                                        HashPassword, Password Anda diamankan dengan sebuah kunci.</h7>
                            </div>
                        </div>

                        <a class="link-light text-decoration-none" href="#popupp">Terms of Use</a>
                        <div id="popupp">
                            <div class="window">
                                <a href="#kaki" class="close-button" title="Close">X</a>
                                <h6>Dalam penggunaan web ini, Anda setuju untuk:</h6>
                                <p>
                                    <h7>memberikan informasi yang akurat, baru dan komplit tentang diri Anda saat
                                        mengisi
                                        formulir pendaftaran pada sekolah saleh.
                                        menjaga dan secara berkala meng-update informasi tentang diri Anda dan informasi
                                        lainnya secara akurat, baru dan komplit
                                        menerima seluru risiko dari akses ilegal atas informasi dan data regsitrasi
                                        bertanggung jawab atas proteksi dan back up data dan atau peralatan yang
                                        digunakan
                                    </h7>
                            </div>
                        </div>
                    </div>
                </div>
                Yayasan Pendidikan Anak Saleh
            </div>
        </footer>
    </section>
</body>

</html>
