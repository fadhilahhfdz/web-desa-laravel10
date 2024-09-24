@extends('user.main')
@section('content')
    <div class="container">
        <h2 class="text-center my-3">DESA ANTIKORUPSI</h2>
        {{-- {!! $desaAntikorupsi->first()->konten ?? 'Konten tidak tersedia' !!} --}}
        @foreach ($desaAntikorupsi as $item)
            {!! $item->konten !!}
        @endforeach
    </div>
@endsection