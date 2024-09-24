@extends('user.main')
@section('content')
    <div class="container">
        <h2 class="text-center my-3">PRODUK HUKUM</h2>
        {!! $produkHukum->first()->konten ?? 'Konten tidak tersedia' !!}
    </div>
@endsection