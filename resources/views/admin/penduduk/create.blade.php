@extends('admin.main');
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Penduduk</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Penduduk</li>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Tambah Data Penduduk</h3>

                                <div class="card-tools">
                                    <div class="card-header-form">
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="/admin/penduduk/create" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="nama_dukuh">Nama Dukuh :</label>
                                                    <select class="form-control" name="id_dukuh">
                                                        <option >--Pilih Dukuh--</option>
                                                        @foreach ($dukuh as $item)
                                                            <option value="{{ $item->id }}">{{ $item->nama_dukuh }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="rt">RT :</label>
                                                <input type="number" name="rt" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="rw">RW :</label>
                                                <input type="number" name="rw" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="laki_laki">Jumlah Laki-laki :</label>
                                                <input type="number" name="laki_laki" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="perempuan">Jumlah Perempuan :</label>
                                                <input type="number" name="perempuan" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer justify-content-end">
                                <a href="/admin/penduduk" class="btn btn-sm btn-outline-secondary"><i class="fas fa-caret-left"></i> Kembali</a>
                                <button type="submit" class="btn btn-sm btn-primary"><i class="fab fa-telegram-plane"></i> Simpan</button>
                            </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
@endsection
