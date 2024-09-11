@extends('user.main')
@section('content')
    <!-- Slider Area -->
    <section class="slider">
        <div class="hero-slider">
            <!-- Start Single Slider -->
            <div class="single-slider" id="hero" style="background-image:url('{{ asset('assets/img/tangkil.webp') }}')">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="text">
                                <h1>Selamat Datang Di <span>Desa Tangkil</span> Kecamatan <span>Sragen</span></h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sed nisl
                                    pellentesque, faucibus libero eu, gravida quam. </p>
                                <div class="button">
                                    <a href="#" class="btn">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Slider -->
            <!-- Start Single Slider -->
            <div class="single-slider" id="hero"
                style="background-image:url('{{ asset('assets/img/tangkil.webp') }}')">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="text">
                                <h1>Selamat Datang Di <span>Desa Tangkil</span> Kecamatan
                                    <span>Sragen</span>
                                </h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sed nisl
                                    pellentesque, faucibus libero eu, gravida quam. </p>
                                <div class="button">
                                    <a href="#" class="btn">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Start End Slider -->
            <!-- Start Single Slider -->
            <div class="single-slider" id="hero"
                style="background-image:url('{{ asset('assets/img/tangkil.webp') }}')">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="text">
                                <h1>Selamat Datang Di <span>Desa Tangkil</span> Kecamatan <span>Sragen</span></h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sed nisl
                                    pellentesque, faucibus libero eu, gravida quam. </p>
                                <div class="button">
                                    <a href="#" class="btn">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Slider -->
        </div>
    </section>
    <!--/ End Slider Area -->

    <!-- Start Schedule Area -->
    <section class="schedule">
        <div class="container">
            <div class="schedule-inner">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12 ">
                        <!-- single-schedule -->
                        <div class="single-schedule first h-100">
                            <div class="inner h-100">
                                <div class="icon">
                                    <i class="fa fa-ambulance"></i>
                                </div>
                                <div class="single-content">
                                    <h4>Mobil Siaga</h4>
                                    <p>Layanan Mobil Siaga GRATIS Tidak dipungut Biaya untuk warga Masyarakat DesaTangkil.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- single-schedule -->
                        <div class="single-schedule middle h-100">
                            <div class="inner h-100">
                                <div class="icon">
                                    <i class="icofont-prescription"></i>
                                </div>
                                <div class="single-content">
                                    <h4>Desa Antikorupsi</h4>
                                    <p>Desa Tangkil mendapatkan penghargaan sebagai Pelopor Desa Antikorupsi di Kabupaten
                                        Sragen, Jawa Tengah</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- single-schedule -->
                        <div class="single-schedule last h-100">
                            <div class="inner h-100">
                                <div class="icon">
                                    <i class="icofont-ui-clock"></i>
                                </div>
                                <div class="single-content">
                                    <h4>Waktu Pelayanan</h4>
                                    <ul class="time-sidual">
                                        <li class="day">Senin s/d Kamis <span>07.30-16.00</span></li>
                                        <li class="day">Istirahat <span>12.00-13.00</span></li>
                                        <li class="day">jumat <span>07.15-14.30</span></li>
                                        <li class="day">Istirahat <span>11.30-14.30</span></li>
                                        <li class="day">Waktu Penyelesaian <span>5 s/d 15 menit</span></li>
                                        <li class="day">Gratis</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/End Start schedule Area -->

    <!-- Start Fun-facts -->
    <div id="fun-facts" class="fun-facts section mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Data Penduduk</h2>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Fun -->
                    <div class="single-fun">
                        <i class="icofont icofont-users"></i>
                        <div class="content">
                            <span class="counter">{{ $penduduk->count() }}</span>
                            <p>Jumlah Penduduk</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Fun -->
                    <div class="single-fun">
                        <i class="icofont icofont-boy"></i>
                        <div class="content">
                            <span class="counter">{{ $totalLakiLaki }}</span>
                            <p>Laki-laki</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Fun -->
                    <div class="single-fun">
                        <i class="icofont icofont-girl"></i>
                        <div class="content">
                            <span class="counter">{{ $totalPerempuan }}</span>
                            <p>Perempuan</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-12">
                    <canvas id="chartPenduduk"
                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- End Single Fun -->

    <!-- Start Why choose -->
    <section class="why-choose section overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <!-- Start Choose Left -->
                    <div class="choose-left">
                        <h3 class="text-white">Tentang Kami</h3>
                        <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pharetra
                            antege vel est
                            lobortis, a commodo magna rhoncus. In quis nisi non emet quam pharetra commodo. </p>
                        <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates libero
                            tempora cum, consequatur culpa repellendus? Totam reiciendis obcaecati omnis, fuga doloremque
                            sit at veniam odit, libero sint possimus tenetur pariatur.</p>
                    </div>
                    <!-- End Choose Left -->
                </div>
                <div class="col-lg-6 col-12">
                    <!-- Start Choose Rights -->
                    <div class="choose-right">
                        <div class="video-image">
                            <!-- Video Animation -->
                            <div class="promo-video">
                                <div class="waves-block">
                                    <div class="waves wave-1"></div>
                                    <div class="waves wave-2"></div>
                                    <div class="waves wave-3"></div>
                                </div>
                            </div>
                            <!--/ End Video Animation -->
                            <a href="#" class="video video-popup mfp-iframe"><i class="fa fa-play"></i></a>
                        </div>
                    </div>
                    <!-- End Choose Rights -->
                </div>
            </div>
        </div>
    </section>
    <!--/ End Why choose -->

    <!-- Start portfolio -->
    <section class="portfolio section pb-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Perangkat Desa</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="owl-carousel portfolio-slider">
                            @foreach ($perangkatDesa as $item)
                            <div class="single-pf">
                                <img src="{{ asset($item->foto) }}" alt="{{ $item->nama }}">
                                <h5 class="d-flex justify-content-center fw-semibold mt-2">{{ $item->nama }}</h5>
                                <p class="d-flex justify-content-center mt-2">{{ $item->jabatan }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
            </div>
        </div>
    </section>
    <!--/ End portfolio -->

    <!-- Start Call to action -->
    <section class="call-action overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="content">
                        <h2>Layanan Hotline Desa</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque porttitor dictum turpis nec
                            gravida.</p>
                        <div class="button">
                            <a href="#" class="btn">Hubungi Kami</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Call to action -->

    <section class="blog section" id="blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title mb-0">
                        <h2>Berita</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($berita as $berita)
                    @php

                        // Ekstrak semua tag heading (h1, h2, h3, h4, h5, h6)
                        preg_match_all('/<h[1-6][^>]*>(.*?)<\/h[1-6]>/is', $berita->konten, $headingMatches);

                        // Ekstrak semua tag <img>
                        preg_match_all('/<img[^>]+>/i', $berita->konten, $imgMatches);

                        $headings = $headingMatches[0]; // Array dari semua tag heading
                        $images = $imgMatches[0]; // Array dari semua tag <img>

                        // Hapus tag heading dan gambar dari konten untuk mendapatkan sisa teks
                        $hapus_heading = preg_replace('/<h[1-6][^>]*>(.*?)<\/h[1-6]>/is', '', $berita->konten);
                        $hapus_image = preg_replace('/<img[^>]+>/i', '', $hapus_heading);
                        $teks = \Illuminate\Support\Str::limit($hapus_image, 100);
                        $img = implode('', $images);
                    @endphp
                    <div class="col-lg-4 col-md-6 col-12 mt-4">
                        <!-- Single Blog -->
                        <div class="single-news">
                            <div class="news-head">
                                {!! $img !!}
                            </div>
                            <div class="news-body">
                                <div class="news-content">
                                    <div class="date">{{ $berita->updated_at->format('d F Y') }}</div>
                                    <h2><a href="/detail-berita/{{ $berita->id }}">{{ $berita->judul }}</a></h2>
                                    <p class="text">{!! $teks !!}</p>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Blog -->
                    </div>
                @empty
                    <div class="col-lg-12 col-md-6 col-12 mt-4">
                        <p class="text-center">Berita belum tersedia</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            var donutChartCanvas = $('#chartPenduduk').get(0).getContext('2d');
            var donutData = {
                labels: [
                    'Laki-laki',
                    'Perempuan'
                ],
                datasets: [{
                    data: [{{ $totalLakiLaki }}, {{ $totalPerempuan }}],
                    backgroundColor: ['#1A76D1', '#9DB2BF'],
                }]
            };
            var donutOptions = {
                maintainAspectRatio: false,
                responsive: true,
            };
            new Chart(donutChartCanvas, {
                type: 'doughnut',
                data: donutData,
                options: donutOptions
            });
        });
    </script>
@endpush
