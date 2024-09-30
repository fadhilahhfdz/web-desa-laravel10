@extends('user.main')
@section('content')
    <div class="container">
        <h2 class="text-center my-3">APB DESA</h2>
        @foreach ($apbDesa as $item)
            {!! $item->konten !!}
        @endforeach
    </div>
@endsection
