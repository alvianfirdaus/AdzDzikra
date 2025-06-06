@extends('layouts.source')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Selamat Datang | Adz-Dzikra</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="real.css">
    <link rel="stylesheet" href="landing/css/sosmed.css">
    <link rel="icon" type="image/icon" sizes="32x32" href="/landing/images/adzdzikra.png">
</head>

<body id="top-page">
    {{-- Navbar Section (Elang) --}}
    <nav class="navbar navbar-expand-lg navbar-light fixed-top navbar-color">
        <div class="container">
            <img class="navbar-img" src="/landing/images/adzdzikra.png" sizes="32x32">
            <p class="navbar-logo-text">Ponpes Adz-Dzikra</p>

            <!-- Button Mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#top-page">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#one">Pengumuman</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#gallery">Gallery</a>
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
                        <a class="nav-link" href="#tutors">Video Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    {{-- Header Welcoming Section (Elang) --}}
    <header class="mast-hero">
        <div class="container">
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <div class="mast-hero-subheading"> </div>
            <div class="mast-hero-heading text-uppercase"></div>
            <div class="mast-hero-subheading"></div>
            <a class="btn-hero btn-hero-style text-uppercase" href="{{ route('register') }}">Daftar Sekarang ! </a>
        </div>

    </header>
    <marquee bgcolor="#283845" width="100%" color="#ffff">
        <h1 style="color:#FFFF00; font-size: 1rem;">Penting : Pendaftaran Akan segera ditutup ! daftarkan segera anak
            anda, bersama Yayasan Pondok Pesantren Adz-Dzikra Banyuwangi</h1>
    </marquee>
    {{-- Deadline Section --}}
    <div class="page-section">
        <script src="https://cdn.logwork.com/widget/countdown.js"></script>
        <a href="https://logwork.com/countdown-zaeb" class="countdown-timer" data-style="circles"
            data-timezone="Asia/Jakarta" data-date="2025-05-28 23:00" data-background="#283845"
            data-digitscolor="#283845">Deadline Pendaftaran</a>
    </div>

    {{-- About Sekolah (Elang) --}}
    <section class="page-section" id="about" style="margin-top: -2rem;">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Pondok Pesantren Adz-Dzikra Banyuwangi</h2>
                <h3 class="section-subheading text-muted">
                Ponpes Adz Dzikra Banyumas telah dengan bangga menyediakan layanan dan santri berkualitas tinggi 
                di daerah tersebut sejak tahun 2018. Yang membedakan kami dari sekolah agama lain adalah kemampuan 
                kami untuk benar-benar terhubung dengan para santri, dan menyediakan layanan yang luar biasa dan penuh 
                kasih sayang yang layak mereka dapatkan. Untuk mempelajari lebih lanjut, cukup telusuri situs kami.
                </h3>
            </div>
        </div>
    </section>

    {{-- About section 1 --}}
    <section class="about-section">
        <div class="container px-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6 order-lg-2">
                    <div class="p-5"><img class="img-section rounded-circle" src="/landing/images/about/sejarah11.png"
                            alt="..." /></div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="p-5">
                        <h2 class="display-4 section-right">Pada Tahun 2008</h2>
                        <p class="about-section-text section-right">Pondok Pesantren Adz Dzikra berdiri sejak 2018 yang diasuh langsung oleh 
                            KH. Ir. Achmad Wahyudi, SH,. MH. Kami memberikan percontohan bagi sekolah lain dalam hal pembelajaran agama yang 
                            berada di Pondok Pesantren kami. Komitmen kami adalah membangun karakter santri yang bertanggungjawab, mempunyai 
                            sikap kepemimpinan, keuletan, kedisiplinan, kekeluargaan dan fokus mengkaji nahwu sorof sebagai fokus utama dalam 
                            mempelajari kalamullah untuk dapat menafsirkan Al Quran. Mari bergabung bersama Ponpes Adz Dzikra Banyuwangi.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- About section 2 --}}
    <section>
        <div class="container px-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6">
                    <div class="p-5 section-right"><img class="img-section rounded-circle"
                            src="/landing/images/about/sejarah22.png" alt="..." /></div>
                </div>
                <div class="col-lg-6">
                    <div class="p-5">
                        <h2 class="display-4">Menyemai Ilmu, Menumbuhkan Akhlak, Menggapai Ridha Ilahi</h2>
                        <p class="about-section-text"> 
                        Pesantren Adz Dzikra Banyuwangi adalah tempat belajar, beribadah, dan berjuang dalam menuntut ilmu 
                        dengan bimbingan para asatidz yang berkompeten. Kami berkomitmen mencetak generasi yang beriman, berilmu, 
                        dan berakhlakul karimah, siap menghadapi tantangan zaman dengan tetap berpegang teguh pada nilai-nilai Islam.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div>
        {{-- <img src="images/sekolah.jpg" alt="">
        <img src="images/sekolah.jpg" alt=""> --}}
    </div>

    <!-- pengumuman -->
    <section id="one" style="background-color: #c5d0d8;">

        <div class="py-5">
            <div class="container">
                <h1 class="section-heading text-center text-uppercase" style="margin-bottom: 2rem">Pengumuman</h1>
                <div class="row">
                    <div class="owl-carousel pengumumans-carousel owl-theme">
                        @foreach ($pengumumans as $pengumuman)
                            <div class="item">
                                <div class="card">
                                    <img src="{{ asset("storage/pengumuman/$pengumuman->gambar_pengumuman") }}"
                                        alt="Pengumuman Image" height="250px" width="300px">
                                    <div class="card-body">
                                        <h5>{{ $pengumuman->judul_pengumuman }}</h5>
                                        <span>{{ $pengumuman->desc_pengumuman }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- gallery --}}
    <section id = gallery>
        <div class="container" style="padding: 3rem;">
            <h1 class="section-heading text-center text-uppercase" style="margin-bottom: 2rem">Gallery</h1>
            <div class="row">
                <div class="col-6">
                    <div class="owl-carousel tk-carousel owl-theme">
                        @foreach ($gallery as $galeri)
                            @if ($galeri->kategori_galeri == 'SMP')
                                <div class="item">
                                    <div class="card">
                                        <img src="{{ asset("storage/gallery/$galeri->gambar_galeri") }}"
                                            alt="Pengumuman Image" height="250px" width="300px">
                                        <div class="card-body">
                                            <h5>{{ $galeri->kategori_galeri }}</h5>
                                            <span>{{ $galeri->keterangan_galeri }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-6">
                    <div class="owl-carousel paud-carousel owl-theme">
                        @foreach ($gallery as $galeri)
                            @if ($galeri->kategori_galeri == 'MA')
                                <div class="item">
                                    <div class="card">
                                        <img src="{{ asset("storage/gallery/$galeri->gambar_galeri") }}"
                                            alt="Pengumuman Image" height="250px" width="300px">
                                        <div class="card-body">
                                            <h5>{{ $galeri->kategori_galeri }}</h5>
                                            <span>{{ $galeri->keterangan_galeri }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="tutors">
        <div class="tengah">
            <div class="kolom">
                <p class="deskripsi">Social Media</p>
                <h2>Pondok Pesantren Adz Dzikra</h2>
            </div>
        </div>

        <div class="container">
            <div class="containersosmed">
            <a class="social-icon" href="https://www.youtube.com/@sanadzhebat" aria-label="YouTube">
                <i class="fa-brands fa-youtube youtube"></i>
            </a>
            <a class="social-icon" href="https://www.tiktok.com/@sanadz_official" aria-label="TikTok">
                <i class="fa-brands fa-tiktok tiktok"></i>
            </a>
            <a class="social-icon" href="https://www.instagram.com/pp.adzdzikraa?igsh=MWVxc3kyNDh1N3pxYw==" aria-label="Instagram">
                <i class="fa-brands fa-instagram instagram"></i>
            </a>
            </div>

            <script>
                function toggleName(id) {
                    let nameElement = document.getElementById(id);
                    nameElement.style.display = nameElement.style.display === "none" ? "block" : "none";
                }
            </script>
        </div>
        <br>
        <br>
        <br>
        <section id="tutors">
            <div class="tengah">
                <div class="kolom">
                    <p class="deskripsi">Video Profil</p>
                    <h2>Pondok Pesantren Adz-Dzikra Bnayuwangi</h2>
                </div>
                <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0"width="534" height="300"
                    type="text/html"
                    src="https://www.youtube.com/embed/wTChLxxB22M" title="" frameBorder="0"   allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"  allowFullScreen><br>Powered by <a href="https://youtubeembedcode.com">
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

</body>

</html>
