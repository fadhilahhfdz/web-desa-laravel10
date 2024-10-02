@extends('user.main')
@section('content')
    <div class="container my-3">
        <h2 class="text-center my-3">{{ $profilDesa->judul }}</h2>
        {!! $profilDesa->konten !!}
    </div>
@endsection
