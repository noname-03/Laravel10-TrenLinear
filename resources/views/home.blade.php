@extends('layouts.app')
@section('title', 'Dashboard')
@section('dashboard', 'active')
@section('content')

    <!-- Content Wrapper. Contains page content -->
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
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $products }}</h3>

                                <p>Produk</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-box-open"></i>
                            </div>
                            <a href="{{ route('product.index') }}" class="small-box-footer">More info <i
                                    class="fas
                                fa-arrow-circle-right">
                                </i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $transaction }}</h3>

                                <p>Transaksi</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                            <a href="{{ route('transaction.index') }}" class="small-box-footer">More info <i
                                    class="fas
                                fa-arrow-circle-right">
                                </i></a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                        <!-- BAR CHART -->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">
                                    3 Produk Terlaris
                                </h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="barChart"
                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.col (RIGHT) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@push('script')
    <!-- ChartJS -->
    <script src="{{ asset('admin/plugins/chart.js/Chart.min.js') }}"></script>
    <script>
        $(function() {
            // Data dari tiga produk terlaris (disesuaikan dengan data yang Anda ambil dari database)
            var topThreeProductsData = <?php echo json_encode($monthlyData); ?>;

            // Label bulan
            var months = [
                'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
            ];

            // Warna-warna statis yang akan digunakan
            var colors = ['rgba(60,141,188,0.9)', 'rgba(210, 214, 222, 1)', 'rgba(0, 255, 135, 0.8)'];

            // Inisialisasi data Chart.js
            var chartData = {
                labels: months,
                datasets: []
            };

            // Membuat dataset untuk setiap produk terlaris
            topThreeProductsData.forEach(function(productData, index) {
                var dataset = {
                    label: productData.product_id, // Nama produk
                    backgroundColor: colors[index], // Warna dari array colors
                    borderColor: colors[index],
                    borderWidth: 1,
                    data: productData.total_qty // Data total_qty
                };
                chartData.datasets.push(dataset);
            });

            // Konfigurasi grafik
            var chartOptions = {
                responsive: true,
                maintainAspectRatio: false
            };

            // Menampilkan grafik menggunakan Chart.js
            var ctx = document.getElementById('barChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: chartData,
                options: chartOptions
            });
        });
    </script>
@endpush
