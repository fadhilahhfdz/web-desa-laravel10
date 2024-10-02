@extends('user.main')
@section('content')
    <div class="container">
        <h2 class="text-center my-3">{{ $rkpDes->judul }}</h2>
        {!! $rkpDes->konten !!}
    </div>
@endsection