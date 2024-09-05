    {{-- @extends('admin.main')
    @section('title', ' - Tambah Berita')
    @section('content')
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Berita</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                                <li class="breadcrumb-item active">Berita</li>
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
                            <div class="card card-outline card-info">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Tambah Berita
                                    </h3>

                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <form action="/admin/berita/create" method="POST">
                                        @csrf
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="judul">Judul Berita</label>
                                                <input type="text" name="judul" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="judul">Nama Author</label>
                                                <input type="text" name="author" class="form-control">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <textarea type="text" name="konten" class="form-control" id="summernote"></textarea>
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
    @endpush --}}

    @extends('admin.main')
    @section('title', ' - Tambah Berita')
    @section('content')
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Berita</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                                <li class="breadcrumb-item active">Berita</li>
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
                            <div class="card card-outline card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Tambah Berita
                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <form action="/admin/berita/create" method="POST">
                                        @csrf
                                        <div class="d-flex justify-content-end">
                                            <a href="/admin/berita" class="btn btn-sm btn-outline-secondary mx-2"><i
                                                    class="fas fa-caret-left"></i> Kembali</a>
                                            <button type="submit" class="btn btn-sm btn-primary"><i
                                                    class="fab fa-telegram-plane"></i> Submit</button>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="judul">Judul Berita</label>
                                                <input type="text" id="judul" name="judul" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="author">Nama Author</label>
                                                <input type="text" id="author" name="author" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="kategori">Kategori Berita</label>
                                                <div class="input-group">
                                                    <select class="custom-select" name="id_kategori">
                                                        <option disabled>Pilih Kategori</option>
                                                        @foreach ($kategori as $kategori)
                                                            <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="konten">Konten Berita</label>
                                                <textarea name="konten" class="form-control" id="summernote"></textarea>
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
        @include('admin.kategori.create')
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
