@extends('user.main')
@section('content')
    <div class="container">
        <h4 class="text-center mb-4">PRODUK HUKUM</h4>
        {!! $produkHukum->first()->konten ?? 'Konten tidak tersedia' !!}
    </div>
@endsection