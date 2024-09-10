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
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                            data-target="#tambah-penduduk">
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
                                            <th>Nama Lengkap</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Alamat Lengkap</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($penduduk as $item)
                                            <tr>
                                                <td style="width: 3%">{{ $loop->iteration }}</td>
                                                <td style="width: 20%">{{ $item->nama }}</td>
                                                {{-- <td style="width: 13%">{{ $item->jenis_kelamin }}</td> --}}
                                                @if ($item->jenis_kelamin == 'Laki-laki')
                                                    <td>
                                                        <div class="badge badge-success">laki-Laki</div>
                                                    </td>
                                                @elseif($item->jenis_kelamin == 'Perempuan')
                                                    <td>
                                                        <div class="badge badge-info">Perempuan</div>
                                                    </td>
                                                @endif
                                                <td style="width: 15%">
                                                    {{ \Carbon\Carbon::parse($item->tanggal_lahir)->translatedFormat('d F Y') }}
                                                </td>
                                                <td style="width: 38%">{{ $item->alamat }}</td>
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
    @include('admin.penduduk.create')
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            console.log("DataTables script running");
            $('#table').DataTable();
        })
    </script>
@endpush
