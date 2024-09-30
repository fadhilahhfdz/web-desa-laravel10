@extends('admin.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Daftar Informasi PPID</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Daftar Informasi PPID</li>
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
                                    Edit Data Daftar Informasi PPID
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="/admin/ppid/informasi-ppid/edit/{{ $informasiPpid->id }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="d-flex justify-content-end">
                                        <a href="/admin/ppid/informasi-ppid" class="btn btn-sm btn-outline-secondary mx-2"><i
                                                class="fas fa-caret-left"></i> Kembali</a>
                                        <button type="submit" class="btn btn-sm btn-primary"><i
                                                class="fab fa-telegram-plane"></i> Submit</button>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="daftar_informasi">Daftar Informasi :</label>
                                            <select name="daftar_informasi" id="daftar_informasi" class="form-control"
                                                required>
                                                <option>-- Pilih Daftar Informasi --</option>
                                                <option
                                                    value="Informasi Berkala"{{ $informasiPpid->daftar_informasi == 'Informasi Berkala' ? 'selected' : '' }}>
                                                    Informasi Berkala</option>
                                                <option
                                                    value="Informasi Setiap Saat"{{ $informasiPpid->daftar_informasi == 'Informasi Setiap Saat' ? 'selected' : '' }}>
                                                    Informasi Setiap Saat</option>
                                                <option
                                                    value="Informasi Serta Merta"{{ $informasiPpid->daftar_informasi == 'Informasi Serta Merta' ? 'selected' : '' }}>
                                                    informasi serta merta</option>
                                                <option
                                                    value="Informasi Dikecualikan"{{ $informasiPpid->daftar_informasi == 'Informasi Dikecualikan' ? 'selected' : '' }}>
                                                    Informasi Dikecualikan</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="konten">konten :</label>
                                                <textarea name="konten" class="form-control" id="summernote">{{ $informasiPpid->konten }}</textarea>
                                            </div>
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
