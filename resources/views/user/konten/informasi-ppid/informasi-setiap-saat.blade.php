@extends('user.main')
@section('content')
    <div class="container">
        <h2 class="text-center my-3">INFORMASI SETIAP SAAT</h2>
        @foreach ($informasiSetiapSaat as $item)
            {!! $item->konten !!}
        @endforeach
    </div>
@endsection