<!doctype html>
<html class="no-js" lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{-- <meta name="keywords" content="Site keywords here">
		<meta name="description" content="">
		<meta name='copyright' content=''> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Website Resmi - Desa {{ isset($informasiDesa[0]) ? $informasiDesa[0]->nama_desa : 'Nama desa belum ada' }}
    </title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/img/favicon.png') }}">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('template-user/css/bootstrap.min.css') }}">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{ asset('template-user/css/nice-select.css') }}">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{ asset('template-user/css/font-awesome.min.css') }}">
    <!-- icofont CSS -->
    <link rel="stylesheet" href="{{ asset('template-user/css/icofont.css') }}">
    <!-- Slicknav -->
    <link rel="stylesheet" href="{{ asset('template-user/css/slicknav.min.css') }}">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('template-user/css/owl-carousel.css') }}">
    <!-- Datepicker CSS -->
    <link rel="stylesheet" href="{{ asset('template-user/css/datepicker.css') }}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('template-user/css/animate.min.css') }}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{ asset('template-user/css/magnific-popup.css') }}">

    <!-- Medipro CSS -->
    <link rel="stylesheet" href="{{ asset('template-user/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('template-user/style.css') }}">
    <link rel="stylesheet" href="{{ asset('template-user/css/responsive.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    {{-- chart js --}}
    <link rel="stylesheet" href="{{ asset('template-admin/plugins/chart.js/Chart.css') }}">
    <link rel="stylesheet" href="{{ asset('template-admin/plugins/chart.js/Chart.min.css') }}">

</head>

<body>

    <!-- Header Area -->
    <header class="header">
        <!-- Topbar -->
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-5 col-12">
                        <!-- Contact -->
                        <div class="logo">
                            <h1 class="text"><a href="#">Desa
                                    <span>{{ isset($informasiDesa[0]) ? $informasiDesa[0]->nama_desa : 'Nama desa belum ada' }}</span></a>
                            </h1>
                        </div>
                        <!-- End Contact -->
                    </div>
                    <div class="col-lg-6 col-md-7 col-12">
                        <!-- Top Contact -->
                        <ul class="top-contact mt-5">
                            <li><i
                                    class="fa fa-phone"></i>{{ isset($informasiDesa[0]) ? $informasiDesa[0]->hotline_desa : 'Hotline desa belum ada' }}
                            </li>
                            <li><i class="fa fa-envelope"></i><a
                                    href="mailto:{{ isset($informasiDesa[0]) ? $informasiDesa[0]->email_desa : 'Email desa belum ada' }}">{{ isset($informasiDesa[0]) ? $informasiDesa[0]->email_desa : 'Email desa belum ada' }}</a>
                            </li>
                        </ul>
                        <!-- End Top Contact -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Topbar -->
        <!-- Header Inner -->
        <div class="header-inner sticky-top">
            <div class="container">
                <div class="inner">
                    <div class="row justify-content-end">
                        <div class="col-12">
                            <!-- Mobile Nav -->
                            <div class="mobile-nav justify-content-end"></div>
                            <!-- End Mobile Nav -->
                        </div>
                        <div class="col-lg-12 col-md-9 col-12">
                            <!-- Main Menu -->
                            <div class="main-menu">
                                <nav class="navigation">
                                    <ul class="nav menu">
                                        <li><a href="/">BERANDA</a>
                                        </li>
                                        <li><a href="#">PROFIL </a><i class="icofont-rounded-down"></i></a>
                                            <ul class="dropdown">
                                                @foreach ($dropdownProfil as $item)
                                                    <li><a href="/profil-desa/{{ $item->id }}">{{ $item->judul }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li><a href="#">PELAYANAN </a><i class="icofont-rounded-down"></i></a>
                                            <ul class="dropdown">
                                                @foreach ($dropdownPelayanan as $item)
                                                    <li><a href="/pelayanan/{{ $item->id }}">{{ $item->judul }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li><a href="#">PPID <i class="icofont-rounded-down"></i></a>
                                            <ul class="dropdown">
                                                @foreach ($dropdownPpid as $item)
                                                    <li><a href="/ppid/{{ $item->id }}">{{ $item->judul }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li><a href="/produk-hukum">PRODUK HUKUM</a></li>
                                        <li><a href="/apb">APB DESA</a></li>
                                        <li><a href="/desa-antikorupsi">DESA ANTIKORUPSI</a></li>
                                        <li><a href="/berita">BERITA</a></li>
                                        <li><a href="#">PERPUSTAKAAN <i class="icofont-rounded-down"></i></a>
                                            <ul class="dropdown">
                                                <li><a href="/katalog">KATALOG BUKU</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <!--/ End Main Menu -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Header Inner -->
    </header>
    <!-- End Header Area -->

    @yield('content')

    <!-- Footer Area -->
    <footer id="footer" class="footer">
        <!-- Footer Top -->
        <div class="footer-top">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-footer">
                            <h2>Tentang Kami</h2>
                            <p>{{ isset($informasiDesa[0]) ? Str::limit($informasiDesa[0]->deskripsi_desa, 300) : 'Deskripsi desa belum ada' }}
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-footer">
                            <h2>Hotline</h2>
                            <ul class="time-sidual">
                                <li>{{ isset($informasiDesa[0]) ? $informasiDesa[0]->hotline_desa : 'Hotline desa belum ada' }}
                                </li>
                                <li><a href="https://wa.me/{{ isset($informasiDesa[0]) ? $informasiDesa[0]->hotline_desa : 'Hotline desa belum ada' }}" class="btn">Hubungi Kami</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-footer">
                            <h2>Waktu Pelayanan</h2>
                            <ul class="time-sidual">
                                @forelse ($waktuLayanan as $item)
                                    <li class="day">{{ $item->hari }}
                                        <span>{{ \Carbon\Carbon::parse($item->jam_buka)->format('H:i') }}-{{ \Carbon\Carbon::parse($item->jam_tutup)->format('H:i') }}</span>
                                    </li>
                                @empty
                                    <li class="text-warning">*Waktu pelayanan belum di setting</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Footer Top -->
        <!-- Copyright -->
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="copyright-content">
                            <p>© Copyright 2024 | All Rights Reserved</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Copyright -->
    </footer>
    <!--/ End Footer Area -->

    <!-- jquery Min JS -->
    <script src="{{ asset('template-user/js/jquery.min.js') }}"></script>
    <!-- jquery Migrate JS -->
    <script src="{{ asset('template-user/js/jquery-migrate-3.0.0.js') }}"></script>
    <!-- jquery Ui JS -->
    <script src="{{ asset('template-user/js/jquery-ui.min.js') }}"></script>
    <!-- Easing JS -->
    <script src="{{ asset('template-user/js/easing.js') }}"></script>
    <!-- Color JS -->
    <script src="{{ asset('template-user/js/colors.js') }}"></script>
    <!-- Popper JS -->
    <script src="{{ asset('template-user/js/popper.min.js') }}"></script>
    <!-- Bootstrap Datepicker JS -->
    <script src="{{ asset('template-user/js/bootstrap-datepicker.js') }}"></script>
    <!-- Jquery Nav JS -->
    <script src="{{ asset('template-user/js/jquery.nav.js') }}"></script>
    <!-- Slicknav JS -->
    <script src="{{ asset('template-user/js/slicknav.min.js') }}"></script>
    <!-- ScrollUp JS -->
    <script src="{{ asset('template-user/js/jquery.scrollUp.min.js') }}"></script>
    <!-- Niceselect JS -->
    <script src="{{ asset('template-user/js/niceselect.js') }}"></script>
    <!-- Tilt Jquery JS -->
    <script src="{{ asset('template-user/js/tilt.jquery.min.js') }}"></script>
    <!-- Owl Carousel JS -->
    <script src="{{ asset('template-user/js/owl-carousel.js') }}"></script>
    <!-- counterup JS -->
    <script src="{{ asset('template-user/js/jquery.counterup.min.js') }}"></script>
    <!-- Steller JS -->
    <script src="{{ asset('template-user/js/steller.js') }}"></script>
    <!-- Wow JS -->
    <script src="{{ asset('template-user/js/wow.min.js') }}"></script>
    <!-- Magnific Popup JS -->
    <script src="{{ asset('template-user/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Counter Up CDN JS -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('template-user/js/bootstrap.min.js') }}"></script>
    <!-- Main JS -->
    <script src="{{ asset('template-user/js/main.js') }}"></script>

    <script src="{{ asset('template-admin/plugins/chart.js/Chart.js') }}"></script>
    <script src="{{ asset('template-admin/plugins/chart.js/Chart.bundle.js') }}"></script>
    <script src="{{ asset('template-admin/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('template-admin/plugins/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('template-user/js/scroll.js') }}"></script>

    @stack('script')
</body>

</html>
