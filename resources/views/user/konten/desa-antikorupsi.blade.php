@extends('user.main')
@section('content')
    <div class="container">
        <h2 class="text-center my-3">DESA ANTIKORUPSI</h2>
        {!! $desaAntikorupsi->first()->konten ?? 'Konten tidak tersedia' !!}
    </div>
@endsection