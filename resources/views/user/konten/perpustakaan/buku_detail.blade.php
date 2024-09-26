@extends('user.main')
@section('content')
    <section class="news-single section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="single-main">
                                <h1 class="news-title m-0 mb-3">{{ $perpustakaan->judul }}</h1>
                                <!-- Meta -->
                                <div class="meta">
                                    <div class="meta-left">
                                        <span class="author mr-5"><img src="{{ asset('assets/img/profile.png') }}"
                                                alt="#">{{ $perpustakaan->publisher }}</span>
                                    </div>
                                    <div class="meta-right">
                                        <span class="date ml-5"><i
                                                class="fa fa-calendar"></i>{{ $perpustakaan->updated_at->format('d F Y') }}</span>
                                        <span class="date"><i
                                                class="fa fa-clock-o"></i>{{ $perpustakaan->updated_at->format('H:i') }}</span>
                                    </div>
                                </div>
                                <!-- image -->
                                <div class="row justify-content-center">
                                    <img src="{{ asset( $perpustakaan->cover )}}" alt="{{ $perpustakaan->judul }}" width="250">
                                </div>
                                <!-- image -->
                                <!-- News Text -->
                                <div class="news-text mt-3">
                                    {!! $perpustakaan->konten !!}
                                </div>
                                <div class="blog-bottom">
                                    <h5 class="fw-bold">Editions:</h5>
                                    <p class="fw-bold">Publisher: <span>{{ $perpustakaan->publisher }}</span></p>
                                    <p class="fw-bold">Genre: <span>{{ $perpustakaan->genre->nama }}</span></p>
                                    <p class="fw-bold">Status Buku: <span>{{ $perpustakaan->status }}</span></p>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-12">
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
                                                </div>
                                            </div>
                                        </div>
                                        <!--/ End Single Comments -->
                                    @empty
                                        <p class="text-center">Belum ada komentar</p>
                                    @endforelse
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="col-12">
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
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="main-sidebar">
                        <div class="single-widget category">
                            <h3 class="title">Genre Buku</h3>
                            @foreach ($genreBuku as $item)
                                <ul class="categor-list">
                                    <li><a href="/perpustakaan/buku/buku_by_genre/{{ $item->id }}">{{ $item->nama }}</a></li>
                                </ul>
                            @endforeach
                        </div>
                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
