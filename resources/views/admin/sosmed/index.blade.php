@extends('admin.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Sosmed</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Sosmed</li>
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
                                <h3 class="card-title">Data Sosmed</h3>

                                <div class="card-tools">
                                    <div class="card-header-form">
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                            data-target="#tambah-sosmed">
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
                                            <th>Instagram</th>
                                            <th>Facebook</th>
                                            <th>Youtube</th>
                                            <th>X(Twitter)</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sosmed as $item)
                                            <tr>
                                                <td style="width: 3%">{{ $loop->iteration }}</td>
                                                <td>{{ $item->instagram }}</td>
                                                <td>{{ $item->facebook }}</td>
                                                <td>{{ $item->youtube }}</td>
                                                <td>{{ $item->x }}</td>
                                                <td>
                                                    <a href="/admin/sosmed/edit/{{ $item->id }}"
                                                        class="btn btn-sm btn-warning text-white"><i
                                                            class="fas fa-edit"></i></a>
                                                    <a href="/admin/sosmed/delete/{{ $item->id }}"
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
    @include('admin.sosmed.create')
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        })
    </script>
@endpush