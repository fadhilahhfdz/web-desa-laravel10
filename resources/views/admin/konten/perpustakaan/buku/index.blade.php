@extends('admin.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Buku Perpustakaan</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Buku Perpustakaan</li>
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
                                <h3 class="card-title">Data Buku Perpustakaan</h3>

                                <div class="card-tools">
                                    <div class="card-header-form">
                                        <a href="/admin/perpustakaan/buku/create" class="btn btn-sm btn-primary"><i
                                                class="fas fa-plus"></i> Tambah</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-2">
                                <table class="table table-hover text-wrap" id="table">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Judul Buku</th>
                                            <th>Publisher</th>
                                            <th>Genre</th>
                                            <th>Status</th>
                                            <th>Cover</th>
                                            <th>Konten</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($perpustakaan as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td style="width: 17%">{{ $item->judul }}</td>
                                                <td style="width: 15%">{{ $item->publisher }}</td>
                                                <td style="width: 10%">{{ $item->genre->nama }}</td>
                                                @if ($item->status == 'Tersedia')
                                                    <td>
                                                        <div class="badge badge-success">Tersedia</div>
                                                    </td>
                                                @elseif ($item->status == 'Tidak Tersedia')
                                                    <td>
                                                        <div class="badge badge-danger">Tidak Tersedia</div>
                                                    </td>
                                                @endif
                                                <td><img src="{{ asset($item->cover )}}" alt="{{ $item->judul }}" width="100"></td>
                                                <td style="width: 20%">{!! Str::limit($item->konten, 100) !!}</td>
                                                <td>
                                                    <a href="/admin/perpustakaan/buku/edit/{{ $item->id }}"
                                                        class="btn btn-sm btn-warning text-white"><i
                                                            class="fas fa-edit"></i></a>
                                                    <a href="/admin/perpustakaan/buku/delete/{{ $item->id }}"
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
