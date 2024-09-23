@extends('admin.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Informasi Desa</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Informasi Desa</li>
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
                                    Edit Informasi Desa
                                </h3>
                            </div>
                            <!-- end card header -->
                            <div class="card-body">
                                <form action="/admin/informasi-desa/edit/{{ $informasiDesa->id }}" method="POST" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nama_desa">Nama Desa :</label>
                                                <input type="text" name="nama_desa" class="form-control" value="{{ $informasiDesa->nama_desa}}" placeholder="Cth: Tangkil" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="hotline_desa">Hotline Desa :</label>
                                                <input type="number" name="hotline_desa" class="form-control" value="{{ $informasiDesa->hotline_desa}}" placeholder="Cth : 62812XXXX" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email_desa">Email Desa :</label>
                                                <input type="email" name="email_desa" class="form-control" value="{{ $informasiDesa->email_desa}}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="deskripsi_desa">Deskripsi Desa :</label>
                                                <textarea class="form-control" name="deskripsi_desa" cols="5" rows="3" required>{{ $informasiDesa->deskripsi_desa }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="link_video">Link Profil Video :</label>
                                                <input type="text" name="link_video" class="form-control" value="{{ $informasiDesa->link_video}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="thumbnail_video">Thumbnail Profil Video :</label>
                                                <input type="file" name="thumbnail_video" class="form-control" accept="image/*">
                                                <small class="text-danger">*Biarkan kosong jika tidak ingin mengubah.</small>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="/admin/informasi-desa" class="btn btn-sm btn-outline-secondary"><i
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
