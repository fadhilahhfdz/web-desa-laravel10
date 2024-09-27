@extends('user.main')
@section('content')
    <h2 class="text-black text-center mt-3">KATALOG BUKU PERPUSTAKAAN</h2>
    <!-- End Breadcrumbs -->
    <section class="news-single section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="row">
                        @forelse ($perpustakaan as $item)
                            <div class="col-6 col-sm-4 image-gallery">
                                <a href="/perpustakaan/buku/detail/{{ $item->id }}">
                                    <div class="single">
                                        <div class="single-image">
                                            <img src="{{ asset($item->cover) }}" alt="{{ $item->judul }}" width="250">
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="single-main">
                                    <div class="alert alert-danger">
                                        <p class="text-center">Buku belum tersedia</p>
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </div>
                    <div class="col-lg-12 col-12 d-flex justify-content-end">
                        {{ $perpustakaan->links('vendor.pagination.custom') }}
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="main-sidebar">
                        <div class="single-widget search">
                            <div class="form">
                                <form action="/perpustakaan/buku/cari" method="GET">
                                    <input type="text" name="s" placeholder="Cari Disini...">
                                    <button type="submit" class="button"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="single-widget category">
                            <h3 class="title">Genre Buku</h3>
                            @forelse ($genreBuku as $item)
                                <ul class="categor-list">
                                    <li><a
                                            href="/perpustakaan/buku/buku_by_genre/{{ $item->id }}">{{ $item->nama }}</a>
                                    </li>
                                </ul>
                            @empty
                                <div class="alert alert-danger">
                                    <p class="text-center">Belum ada Genre</p>
                                </div>
                            @endforelse
                        </div>
                        <!--/ End Single Widget -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
