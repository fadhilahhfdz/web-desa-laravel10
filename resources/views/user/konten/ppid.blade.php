@extends('user.main')
@section('content')
    <div class="container">
        <h2 class="text-center my-3">{{ $ppid->judul }}</h2>
        {!! $ppid->konten !!}
    </div>
@endsection
