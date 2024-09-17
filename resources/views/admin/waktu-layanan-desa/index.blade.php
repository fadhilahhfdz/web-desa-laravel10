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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Waktu Layanan Desa</h3>

                                <div class="card-tools">
                                    <div class="card-header-form">
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                            data-target="#tambah-waktu-layanan-desa">
                                            <i class="fas fa-plus"></i> Tambah
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-2">
                                <table class="table table-hover" id="table">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Hari</th>
                                            <th>Jam Buka</th>
                                            <th>Jam Tutup</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($waktuLayanan as $item)
                                            <tr>
                                                <td style="width: 10%">{{ $loop->iteration }}</td>
                                                <td style="width: 20%">{{ $item->hari }}</td>
                                                <td>{{ \Carbon\Carbon::parse($item->jam_buka)->format('H:i') }}</td>
                                                <td>{{ \Carbon\Carbon::parse($item->jam_tutup)->format('H:i') }}</td>
                                                <td>
                                                    <a href="/admin/waktu-layanan-desa/edit/{{ $item->id }}"
                                                        class="btn btn-sm btn-warning text-white"><i
                                                            class="fas fa-edit"></i> Edit</a>
                                                    <a href="/admin/waktu-layanan-desa/delete/{{ $item->id }}"
                                                        class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
    @include('admin.waktu-layanan-desa.create')
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        })
    </script>
@endpush
