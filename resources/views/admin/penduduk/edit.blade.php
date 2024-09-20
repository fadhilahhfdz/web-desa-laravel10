@extends('admin.main')
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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Edit data penduduk
                                </h3>
                            </div>
                            <!-- end card header -->
                            <div class="card-body">
                                <form action="/admin/penduduk/edit/{{ $penduduk->id }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="nama_dukuh">Nama Dukuh :</label>
                                                <select class="form-control" name="id_dukuh">
                                                    <option>--Pilih Dukuh--</option>
                                                    @foreach ($dukuh as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ $penduduk->id_dukuh == $item->id ? 'selected' : '' }}>
                                                            {{ $item->nama_dukuh }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="rt">RT :</label>
                                                <input type="number" name="rt" class="form-control"
                                                    value="{{ $penduduk->rt }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="rw">RW :</label>
                                                <input type="number" name="rw" class="form-control"
                                                    value="{{ $penduduk->rw }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="laki_laki">Jumlah Laki-laki :</label>
                                                <input type="number" name="laki_laki" class="form-control"
                                                    value="{{ $penduduk->laki_laki }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="perempuan">Jumlah Perempuan :</label>
                                                <input type="number" name="perempuan" class="form-control"
                                                    value="{{ $penduduk->perempuan }}">
                                            </div>
                                        </div>
                                    </div>
                                    <a href="/admin/penduduk" class="btn btn-sm btn-outline-secondary"><i
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
