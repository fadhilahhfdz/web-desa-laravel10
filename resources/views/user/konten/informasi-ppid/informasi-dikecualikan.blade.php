@extends('user.main')
@section('content')
    <div class="container">
        <h2 class="text-center my-3">INFORMASI DIKECUALIKAN</h2>
        @foreach ($informasiDikecualikan as $item)
            {!! $item->konten !!}
        @endforeach
    </div>
@endsection