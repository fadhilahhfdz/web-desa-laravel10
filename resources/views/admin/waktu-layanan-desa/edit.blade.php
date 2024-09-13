@extends('admin.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Layanan Desa</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Layanan Desa</li>
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
                                    Edit Waktu Layanan Desa
                                </h3>
                            </div>
                            <!-- end card header -->
                            <div class="card-body">
                                <form action="/admin/waktu-layanan-desa/edit/{{ $waktuLayanan->id }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="hari">Hari :</label>
                                                <input type="text" name="hari" class="form-control" value="{{ $waktuLayanan->hari }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="jam_buka">Jam Buka :</label>
                                                <input type="time" name="jam_buka" class="form-control" value="{{ $waktuLayanan->jam_buka }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="jam_tutup">Jam Tutup :</label>
                                                <input type="time" name="jam_tutup" class="form-control" value="{{ $waktuLayanan->jam_tutup }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="/admin/waktu-layanan-desa" class="btn btn-sm btn-outline-secondary"><i
                                            class="fas fa-caret-left"></i> Kembali</a>
                                    <button type="submit" class="btn btn-sm btn-primary"><i
                                            class="fab fa-telegram-plane"></i> Submit</button>
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
