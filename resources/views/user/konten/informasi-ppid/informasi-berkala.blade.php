@extends('user.main')
@section('content')
    <div class="container">
        <h2 class="text-center my-3">INFORMASI BERKALA</h2>
        @foreach ($informasiBerkala as $item)
            {!! $item->konten !!}
        @endforeach
    </div>
@endsection