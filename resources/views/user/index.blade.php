@extends('user.main')
@section('content')
    <!-- Slider Area -->
    <section class="slider">
        <div class="hero-slider">
            <!-- Start Single Slider -->
            <div class="single-slider" id="hero"
                style="background-image:url('{{ isset($fotoDesa[0]) ? asset($fotoDesa[0]->foto_desa) : asset('assets/default.png') }}')">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="text">
                                <h1>Selamat Datang Di <span>Desa
                                        {{ isset($informasiDesa[0]) ? $informasiDesa[0]->nama_desa : 'Nama desa belum ada' }}</span>
                                </h1>
                                <p>{{ isset($informasiDesa[0]) ? Str::limit($informasiDesa[0]->deskripsi_desa, 250) : 'Deskripsi desa belum ada' }}
                                </p>
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
                style="background-image:url('{{ isset($fotoDesa[1]) ? asset($fotoDesa[1]->foto_desa) : asset('assets/default.png') }}')">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="text">
                                <h1>Selamat Datang Di <span>Desa
                                        {{ isset($informasiDesa[0]) ? $informasiDesa[0]->nama_desa : 'Nama desa belum ada' }}</span>
                                </h1>
                                <p>{{ isset($informasiDesa[0]) ? Str::limit($informasiDesa[0]->deskripsi_desa, 250) : 'Deskripsi desa belum ada' }}
                                </p>
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
                style="background-image:url('{{ isset($fotoDesa[2]) ? asset($fotoDesa[2]->foto_desa) : asset('assets/default.png') }}')">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="text">
                                <h1>Selamat Datang Di <span>Desa
                                        {{ isset($informasiDesa[0]) ? $informasiDesa[0]->nama_desa : 'Nama desa belum ada' }}</span>
                                </h1>
                                <p>{{ isset($informasiDesa[0]) ? Str::limit($informasiDesa[0]->deskripsi_desa, 250) : 'Deskripsi desa belum ada' }}
                                </p>
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
                    @foreach ($subInformasiDesa as $item)
                        <div class="col-lg-4 col-md-6 col-12 ">
                            <!-- single-schedule -->
                            <div class="single-schedule first h-100">
                                <div class="inner h-100">
                                    <div class="single-content">
                                        <h4>{{ $item->nama }}</h4>
                                        <p>{{ $item->deskripsi }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-lg-4 col-md-6 col-12 ">
                        <!-- single-schedule -->
                        <div class="single-schedule first h-100">
                            <div class="inner h-100">
                                <div class="single-content">
                                    <div class="single-content">
                                        <h4>Waktu Layanan</h4>
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
                </div>
            </div>
        </div>
    </section>
    <!--/End Start schedule Area -->

    <section class="why-choose section">
        <div class="container">
            <h2 class="text-white text-center text-bold">Info Grafis APB Desa</h2>
            <div class="row mt-5">
                <div class="col-lg-6 col-12">
                    <!-- Start Choose Left -->
                    <div class="choose-left">
                        <h3 class="text-white">Pendapatan Desa Rp.{{ number_format($totalApbPendapatan, 0, ',', '.') }}</h3>
                        @foreach ($apbPendapatan as $item)
                            @php
                                 $percentage = ($totalApbPendapatan > 0) ? ($item->nominal / $totalApbPendapatan) * 100 : 0;
                            @endphp
                            <p class="text-white fs-2">{{ $item->kategori }} Rp.{{ $item->formatRupiah('nominal') }}</p>
                            <div class="progress mb-3">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="{{ $percentage }}" aria-valuemin="0"
                                    aria-valuemax="100" style="width: {{ $percentage }}%;">
                                    {{ round($percentage, 2) }}%
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- End Choose Left -->
                </div>
                <div class="col-lg-6 col-12">
                    <!-- Start Choose Rights -->
                    <div class="choose-left">
                        <h3 class="text-white">Belanja Desa Rp.{{ number_format($totalApbBelanja, 0, ',', '.') }}</h3>
                        @foreach ($apbBelanja as $item)
                            @php
                                 $percentage = ($totalApbBelanja > 0) ? ($item->nominal / $totalApbBelanja) * 100 : 0;
                            @endphp
                            <p class="text-white fs-2">{{ $item->kategori }} Rp.{{ $item->formatRupiah('nominal') }}</p>
                            <div class="progress mb-3">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="{{ $percentage }}" aria-valuemin="0"
                                    aria-valuemax="100" style="width: {{ $percentage }}%;">
                                    {{ round($percentage, 2) }}%
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- End Choose Rights -->
                </div>
            </div>
        </div>
    </section>

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
                            <span class="counter">{{ $totalJiwa }}</span>
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
                        <p class="text-white">
                            {{ isset($informasiDesa[0]) ? $informasiDesa[0]->deskripsi_desa : 'Deskripsi desa belum ada' }}
                        </p>
                    </div>
                    <!-- End Choose Left -->
                </div>
                <div class="col-lg-6 col-12">
                    <!-- Start Choose Rights -->
                    <div class="choose-right"
                        style="background-image: url({{ isset($informasiDesa[0]) ? asset($informasiDesa[0]->thumbnail_video) : asset('assets/img/default.png') }});">
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
                            <a href="{{ isset($informasiDesa[0]) ? $informasiDesa[0]->link_video : '#' }}" class="video"
                                target="blank"><i class="fa fa-play"></i></a>
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
                        <p>Jika ada pertanyaan dan informasi silahkan hubungi kami</p>
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
