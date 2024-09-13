    @extends('admin.main')
    @section('title', ' - Dashboard')
    @section('content')
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="alert alert-success d-flex justify-content-between" role="alert">
                        <p class="m-0">Hallo <strong>{{ auth()->user()->nama }}</strong>, Selamat Datang</p>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-secondary"><i class="far fa-newspaper"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Total Berita</span>
                                    <span class="info-box-number">{{ $berita->count() }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-secondary"><i class="fas fa-user"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Total User</span>
                                    <span class="info-box-number">{{ $user->count() }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">Data Penduduk</h3>
    
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <canvas id="chartPenduduk"
                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                    <h6>Jumlah penduduk : {{ $penduduk->count() }} Jiwa</h6>
                                    <h6>Jumlah penduduk Laki-laki : {{ $totalLakiLaki }} Jiwa</h6>
                                    <h6>Jumlah penduduk Perempuan : {{ $totalPerempuan }} Jiwa</h6>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
    @endsection
    @push('script')
        <script>
            $(document).ready(function() {
                var donutChartCanvas = $('#chartPenduduk').get(0).getContext('2d');
                var donutData = {
                    labels: [
                        'Laki-laki',
                        'Perempuan'
                    ],
                    datasets: [{
                        data: [{{ $totalLakiLaki }}, {{ $totalPerempuan }}],
                        backgroundColor: ['#198754', '#0dcaf0'],
                    }]
                };
                var donutOptions = {
                    maintainAspectRatio: false,
                    responsive: true,
                };
                new Chart(donutChartCanvas, {
                    type: 'doughnut',
                    data: donutData,
                    options: donutOptions
                });
            });
        </script>
    @endpush
