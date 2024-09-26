@extends('admin.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Buku Perpustakan</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Buku Perpustakan</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Edit Buku Perpustakan
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="/admin/perpustakaan/buku/edit/{{ $perpustakaan->id }}" method="POST" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="d-flex justify-content-end">
                                        <a href="/admin/perpustakaan/buku" class="btn btn-sm btn-outline-secondary mx-2"><i class="fas fa-caret-left"></i> Kembali</a>
                                        <button type="submit" class="btn btn-sm btn-primary"><i class="fab fa-telegram-plane"></i> Submit</button>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="judul">Judul Buku</label>
                                            <input type="text" id="judul" name="judul" value="{{ $perpustakaan->judul }}" class="form-control" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="publisher">Publisher</label>
                                            <input type="text" id="publisher" name="publisher" value="{{ $perpustakaan->publisher }}" class="form-control" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="id_genre">Genre Buku</label>
                                            <select class="form-control" name="id_genre">
                                                <option>-- Pilih Genre --</option>
                                                @foreach ($genreBuku as $item)
                                                    <option value="{{ $item->id }}" {{ $perpustakaan->id_genre == $item->id ? 'selected' : ''}}>{{ $item->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <small class="text-danger">*jika belum ada, silahkan buat genre terlebih dahulu di tab <a href="/admin/perpustakaan/genre">genre buku</a></small>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="status">Status Buku</label>
                                            <select name="status" class="form-control">
                                                <option value="Tersedia" {{ $perpustakaan->status == 'Tersedia' ? 'selected' : ''}}>Tersedia</option>
                                                <option value="Tidak Tersedia" {{ $perpustakaan->status == 'Tidak Tersedia' ? 'selected' : ''}}>Tidak Tersedia</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="cover">Cover Buku</label>
                                            <input type="file" class="form-control" name="cover" accept="image/*">
                                            <small class="text-danger">*biarkan kosong jika tidak ingin mengubah cover</small>
                                            <small class="text-danger">*potrait, max:2mb</small>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="konten">Konten</label>
                                            <textarea name="konten" class="form-control" id="summernote">{{ $perpustakaan->konten }}</textarea>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@push('script')
    <script>
        $(function() {
            // Summernote
            $('#summernote').summernote({
                height: 300
            });
        })
    </script>
@endpush
