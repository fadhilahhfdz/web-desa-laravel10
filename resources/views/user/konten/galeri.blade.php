@extends('user.main')
@section('content')
    <div class="container">
        <h2 class="text-center my-3">GALERI</h2>

        <div class="row">
            @foreach ($galeri as $item)
                <div class="col-md-4 mb-3 image-gallery">
                    <div class="card single-image">
                        <img src="{{ asset($item->foto) }}" class="card-img-top" alt="Gambar Galeri" style="cursor:pointer;"
                            data-bs-toggle="modal" data-bs-target="#galeriModal{{ $item->id }}">
                    </div>
                </div>

                <!-- Modal untuk setiap gambar -->
                <div class="modal fade" id="galeriModal{{ $item->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-body">
                                <img src="{{ asset($item->foto) }}" class="img-fluid" alt="{{ $item->caption }}">
                            </div>
                            <div class="modal-footer justify-content-start">
                                <p style="color: black">{{ $item->caption }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-md-12 d-flex justify-content-center mb-4">
                {{ $galeri->links('vendor.pagination.custom') }}
            </div>
        </div>
    </div>
@endsection
