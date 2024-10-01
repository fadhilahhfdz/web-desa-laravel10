@extends('admin.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">APB Desa</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">APB Desa</li>
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
                                    Edit Data APB Desa
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="/admin/apb-desa/edit/{{ $apbDesa->id }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="jenis">Jenis APB :</label>
                                            <select name="jenis" id="jenis" class="form-control">
                                                <option>-- Pilih Jenis Apb --</option>
                                                @foreach ($jenis as $item)
                                                    <option value="{{ $item }}"
                                                        {{ $apbDesa->jenis == $item ? 'selected' : '' }}>{{ $item }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="nama">Nama :</label>
                                                <select name="nama" id="nama" class="form-control">
                                                    <option>-- Pilih Nama Apb --</option>
                                                    @foreach ($apbByJenis[$apbDesa->jenis] as $item)
                                                        <option value="{{ $item }}"
                                                            {{ $apbDesa->nama == $item ? 'selected' : '' }}>
                                                            {{ $item }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="nominal">Nominal :</label>
                                                <input type="number" name="nominal" class="form-control"
                                                    value="{{ $apbDesa->nominal }}">
                                            </div>
                                        </div>
                                    </div>
                                    <a href="/admin/apb-desa" class="btn btn-sm btn-outline-secondary"><i
                                            class="fas fa-caret-left"></i> Kembali</a>
                                    <button type="submit" class="btn btn-sm btn-primary"><i
                                            class="fab fa-telegram-plane"></i> Simpan</button>
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('#jenis').on('change', function() {
                var jenis = $(this).val();
                if (jenis) {
                    $.ajax({
                        url: '/admin/apb-desa/get-nama-apb/' + jenis,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#nama').empty();
                            $('#nama').append('<option>-- Pilih Nama APB --</option>');
                            $.each(data, function(key, value) {
                                $('#nama').append('<option value="' + value + '">' +
                                    value + '</option>')
                            });
                        }
                    });
                } else {
                    $('#nama').empty();
                    $('#nama').append('<option>-- Pilih Nama APB --</option>');
                }
            });
        });
    </script>
@endpush
