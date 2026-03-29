@extends('admin.layout.master')

@section('title', 'Dashboard')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
        </a>
    </div>

    <!-- Content Row -->
    <div class="row">

   <!-- Orders Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Orders</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalOrders }}</div> <!-- عدد الطلبات -->
                </div>
                <div class="col-auto">
                    <i class="fas fa-shopping-cart fa-2x text-gray-300"></i> <!-- أيقونة الطلبات -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Users Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                        Users (Total)</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalUsers }}</div> <!-- عدد المستخدمين -->
                </div>
                <div class="col-auto">
                    <i class="fas fa-users fa-2x text-gray-300"></i> <!-- أيقونة المستخدمين -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Books Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        Books (Total)</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalBooks }}</div> <!-- عدد الكتب -->
                </div>
                <div class="col-auto">
                    <i class="fas fa-book fa-2x text-gray-300"></i> <!-- أيقونة الكتب -->
                </div>
            </div>
        </div>
    </div>
</div>


 <!-- New Reviews Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        New Reviews</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalComments }}</div> <!-- عدد التعليقات الجديدة -->
                </div>
                <div class="col-auto">
                    <i class="fas fa-comments fa-2x text-gray-300"></i> <!-- أيقونة التعليقات -->
                </div>
            </div>
        </div>
    </div>
</div>


    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> Direct
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Social
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-info"></i> Referral
                        </span>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('script')
    <!-- Page level plugins -->
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>
@endsection
