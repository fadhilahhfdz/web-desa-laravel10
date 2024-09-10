@extends('user.main')
@section('title', ' - Berita')
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
                            <li class="text-white"><a href="/berita">Berita</a></li>
                            <li><i class="icofont-simple-right"></i></li>
                            <li class="text-white">{{ $berita->judul }}</li>
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
                        @php
                            // Ekstrak semua tag heading (h1, h2, h3, h4, h5, h6)
                            preg_match_all('/<h[1-6][^>]*>(.*?)<\/h[1-6]>/is', $berita->konten, $headingMatches);

                            // Ekstrak semua tag <img>
                            preg_match_all('/<img[^>]+>/i', $berita->konten, $imgMatches);

                            $headings = $headingMatches[0]; // Array dari semua tag heading
                            $images = $imgMatches[0]; // Array dari semua tag <img>

                            // Hapus tag heading dan gambar dari konten untuk mendapatkan sisa teks
                            $teks = preg_replace('/<h[1-6][^>]*>(.*?)<\/h[1-6]>/is', '', $berita->konten);
                            $teks = preg_replace('/<img[^>]+>/i', '', $teks);
                            $img = implode('', $images);
                        @endphp
                        <div class="col-12">
                            <div class="single-main">
                                <!-- News Head -->
                                {{-- <div class="news-head">
                                    {!! $img !!}
                                </div> --}}
                                <!-- News Title -->
                                <h1 class="news-title m-0 mb-3">{{ $berita->judul }}</h1>
                                <!-- Meta -->
                                <div class="meta">
                                    <div class="meta-left">
                                        <span class="author mr-5"><img src="{{ asset('assets/img/profile.png') }}"
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
                                    {!! $berita->konten !!}
                                </div>
                                <div class="blog-bottom">
                                    <!-- Social Share -->
                                    <ul class="social-share">
                                        <li class="facebook"><a href="#"><i
                                                    class="fa fa-facebook"></i><span>Facebook</span></a></li>
                                        <li class="twitter"><a href="#"><i
                                                    class="fa fa-twitter"></i><span>Twitter</span></a></li>
                                        <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
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
                        <div class="col-12">
                            <div class="blog-comments">
                                <h2>Komentar</h2>
                                <hr>
                                <div class="comments-body">
                                    @forelse ($berita->komentar()->orderBy('updated_at', 'desc')->get() as $komen)
                                        <!-- Single Comments -->
                                        <div class="single-comments">
                                            <div class="main">
                                                <div class="head">
                                                    <img src="{{ asset('assets/img/profile.png') }}" alt="profil" />
                                                </div>
                                                <div class="body">
                                                    <h4>{{ $komen->first_name }} {{ $komen->last_name }}</h4>
                                                    <div class="comment-meta"><span class="meta"><i
                                                                class="fa fa-calendar text-primary"></i>{{ $komen->updated_at->format('d F Y') }}</span><span
                                                            class="meta"><i
                                                                class="fa fa-clock-o text-primary"></i>{{ $komen->updated_at->format('H:i') }}</span>
                                                    </div>
                                                    <p>{{ $komen->komentar }}</p>
                                                    {{-- <a href="#"><i class="fa fa-reply"></i>Balas</a> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <!--/ End Single Comments -->
                                    @empty
                                        <p class="text-center">Belum ada komentar</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="comments-form">
                                <h2>Tinggalkan Komentar</h2>
                                <!-- Contact Form -->
                                <form class="form" method="post" action="/detail-berita/{{ $berita->id }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-12">
                                            <div class="form-group">
                                                <i class="fa fa-user"></i>
                                                <input type="hidden" name="id_berita" value="{{ $berita }}">
                                                <i class="fa fa-user"></i>
                                                <input type="text" name="first_name" placeholder="First Name"
                                                    required="required">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-12">
                                            <div class="form-group">
                                                <i class="fa fa-user"></i>
                                                <input type="text" name="last_name" placeholder="Last Name"
                                                    required="required">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-12">
                                            <div class="form-group">
                                                <i class="fa fa-envelope"></i>
                                                <input type="email" name="email" placeholder="Email"
                                                    required="required">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group message">
                                                <i class="fa fa-pencil"></i>
                                                <textarea name="komentar" rows="7" placeholder="Ketik komentar disini..."></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group button">
                                                <button type="submit" class="btn primary"><i class="fa fa-send"></i>Submit
                                                    Komentar</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!--/ End Contact Form -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="main-sidebar">
                        <div class="single-widget category">
                            <h3 class="title">Kategori</h3>
                            @foreach ($kategori as $kategori)
                                <ul class="categor-list">
                                    <li><a href="/berita-by-kategori/{{ $kategori->id }}">{{ $kategori->nama }}</a></li>
                                </ul>
                            @endforeach
                        </div>
                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
                        <div class="single-widget recent-post">
                            <h3 class="title">Berita Terbaru</h3>
                            <!-- Single Post -->
                            @foreach ($recent as $item)
                                @php
                                    preg_match('/<img[^>]+src="([^">]+)"/i', $item->konten, $matches);
                                    $item->img = isset($matches[1]) ? $matches[1] : asset('assets/img/profile.png');
                                @endphp
                                <div class="single-post">
                                    <div class="image">
                                        <img src="{{ $item->img }}" alt="">
                                    </div>
                                    <div class="content">
                                        <h5><a href="/detail-berita/{{ $item->id }}">{{ $item->judul }}</a></h5>
                                        <ul class="comment">
                                            <li><i class="fa fa-calendar"
                                                    aria-hidden="true"></i>{{ $item->updated_at->format('d F Y') }}</li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach

                            <!-- End Single Post -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
