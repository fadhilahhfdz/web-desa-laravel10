@extends('user.main')
@section('content')
    <div class="container">
        <h2 class="text-center my-3">INFORMASI SERTA MERTA</h2>
        @foreach ($informasiSertaMerta as $item)
            {!! $item->konten !!}
        @endforeach
    </div>
@endsection