@extends('layouts.source')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pendidikan | SMP KADER ADZ-DZIKRA</title>
    <link rel="stylesheet" href="real.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="icon" type="image/icon" sizes="32x32" href="/landing/images/adzdzikra.png">
</head>

<body id="top-page">
    {{-- Navbar Section (Elang) --}}
    <nav class="navbar navbar-expand-lg navbar-light fixed-top navbar-color">
        <div class="container">
            <img class="navbar-img" src="/landing/images/smpk.png" sizes="32x32">
            <p class="navbar-logo-text">SMP KADER ADZ-DZIKRA</p>

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

                    <!-- Dropdown Pendidikan -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown">
                            Pendidikan
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <!-- <li><a class="dropdown-item" href="{{ route('landing.sd') }}">Pendidikan SD</a></li>
                            <li>
                                <hr class="dropdown-divider" style="border-top: 1px solid rgba(255, 255, 255, 0.3);">
                            </li> -->
                            <li><a class="dropdown-item" href="{{ route('landing.smp') }}">Pendidikan SMP</a></li>
                            <li>
                                <hr class="dropdown-divider" style="border-top: 1px solid rgba(255, 255, 255, 0.3);">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('landing.ma') }}">Pendidikan MA</a></li>
                        </ul>
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
                <h2>SMP KADER ADZ-DZIKRA</h2>
                <p>SMP KADER ADZ-DZIKRA adalah sekolah berbasis Islam yang berkomitmen dalam membentuk generasi muda 
                    yang berakhlak mulia, cerdas, dan siap menghadapi masa depan. Dengan perpaduan kurikulum nasional dan pendidikan Islam, 
                    kami memberikan pembelajaran yang holistik untuk mengembangkan kecerdasan intelektual, emosional, dan spiritual siswa.
                </p>
                <!-- Button Register -->
        <div class="button-container">
            <a href="{{ route('register') }}" class="btn-primary">Daftar Sekarang</a>
        </div>
    
            </div>
            <div class="gambar-konten">
                <img src="{{ asset('img/smp1.png') }}" alt="Gambar SD">
            </div>
        </div>
    </section>

    <section class="visi-misi-container">
        <div class="visi">
            <h2>Visi Adz-Dzikra</h2>
            <p>Terbentuknya insan yang bertaqwa kepada Allah SWT, Berakhlaq mulia, Berilmu dan beramal secara berdaya bagi Islam, bangsa dan negara.</p>
        </div>
        <div class="misi">
            <h2>Misi</h2>
            <ul>
                <p>Mencetak kader Ahlusunnah Wal Jamaah Annahdiyyah yang sesungguhnya, menyiapkan calon Pemimpin yang memiliki jiwa Leadership, 
                    membekali ilmu berbasis kitab para Ulama dalam mencapai pemahaman Al Qur'an dan Hadist sesuai sanad keilmuan para Ulama, menjaga, 
                    memelihara dan mengamalkan Warisan Ulama dan Habaib.</p>
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
                    <p class="deskripsi">Gallery SMP KADER ADZ-DZIKRA</p>
                </div>
                <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0"width="534" height="300"
                    type="text/html"
                    src="https://www.youtube.com/embed/NkZV7gE8xIQ" title="" frameBorder="0"   allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"  allowFullScreen><br>Powered by <a href="https://youtubeembedcode.com">
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
        <div class="col-lg-4 text-lg-start">Copyright &copy; Tim IT Ponpes Adz-Dzikra 2025 - <span id="year"></span></div>
        <script>document.getElementById("year").textContent = new Date().getFullYear();</script>
        <div class="col-lg-4 my-3 my-lg-0">
            <a class="btn btn-light mx-2" href="https://www.youtube.com/@sanadzhebat" aria-label="YouTube">
                <i class="fa-brands fa-youtube"></i>
            </a>
            <a class="btn btn-light mx-2" href="https://www.tiktok.com/@sanadz_official" aria-label="TikTok">
                <i class="fa-brands fa-tiktok"></i>
            </a>
            <a class="btn btn-light mx-2" href="https://www.instagram.com/pp.adzdzikraa?igsh=MWVxc3kyNDh1N3pxYw==" aria-label="Instagram">
                <i class="fa-brands fa-instagram"></i>
            </a>
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
        Yayasan Pondok Pesantren Adz-Dzikra
    </div>
</footer>

</section>
</body>

</html>
