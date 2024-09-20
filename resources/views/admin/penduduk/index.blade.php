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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data Penduduk</h3>

                                <div class="card-tools">
                                    <div class="card-header-form">
                                        <a href="/admin/penduduk/create" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Tambah</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-2">
                                <table class="table table-hover" id="table">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Dukuh</th>
                                            <th>RT</th>
                                            <th>RW</th>
                                            <th>Laki - Laki</th>
                                            <th>Perempuan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($penduduk as $item)
                                            <tr>
                                                <td style="width: 3%">{{ $loop->iteration }}</td>
                                                <td style="width: 25%">Dukuh {{ $item->dukuh ? $item->dukuh->nama_dukuh : 'Data tidak tersedia' }}</td>
                                                <td style="width: 10%">{{ $item->rt }}</td>
                                                <td style="width: 10%">{{ $item->rw }}</td>
                                                <td style="width: 20%">{{ $item->laki_laki }}</td>
                                                <td style="width: 20%">{{ $item->perempuan }}</td>
                                                <td>
                                                    <a href="/admin/penduduk/edit/{{ $item->id }}"
                                                        class="btn btn-sm btn-warning text-white"><i
                                                            class="fas fa-edit"></i></a>
                                                    <a href="/admin/penduduk/delete/{{ $item->id }}"
                                                        class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        })
    </script>
@endpush
