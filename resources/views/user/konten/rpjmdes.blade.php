@extends('user.main')
@section('content')
    <div class="container">
        <h2 class="text-center my-3">{{ $rpjmDes->judul }}</h2>
        {!! $rpjmDes->konten !!}
    </div>
@endsection