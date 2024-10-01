@extends('user.main')
@section('content')
    <div class="container">
        <h2 class="text-center my-3">APB DESA</h2>
            {!! $apbKonten->konten !!}
    </div>
@endsection
