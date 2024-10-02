@extends('user.main')
@section('content')
    <div class="container">
        <h2 class="text-center my-3">{{ $pelayanan->judul }}</h2>
        {!! $pelayanan->konten !!}
    </div>
@endsection
