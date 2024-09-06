@extends('user.main')
@section('content')
    <!-- Breadcrumbs -->
    <div class="breadcrumbs overlay">
        <div class="container">
            <div class="bread-inner">
                <div class="row">
                    <div class="col-12">
                        <h2>Berita</h2>
                        <ul class="bread-list">
                            <li><a href="/">Beranda</a></li>
                            <li><i class="icofont-simple-right"></i></li>
                            <li class="active">Berita</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
    <section class="news-single section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12">
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
                                $teks = \Illuminate\Support\Str::limit($hapus_image, 350);
                                $img = implode('', $images);
                            @endphp
                            <div class="col-12">
                                <div class="single-main mb-3">
                                    <!-- News Head -->
                                    <div class="news-head">
                                        {!! $img !!}
                                    </div>
                                    <!-- News Title -->
                                    <h1 class="news-title">{{ $berita->judul }}</h1>
                                    <!-- Meta -->
                                    <div class="meta">
                                        <div class="meta-left">
                                            <span class="author"><img src="{{ asset('assets/img/profile.png') }}"
                                                    alt="#">{{ $berita->author }}</span>
                                        </div>
                                        <div class="meta-right">
                                            <span class="date ml-5"><i
                                                    class="fa fa-calendar"></i>{{ $berita->updated_at->format('d F Y') }}</span>
                                            <span class="date"><i
                                                    class="fa fa-clock-o"></i>{{ $berita->updated_at->format('H:i') }}</span>
                                        </div>
                                    </div>
                                    <!-- News Text -->
                                    <div class="news-text">
                                        {!! $teks !!}
                                    </div>
                                    <div class="blog-bottom">
                                        <a href="/detail-berita/{{ $berita->id }}" class="btn btn-sm text-white">Baca
                                            Selengkapnya</a>
                                        <!-- Next Prev -->
                                        {{-- <ul class="prev-next">
                                        <li class="prev"><a href="#"><i class="fa fa-angle-double-left"></i></a>
                                        </li>
                                        <li class="next"><a href="#"><i class="fa fa-angle-double-right"></i></a>
                                        </li>
                                    </ul> --}}
                                        <!--/ End Next Prev -->
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="single-main">
                                    <div class="alert alert-danger">
                                        <p class="text-center">Berita belum tersedia</p>
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="main-sidebar">
                        <!-- Single Widget -->
                        {{-- <div class="single-widget search">
                            <div class="form">
                                <input type="email" placeholder="Search Here...">
                                <a class="button" href="#"><i class="fa fa-search"></i></a>
                            </div>
                        </div> --}}
                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
                        <div class="single-widget category">
                            <h3 class="title">Kategori</h3>
                            @forelse ($kategori as $kategori)
                                <ul class="categor-list">
                                    <li><a href="/berita-by-kategori/{{ $kategori->id }}">{{ $kategori->nama }}</a></li>
                                </ul>
                            @empty
                                <div class="alert alert-danger">
                                    <p class="text-center">Belum ada kategori</p>
                                </div>
                            @endforelse
                        </div>
                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
                        {{-- <div class="single-widget side-tags">
                            <h3 class="title">Tags</h3>
                            <ul class="tag">
                                <li><a href="#">business</a></li>
                                <li><a href="#">wordpress</a></li>
                                <li><a href="#">html</a></li>
                                <li><a href="#">multipurpose</a></li>
                                <li><a href="#">education</a></li>
                                <li><a href="#">template</a></li>
                                <li><a href="#">Ecommerce</a></li>
                            </ul>
                        </div> --}}
                        <!--/ End Single Widget -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
