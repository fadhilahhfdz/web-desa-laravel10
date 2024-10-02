@extends('user.main')
@section('content')
    <div class="container">
        <h2 class="text-center my-3">{{ $apbKonten->judul }}</h2>
            {!! $apbKonten->konten !!}
    </div>
@endsection
